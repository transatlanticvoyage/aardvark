<?php
/**
 * Mass Update AJAX Handler
 * 
 * @package Aardvark
 * @subpackage MassUpdate
 */

if (!defined('ABSPATH')) {
    exit;
}

class Aardvark_Mass_Update_Ajax {
    
    public function __construct() {
        add_action('wp_ajax_aardvark_mass_update_all', array($this, 'ajax_mass_update_all'));
    }
    
    /**
     * AJAX handler for mass updating Ruplin, Grove, Axiom, Aardvark, and Staircase
     */
    public function ajax_mass_update_all() {
        check_ajax_referer('aardvark_mass_update', 'nonce');
        
        if (!current_user_can('update_plugins') || !current_user_can('update_themes')) {
            wp_send_json_error('Insufficient permissions');
        }
        
        // Domain Check (Primary Defense) - Block only saltwater.local repository domain
        $current_domain = $_SERVER['HTTP_HOST'];
        
        // Debug info for troubleshooting
        $debug_info = array(
            'current_domain' => $current_domain,
            'php_version' => PHP_VERSION,
            'plugin_file' => __FILE__,
            'last_modified' => date('Y-m-d H:i:s', filemtime(__FILE__)),
            'server_name' => $_SERVER['SERVER_NAME'] ?? 'not set',
            'http_host' => $_SERVER['HTTP_HOST'] ?? 'not set'
        );
        
        // Only block saltwater.local (the main development repository)
        // Allow other .local domains like cormerant.local to use mass update
        if ($current_domain === 'saltwater.local' || $current_domain === 'www.saltwater.local') {
            $debug_info['blocked_reason'] = 'Domain matches saltwater.local';
            wp_send_json_error('Mass update is disabled on saltwater.local repository domain. Debug: ' . json_encode($debug_info));
        }
        
        // Optional: Still block localhost and direct IP access
        $strictly_blocked = ['localhost', '127.0.0.1', '192.168.'];
        foreach ($strictly_blocked as $blocked) {
            if (stripos($current_domain, $blocked) !== false) {
                $debug_info['blocked_reason'] = 'Domain contains: ' . $blocked;
                wp_send_json_error('Mass update is disabled. Debug: ' . json_encode($debug_info));
            }
        }
        
        // If we get here, domain should be allowed - add success debug
        error_log('Mass update allowed for domain: ' . $current_domain . ' - Debug: ' . json_encode($debug_info));
        
        $results = array(
            'ruplin' => array('status' => 'pending', 'message' => ''),
            'grove' => array('status' => 'pending', 'message' => ''),
            'axiom' => array('status' => 'pending', 'message' => ''),
            'aardvark' => array('status' => 'pending', 'message' => ''),
            'staircase' => array('status' => 'pending', 'message' => '')
        );
        
        // Update Ruplin plugin
        $results['ruplin'] = $this->update_plugin('ruplin/ruplin.php');
        
        // Update Grove plugin  
        $results['grove'] = $this->update_plugin('grove/grove.php');
        
        // Update Axiom plugin
        $results['axiom'] = $this->update_plugin('axiom/axiom.php');
        
        // Update Aardvark plugin
        $results['aardvark'] = $this->update_plugin('aardvark/aardvark.php');
        
        // Update Staircase theme
        $results['staircase'] = $this->update_theme('staircase');
        
        // Calculate overall status
        $success_count = 0;
        $error_count = 0;
        $messages = array();
        
        foreach ($results as $item => $result) {
            if ($result['status'] === 'success') {
                $success_count++;
                $messages[] = ucfirst($item) . ': ✓ ' . $result['message'];
            } else {
                $error_count++;
                $messages[] = ucfirst($item) . ': ✗ ' . $result['message'];
            }
        }
        
        $overall_message = "Update completed: $success_count successful, $error_count failed";
        
        wp_send_json_success(array(
            'overall_message' => $overall_message,
            'details' => $results,
            'messages' => $messages,
            'success_count' => $success_count,
            'error_count' => $error_count
        ));
    }
    
    /**
     * Update a single plugin from GitHub
     */
    private function update_plugin($plugin_path) {
        global $wpdb;
        
        // Get plugin info from database
        $table_name = $wpdb->prefix . 'zen_plugins_oasis';
        $plugin_info = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table_name WHERE plugin_path = %s",
            $plugin_path
        ));
        
        if (!$plugin_info) {
            return array('status' => 'error', 'message' => 'Plugin not found in database');
        }
        
        if (empty($plugin_info->github_url)) {
            return array('status' => 'error', 'message' => 'No GitHub URL configured');
        }
        
        // Load the installer
        if (!class_exists('Aardvark_Plugin_Installer')) {
            require_once AARDVARK_PLUGIN_PATH . 'includes/class-plugin-installer.php';
        }
        
        $token = $plugin_info->github_token ?? '';
        
        try {
            $installer = new Aardvark_Plugin_Installer($token);
            $result = $installer->update_from_github(
                $plugin_path,
                $plugin_info->github_url,
                $plugin_info->branch_name ?: 'main',
                $token
            );
            
            if (isset($result['error'])) {
                return array('status' => 'error', 'message' => $result['error']);
            }
            
            // Clear WordPress caches
            if (function_exists('wp_cache_delete')) {
                wp_cache_delete('plugins', 'plugins');
            }
            delete_site_transient('update_plugins');
            
            return array('status' => 'success', 'message' => $result['message'] ?? 'Updated successfully');
            
        } catch (Exception $e) {
            return array('status' => 'error', 'message' => 'Update failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Update a theme from GitHub
     */
    private function update_theme($theme_folder) {
        global $wpdb;
        
        // Get theme info from database
        $table_name = $wpdb->prefix . 'zen_themes_oasis';
        $theme_info = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table_name WHERE theme_folder = %s",
            $theme_folder
        ));
        
        if (!$theme_info) {
            return array('status' => 'error', 'message' => 'Theme not found in database');
        }
        
        if (empty($theme_info->github_url)) {
            return array('status' => 'error', 'message' => 'No GitHub URL configured');
        }
        
        // Load the installer
        if (!class_exists('Aardvark_Theme_Installer')) {
            require_once AARDVARK_PLUGIN_PATH . 'theme-mar/class-theme-installer.php';
        }
        
        try {
            $installer = new Aardvark_Theme_Installer($theme_info->github_token);
            $result = $installer->update_from_github(
                $theme_folder,
                $theme_info->github_url,
                $theme_info->branch_name ?: 'main',
                $theme_info->github_token
            );
            
            if (isset($result['error'])) {
                return array('status' => 'error', 'message' => $result['error']);
            }
            
            // Clear theme caches
            delete_site_transient('update_themes');
            
            return array('status' => 'success', 'message' => $result['message'] ?? 'Updated successfully');
            
        } catch (Exception $e) {
            return array('status' => 'error', 'message' => 'Update failed: ' . $e->getMessage());
        }
    }
}
<?php
/**
 * Aardvark Theme Mar Admin Class
 */

class Aardvark_Theme_Mar {
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'), 20);
        // Hook notice suppression very early for our specific page
        add_action('current_screen', array($this, 'maybe_suppress_notices'));
        
        // Add AJAX handlers for theme actions
        add_action('wp_ajax_aardvark_install_theme', array($this, 'ajax_install_theme'));
        add_action('wp_ajax_aardvark_update_theme', array($this, 'ajax_update_theme'));
        add_action('wp_ajax_aardvark_activate_theme', array($this, 'ajax_activate_theme'));
        add_action('wp_ajax_aardvark_delete_theme', array($this, 'ajax_delete_theme'));
    }
    
    public function add_admin_menu() {
        add_submenu_page(
            'papluginsmar',
            'Aardvark Theme Mar',
            'Theme Mar',
            'manage_options',
            'aardvark_theme_mar',
            array($this, 'display_admin_page')
        );
    }
    
    /**
     * Check if we're on our page and suppress notices immediately
     */
    public function maybe_suppress_notices() {
        $screen = get_current_screen();
        if ($screen && $screen->id === 'aardvark_page_aardvark_theme_mar') {
            $this->suppress_all_admin_notices();
        }
    }
    
    public function display_admin_page() {
        require_once plugin_dir_path(__FILE__) . 'aardvark-theme-mar-page.php';
        $page = new Aardvark_Theme_Mar_Page();
        $page->render();
    }
    
    /**
     * AGGRESSIVE NOTICE SUPPRESSION - Remove ALL WordPress admin notices
     * Based on proven Snefuruplin/Grove implementation
     */
    private function suppress_all_admin_notices() {
        // Remove notices immediately - don't wait for hooks
        remove_all_actions('admin_notices');
        remove_all_actions('all_admin_notices');
        remove_all_actions('network_admin_notices');
        
        // Remove user admin notices
        global $wp_filter;
        if (isset($wp_filter['user_admin_notices'])) {
            unset($wp_filter['user_admin_notices']);
        }
        
        // Add immediate CSS suppression
        add_action('admin_head', function() {
            echo '<style type="text/css">
                .notice, .notice-warning, .notice-error, .notice-success, .notice-info,
                .updated, .error, .update-nag, .admin-notice,
                .wrap > .notice, .wrap > .error, .wrap > .updated,
                div[class*="notice"], div[class*="updated"], div[class*="error"] {
                    display: none !important;
                }
            </style>';
        }, 1);
        
        // Additional hook-based removal
        add_action('admin_print_styles', function() {
            remove_all_actions('admin_notices');
            remove_all_actions('all_admin_notices');
            remove_all_actions('network_admin_notices');
        }, 0);
        
        // Nuclear option - remove on admin_notices hook itself
        add_action('admin_notices', function() {
            remove_all_actions('admin_notices');
        }, -9999);
    }
    
    /**
     * AJAX handler for installing themes from GitHub
     */
    public function ajax_install_theme() {
        check_ajax_referer('aardvark_theme_install', 'nonce');
        
        if (!current_user_can('install_themes')) {
            wp_die('Insufficient permissions');
        }
        
        $theme_folder = sanitize_text_field($_POST['theme']);
        
        // Get theme info from database
        global $wpdb;
        $table_name = $wpdb->prefix . 'zen_themes_oasis';
        $theme_info = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table_name WHERE theme_folder = %s",
            $theme_folder
        ));
        
        if (!$theme_info) {
            wp_send_json_error('Theme not found in database');
        }
        
        if (empty($theme_info->github_url)) {
            wp_send_json_error('No GitHub URL available for this theme');
        }
        
        // Load the installer
        require_once plugin_dir_path(__FILE__) . 'class-theme-installer.php';
        
        $installer = new Aardvark_Theme_Installer($theme_info->github_token);
        $result = $installer->install_from_github(
            $theme_info->github_url,
            $theme_info->branch_name ?: 'main',
            $theme_info->github_token
        );
        
        if (isset($result['error'])) {
            wp_send_json_error($result['error']);
        } else {
            wp_send_json_success($result['message']);
        }
    }
    
    /**
     * AJAX handler for updating themes from GitHub
     */
    public function ajax_update_theme() {
        check_ajax_referer('aardvark_theme_update', 'nonce');
        
        if (!current_user_can('update_themes')) {
            wp_die('Insufficient permissions');
        }
        
        $theme_folder = sanitize_text_field($_POST['theme']);
        
        // Get theme info from database
        global $wpdb;
        $table_name = $wpdb->prefix . 'zen_themes_oasis';
        $theme_info = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table_name WHERE theme_folder = %s",
            $theme_folder
        ));
        
        if (!$theme_info) {
            wp_send_json_error('Theme not found in database');
        }
        
        if (empty($theme_info->github_url)) {
            wp_send_json_error('No GitHub URL available for this theme');
        }
        
        // Load the installer
        require_once plugin_dir_path(__FILE__) . 'class-theme-installer.php';
        
        $installer = new Aardvark_Theme_Installer($theme_info->github_token);
        $result = $installer->update_from_github(
            $theme_folder,
            $theme_info->github_url,
            $theme_info->branch_name ?: 'main',
            $theme_info->github_token
        );
        
        if (isset($result['error'])) {
            wp_send_json_error($result['error']);
        } else {
            wp_send_json_success($result['message']);
        }
    }
    
    /**
     * AJAX handler for activating themes
     */
    public function ajax_activate_theme() {
        check_ajax_referer('aardvark_theme_activate', 'nonce');
        
        if (!current_user_can('switch_themes')) {
            wp_die('Insufficient permissions');
        }
        
        $theme_folder = sanitize_text_field($_POST['theme']);
        
        // Check if theme exists
        if (!wp_get_theme($theme_folder)->exists()) {
            wp_send_json_error('Theme not found');
        }
        
        // Switch to theme
        switch_theme($theme_folder);
        
        wp_send_json_success('Theme activated successfully');
    }
    
    /**
     * AJAX handler for deleting themes
     */
    public function ajax_delete_theme() {
        check_ajax_referer('aardvark_theme_delete', 'nonce');
        
        if (!current_user_can('delete_themes')) {
            wp_die('Insufficient permissions');
        }
        
        $theme_folder = sanitize_text_field($_POST['theme']);
        
        // Check if theme is active
        if (get_stylesheet() === $theme_folder) {
            wp_send_json_error('Cannot delete active theme');
        }
        
        // Delete theme directory
        $theme_path = WP_CONTENT_DIR . '/themes/' . $theme_folder;
        if (!is_dir($theme_path)) {
            wp_send_json_error('Theme directory not found');
        }
        
        // Load the installer for directory removal method
        require_once plugin_dir_path(__FILE__) . 'class-theme-installer.php';
        $installer = new Aardvark_Theme_Installer();
        
        // Use reflection to access private method
        $reflection = new ReflectionClass($installer);
        $method = $reflection->getMethod('remove_directory');
        $method->setAccessible(true);
        
        if ($method->invoke($installer, $theme_path)) {
            wp_send_json_success('Theme deleted successfully');
        } else {
            wp_send_json_error('Failed to delete theme');
        }
    }
}
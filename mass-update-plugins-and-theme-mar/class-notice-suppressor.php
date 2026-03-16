<?php
/**
 * Aggressive Notice Suppression for Mass Update Page
 * 
 * @package Aardvark
 * @subpackage MassUpdate
 */

if (!defined('ABSPATH')) {
    exit;
}

class Aardvark_Mass_Update_Notice_Suppressor {
    
    /**
     * AGGRESSIVE NOTICE SUPPRESSION - Remove ALL WordPress admin notices
     * Based on proven Snefuruplin/Grove implementation
     */
    public function suppress_all_notices() {
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
        add_action('admin_head', array($this, 'inject_suppression_css'), 1);
        
        // Additional hook-based removal
        add_action('admin_print_styles', array($this, 'remove_notice_hooks'), 0);
        
        // Nuclear option - remove on admin_notices hook itself
        add_action('admin_notices', array($this, 'nuclear_notice_removal'), -9999);
        
        // Extra aggressive - also suppress on admin_enqueue_scripts
        add_action('admin_enqueue_scripts', array($this, 'remove_notice_hooks'), 0);
        
        // Suppress plugin/theme update notices
        $this->suppress_update_notices();
    }
    
    /**
     * CSS-based notice suppression
     */
    public function inject_suppression_css() {
        echo '<style type="text/css">
            /* Aggressive notice suppression for Mass Update page */
            .notice, .notice-warning, .notice-error, .notice-success, .notice-info,
            .updated, .error, .update-nag, .admin-notice,
            .wrap > .notice, .wrap > .error, .wrap > .updated,
            div[class*="notice"], div[class*="updated"], div[class*="error"],
            #message, .update-message, .update-plugins, .update-php,
            .notice-dismiss, .is-dismissible,
            .notice.notice-error, .notice.notice-warning, .notice.notice-success, .notice.notice-info,
            div.updated, div.error, div.notice,
            #setting-error-settings_updated, #setting-error-saved,
            .update-core-php .notice, .update-core-php .error,
            .plugins-php .notice, .plugins-php .error,
            .themes-php .notice, .themes-php .error {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                height: 0 !important;
                width: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                border: 0 !important;
                overflow: hidden !important;
                position: absolute !important;
                left: -99999px !important;
            }
            
            /* Also hide any dynamically inserted notices */
            body.wp-admin .notice:not(.mass-update-allowed-notice),
            body.wp-admin .updated:not(.mass-update-allowed-notice),
            body.wp-admin .error:not(.mass-update-allowed-notice) {
                display: none !important;
            }
            
            /* Hide admin notices container if empty */
            #wpbody-content > .wrap > h1 + .notice,
            #wpbody-content > .wrap > h1 + .updated,
            #wpbody-content > .wrap > h1 + .error {
                display: none !important;
            }
            
            /* Hide plugin update row notices */
            tr.plugin-update-tr, tr.update {
                display: none !important;
            }
        </style>';
    }
    
    /**
     * Remove notice hooks
     */
    public function remove_notice_hooks() {
        remove_all_actions('admin_notices');
        remove_all_actions('all_admin_notices');
        remove_all_actions('network_admin_notices');
        remove_all_actions('user_admin_notices');
    }
    
    /**
     * Nuclear option notice removal
     */
    public function nuclear_notice_removal() {
        // Remove all remaining actions
        remove_all_actions('admin_notices');
        
        // Clear any output buffers that might contain notices
        if (ob_get_level() > 0) {
            $content = ob_get_contents();
            if ($content) {
                // Remove any notice HTML that might have been output
                $content = preg_replace('/<div[^>]*class="[^"]*notice[^"]*"[^>]*>.*?<\/div>/is', '', $content);
                $content = preg_replace('/<div[^>]*class="[^"]*updated[^"]*"[^>]*>.*?<\/div>/is', '', $content);
                $content = preg_replace('/<div[^>]*class="[^"]*error[^"]*"[^>]*>.*?<\/div>/is', '', $content);
                ob_clean();
                echo $content;
            }
        }
    }
    
    /**
     * Suppress plugin and theme update notices
     */
    private function suppress_update_notices() {
        // Remove update notice actions
        remove_action('admin_notices', 'update_nag', 3);
        remove_action('network_admin_notices', 'update_nag', 3);
        
        // Remove plugin update rows
        remove_action('after_plugin_row', 'wp_plugin_update_row');
        
        // Disable update checks temporarily for this page
        add_filter('pre_site_transient_update_core', '__return_null');
        add_filter('pre_site_transient_update_plugins', '__return_null');
        add_filter('pre_site_transient_update_themes', '__return_null');
        
        // Remove inline update notifications
        add_filter('plugins_api', array($this, 'disable_plugin_api_notices'), 10, 3);
    }
    
    /**
     * Disable plugin API notices
     */
    public function disable_plugin_api_notices($result, $action, $args) {
        if ($action === 'plugin_information') {
            return new WP_Error('disabled', 'Plugin information disabled on this page');
        }
        return $result;
    }
}
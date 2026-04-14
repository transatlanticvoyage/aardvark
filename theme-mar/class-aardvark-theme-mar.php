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
            'Shenzi Theme Mar',
            'Shenzi Theme Mar',
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
     * Hardcoded Hauser themes data — used by install/update handlers
     * instead of database lookup.
     */
    private function get_hauser_themes_data() {
        return array(
            'cedar-journal' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/cedar-journal.git',
                'branch_name' => 'main',
            ),
            'skyline-forever' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/skyline-forever.git',
                'branch_name' => 'main',
            ),
            'cleanpress' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/cleanpress.git',
                'branch_name' => 'main',
            ),
            'daily-writings' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/daily-writings.git',
                'branch_name' => 'main',
            ),
            'horizon-base' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/horizon-base.git',
                'branch_name' => 'main',
            ),
            'truenorth' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/truenorth.git',
                'branch_name' => 'main',
            ),
            'urban-layout' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/urban-layout.git',
                'branch_name' => 'main',
            ),
            'pineframe' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/pineframe.git',
                'branch_name' => 'main',
            ),
            'metropress' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/metropress.git',
                'branch_name' => 'main',
            ),
            'vista-core' => array(
                'github_url'  => 'https://github.com/transatlanticvoyage/vista-core.git',
                'branch_name' => 'main',
            ),
        );
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

        $themes = $this->get_hauser_themes_data();
        if (!isset($themes[$theme_folder])) {
            wp_send_json_error('Theme not found in hardcoded themes list');
        }

        $theme_info = $themes[$theme_folder];

        // Load the installer
        require_once plugin_dir_path(__FILE__) . 'class-theme-installer.php';

        $installer = new Aardvark_Theme_Installer();
        $result = $installer->install_from_github(
            $theme_info['github_url'],
            $theme_info['branch_name'],
            ''
        );

        if (isset($result['error'])) {
            $error_data = array(
                'message' => $result['error'],
                'theme_slug' => $theme_folder,
                'github_url' => $theme_info['github_url'],
                'branch' => $theme_info['branch_name'],
            );
            if (isset($result['debug'])) {
                $error_data['debug'] = $result['debug'];
            }
            wp_send_json_error($error_data);
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

        // Domain Check (Primary Defense) - Block local development environments
        $current_domain = $_SERVER['HTTP_HOST'];
        $blocked_domains = ['localhost', '127.0.0.1', '.local', '.test', '.dev', '192.168.'];

        foreach ($blocked_domains as $blocked) {
            if (stripos($current_domain, $blocked) !== false) {
                wp_send_json_error('GitHub update is disabled on local development environments for safety. Current domain: ' . $current_domain);
            }
        }

        $theme_folder = sanitize_text_field($_POST['theme']);

        $themes = $this->get_hauser_themes_data();
        if (!isset($themes[$theme_folder])) {
            wp_send_json_error('Theme not found in hardcoded themes list');
        }

        $theme_info = $themes[$theme_folder];

        // Load the installer
        require_once plugin_dir_path(__FILE__) . 'class-theme-installer.php';

        $installer = new Aardvark_Theme_Installer();
        $result = $installer->update_from_github(
            $theme_folder,
            $theme_info['github_url'],
            $theme_info['branch_name'],
            ''
        );

        if (isset($result['error'])) {
            $error_data = array(
                'message' => $result['error'],
                'theme_slug' => $theme_folder,
                'github_url' => $theme_info['github_url'],
                'branch' => $theme_info['branch_name'],
            );
            if (isset($result['debug'])) {
                $error_data['debug'] = $result['debug'];
            }
            wp_send_json_error($error_data);
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
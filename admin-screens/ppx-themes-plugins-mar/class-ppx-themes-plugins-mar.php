<?php
/**
 * PPX Themes Plugins Mar - Admin Screen
 */

if (!defined('ABSPATH')) {
    exit;
}

class Aardvark_PPX_Themes_Plugins_Mar {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_submenu_page'));
        add_action('current_screen', array($this, 'maybe_suppress_notices'));
    }

    public function add_submenu_page() {
        add_submenu_page(
            'papluginsmar',
            'PPX Themes Plugins Mar',
            'PPX Themes Plugins Mar',
            'manage_options',
            'ppx_themes_plugins_mar',
            array($this, 'display_page')
        );
    }

    public function maybe_suppress_notices() {
        $screen = get_current_screen();
        if ($screen && $screen->base === 'aardvark_page_ppx_themes_plugins_mar') {
            $this->suppress_all_admin_notices();
        }
    }

    private function suppress_all_admin_notices() {
        remove_all_actions('admin_notices');
        remove_all_actions('all_admin_notices');
        remove_all_actions('network_admin_notices');

        global $wp_filter;
        if (isset($wp_filter['user_admin_notices'])) {
            unset($wp_filter['user_admin_notices']);
        }

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

        add_action('admin_print_styles', function() {
            remove_all_actions('admin_notices');
            remove_all_actions('all_admin_notices');
            remove_all_actions('network_admin_notices');
        }, 0);

        add_action('admin_notices', function() {
            remove_all_actions('admin_notices');
        }, -9999);
    }

    public function display_page() {
        require_once __DIR__ . '/ppx-themes-plugins-mar-page.php';
        $page = new Aardvark_PPX_Themes_Plugins_Mar_Page();
        $page->render();
    }
}

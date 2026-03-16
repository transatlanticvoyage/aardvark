<?php
/**
 * Mass Update Plugins and Theme Mar - Main Controller
 * 
 * @package Aardvark
 * @subpackage MassUpdate
 */

if (!defined('ABSPATH')) {
    exit;
}

class Aardvark_Mass_Update_Controller {
    
    private $notice_suppressor;
    private $page_renderer;
    private $ajax_handler;
    
    public function __construct() {
        $this->load_dependencies();
        $this->init_components();
    }
    
    /**
     * Load required dependencies
     */
    private function load_dependencies() {
        require_once plugin_dir_path(__FILE__) . 'class-notice-suppressor.php';
        require_once plugin_dir_path(__FILE__) . 'class-page-renderer.php';
        require_once plugin_dir_path(__FILE__) . 'class-mass-update-ajax.php';
    }
    
    /**
     * Initialize components
     */
    private function init_components() {
        $this->notice_suppressor = new Aardvark_Mass_Update_Notice_Suppressor();
        $this->page_renderer = new Aardvark_Mass_Update_Page_Renderer();
        $this->ajax_handler = new Aardvark_Mass_Update_Ajax();
    }
    
    /**
     * Main entry point for rendering the admin page
     */
    public function render() {
        // Activate notice suppression
        $this->notice_suppressor->suppress_all_notices();
        
        // Render the page
        $this->page_renderer->render();
    }
    
    /**
     * Check if we're on our specific admin page
     */
    public function is_current_page() {
        $screen = get_current_screen();
        return ($screen && $screen->base === 'aardvark_page_mass-update-plugins-and-theme-mar');
    }
    
    /**
     * Initialize hooks for the page
     */
    public function init_hooks() {
        // Hook notice suppression early
        add_action('current_screen', array($this, 'maybe_suppress_notices'));
    }
    
    /**
     * Conditionally suppress notices if on our page
     */
    public function maybe_suppress_notices() {
        if ($this->is_current_page()) {
            $this->notice_suppressor->suppress_all_notices();
        }
    }
}
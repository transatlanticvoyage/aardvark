<?php
/**
 * Aardvark Theme Installer Class
 * Handles GitHub theme installation and updates
 */

class Aardvark_Theme_Installer {
    
    private $github_token;
    
    public function __construct($github_token = '') {
        $this->github_token = $github_token;
    }
    
    /**
     * Install theme from GitHub repository
     */
    public function install_from_github($github_url, $branch = 'main', $github_token = '') {
        $token = !empty($github_token) ? $github_token : $this->github_token;
        
        // Extract repository info from URL
        $repo_info = $this->parse_github_url($github_url);
        if (!$repo_info) {
            return array('error' => 'Invalid GitHub URL');
        }
        
        // Check if theme already exists
        $theme_path = WP_CONTENT_DIR . '/themes/' . $repo_info['name'];
        if (is_dir($theme_path)) {
            return array('error' => 'Theme already exists');
        }
        
        try {
            // Download and install theme
            $result = $this->download_and_install_theme($repo_info, $branch, $token);
            
            if ($result['success']) {
                // Update database record
                $this->update_theme_status($repo_info['name'], 'installed');
                
                return array('message' => 'Theme installed successfully from GitHub');
            } else {
                return array('error' => $result['error']);
            }
            
        } catch (Exception $e) {
            return array('error' => 'Installation failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Update theme from GitHub repository
     */
    public function update_from_github($theme_folder, $github_url, $branch = 'main', $github_token = '') {
        $token = !empty($github_token) ? $github_token : $this->github_token;
        
        // Extract repository info from URL
        $repo_info = $this->parse_github_url($github_url);
        if (!$repo_info) {
            return array('error' => 'Invalid GitHub URL');
        }
        
        // Check if theme exists
        $theme_path = WP_CONTENT_DIR . '/themes/' . $theme_folder;
        if (!is_dir($theme_path)) {
            return array('error' => 'Theme not found for update');
        }
        
        try {
            // Backup current theme
            $backup_path = $theme_path . '_backup_' . date('Y-m-d_H-i-s');
            if (!$this->copy_directory($theme_path, $backup_path)) {
                return array('error' => 'Failed to create backup');
            }
            
            // Download and install updated theme
            $result = $this->download_and_install_theme($repo_info, $branch, $token, true);
            
            if ($result['success']) {
                // Remove backup on success
                $this->remove_directory($backup_path);
                
                // Update database record
                $this->update_theme_status($theme_folder, 'installed');
                
                return array('message' => 'Theme updated successfully from GitHub');
            } else {
                // Restore backup on failure
                $this->remove_directory($theme_path);
                rename($backup_path, $theme_path);
                
                return array('error' => $result['error']);
            }
            
        } catch (Exception $e) {
            return array('error' => 'Update failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Download and install theme from GitHub
     */
    private function download_and_install_theme($repo_info, $branch, $token, $is_update = false) {
        $temp_file = wp_tempnam();
        $download_url = "https://api.github.com/repos/{$repo_info['owner']}/{$repo_info['name']}/zipball/{$branch}";
        
        // Set up request headers
        $headers = array(
            'User-Agent' => 'WordPress-Aardvark-Plugin/1.0'
        );
        
        if (!empty($token)) {
            $headers['Authorization'] = 'token ' . $token;
        }
        
        // Download the zip file
        $response = wp_remote_get($download_url, array(
            'headers' => $headers,
            'timeout' => 300,
            'stream' => true,
            'filename' => $temp_file
        ));
        
        if (is_wp_error($response)) {
            @unlink($temp_file);
            return array('success' => false, 'error' => 'Download failed: ' . $response->get_error_message());
        }
        
        if (wp_remote_retrieve_response_code($response) !== 200) {
            @unlink($temp_file);
            return array('success' => false, 'error' => 'GitHub API returned error: ' . wp_remote_retrieve_response_code($response));
        }
        
        // Extract the zip file
        $extract_result = $this->extract_theme_zip($temp_file, $repo_info['name'], $is_update);
        @unlink($temp_file);
        
        return $extract_result;
    }
    
    /**
     * Extract theme zip file to themes directory
     */
    private function extract_theme_zip($zip_file, $theme_name, $is_update = false) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        
        WP_Filesystem();
        global $wp_filesystem;
        
        $themes_dir = WP_CONTENT_DIR . '/themes/';
        $temp_dir = $themes_dir . 'temp_' . uniqid();
        
        // Create temporary extraction directory
        if (!$wp_filesystem->mkdir($temp_dir)) {
            return array('success' => false, 'error' => 'Could not create temporary directory');
        }
        
        // Extract zip file
        $zip = new ZipArchive();
        if ($zip->open($zip_file) !== TRUE) {
            $wp_filesystem->rmdir($temp_dir);
            return array('success' => false, 'error' => 'Could not open zip file');
        }
        
        $zip->extractTo($temp_dir);
        $zip->close();
        
        // Find the extracted directory (GitHub creates a directory with commit hash)
        $extracted_dirs = glob($temp_dir . '/*', GLOB_ONLYDIR);
        if (empty($extracted_dirs)) {
            $wp_filesystem->rmdir($temp_dir);
            return array('success' => false, 'error' => 'No directory found in zip file');
        }
        
        $source_dir = $extracted_dirs[0];
        $target_dir = $themes_dir . $theme_name;
        
        // Remove existing directory if updating
        if ($is_update && is_dir($target_dir)) {
            $this->remove_directory($target_dir);
        }
        
        // Move extracted files to final location
        if (!rename($source_dir, $target_dir)) {
            $this->remove_directory($temp_dir);
            return array('success' => false, 'error' => 'Could not move theme files to destination');
        }
        
        // Clean up temporary directory
        $this->remove_directory($temp_dir);
        
        return array('success' => true);
    }
    
    /**
     * Parse GitHub URL to extract owner and repository name
     */
    private function parse_github_url($github_url) {
        // Remove .git suffix if present
        $github_url = preg_replace('/\.git$/', '', $github_url);
        
        // Parse GitHub URL patterns
        if (preg_match('/github\.com\/([^\/]+)\/([^\/]+)/', $github_url, $matches)) {
            return array(
                'owner' => $matches[1],
                'name' => $matches[2]
            );
        }
        
        return false;
    }
    
    /**
     * Update theme status in database
     */
    private function update_theme_status($theme_folder, $status) {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'zen_themes_oasis';
        
        $wpdb->update(
            $table_name,
            array(
                'install_status' => $status,
                'last_checked' => current_time('mysql'),
                'updated_at' => current_time('mysql')
            ),
            array('theme_folder' => $theme_folder),
            array('%s', '%s', '%s'),
            array('%s')
        );
    }
    
    /**
     * Copy directory recursively
     */
    private function copy_directory($source, $destination) {
        if (!is_dir($source)) {
            return false;
        }
        
        if (!mkdir($destination, 0755, true)) {
            return false;
        }
        
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        
        foreach ($iterator as $item) {
            $target = $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
            
            if ($item->isDir()) {
                mkdir($target, 0755, true);
            } else {
                copy($item, $target);
            }
        }
        
        return true;
    }
    
    /**
     * Remove directory recursively
     */
    private function remove_directory($directory) {
        if (!is_dir($directory)) {
            return false;
        }
        
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        
        foreach ($iterator as $item) {
            if ($item->isDir()) {
                rmdir($item);
            } else {
                unlink($item);
            }
        }
        
        return rmdir($directory);
    }
    
    /**
     * Get remote version from GitHub
     */
    public function get_remote_version($github_url, $branch = 'main', $github_token = '') {
        $token = !empty($github_token) ? $github_token : $this->github_token;
        $repo_info = $this->parse_github_url($github_url);
        
        if (!$repo_info) {
            return false;
        }
        
        // Get style.css from GitHub
        $style_url = "https://raw.githubusercontent.com/{$repo_info['owner']}/{$repo_info['name']}/{$branch}/style.css";
        
        $headers = array(
            'User-Agent' => 'WordPress-Aardvark-Plugin/1.0'
        );
        
        if (!empty($token)) {
            $headers['Authorization'] = 'token ' . $token;
        }
        
        $response = wp_remote_get($style_url, array(
            'headers' => $headers,
            'timeout' => 30
        ));
        
        if (is_wp_error($response)) {
            return false;
        }
        
        $style_content = wp_remote_retrieve_body($response);
        
        // Extract version from style.css header
        if (preg_match('/Version:\s*(.+)/i', $style_content, $matches)) {
            return trim($matches[1]);
        }
        
        return false;
    }
}
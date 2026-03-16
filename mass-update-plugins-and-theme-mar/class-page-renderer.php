<?php
/**
 * Page Renderer for Mass Update Plugins and Theme Mar
 * 
 * @package Aardvark
 * @subpackage MassUpdate
 */

if (!defined('ABSPATH')) {
    exit;
}

class Aardvark_Mass_Update_Page_Renderer {
    
    /**
     * Render the admin page
     */
    public function render() {
        ?>
        <div class="wrap">
            
            <!-- Page Header with Aardvark Branding -->
            <h1 style="display: flex; align-items: center; gap: 14px; margin: 0 0 20px 0;">
                <?php echo $this->get_aardvark_svg(); ?>
                Mass Update Plugins and Theme Mar
            </h1>
            
            <!-- Main Content Container -->
            <div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 4px; padding: 20px; margin-bottom: 20px;">
                
                <!-- Status Bar -->
                <div style="background: #f0f0f1; border: 1px solid #c3c4c7; border-radius: 4px; padding: 15px; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; gap: 20px;">
                        <div style="font-size: 14px; color: #50575e;">
                            <strong>Status:</strong> Ready
                        </div>
                        <div style="font-size: 14px; color: #50575e;">
                            <strong>Mode:</strong> Mass Update
                        </div>
                        <div style="font-size: 14px; color: #50575e;">
                            <strong>Database:</strong> <?php echo esc_html(DB_NAME); ?>
                        </div>
                    </div>
                </div>
                
                <!-- Main Update Section -->
                <div style="min-height: 400px; padding: 30px;">
                    
                    <!-- Update Target Information -->
                    <div style="background: #f6f7f7; border: 1px solid #ddd; border-radius: 4px; padding: 20px; margin-bottom: 30px;">
                        <h2 style="font-size: 18px; margin: 0 0 15px 0; color: #333;">Update Targets</h2>
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                            <!-- Ruplin Plugin -->
                            <div style="background: white; border: 1px solid #e0e0e0; border-radius: 4px; padding: 15px;">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <span style="font-size: 24px;">🔌</span>
                                    <strong style="font-size: 16px;">Ruplin</strong>
                                </div>
                                <div style="font-size: 13px; color: #666;">
                                    <div>Type: Plugin</div>
                                    <div>Path: ruplin/ruplin.php</div>
                                    <div id="ruplin-status" style="margin-top: 5px; font-weight: bold; color: #666;">Status: Ready</div>
                                </div>
                            </div>
                            
                            <!-- Grove Plugin -->
                            <div style="background: white; border: 1px solid #e0e0e0; border-radius: 4px; padding: 15px;">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <span style="font-size: 24px;">🌳</span>
                                    <strong style="font-size: 16px;">Grove</strong>
                                </div>
                                <div style="font-size: 13px; color: #666;">
                                    <div>Type: Plugin</div>
                                    <div>Path: grove/grove.php</div>
                                    <div id="grove-status" style="margin-top: 5px; font-weight: bold; color: #666;">Status: Ready</div>
                                </div>
                            </div>
                            
                            <!-- Staircase Theme -->
                            <div style="background: white; border: 1px solid #e0e0e0; border-radius: 4px; padding: 15px;">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <span style="font-size: 24px;">🎨</span>
                                    <strong style="font-size: 16px;">Staircase</strong>
                                </div>
                                <div style="font-size: 13px; color: #666;">
                                    <div>Type: Theme</div>
                                    <div>Folder: staircase</div>
                                    <div id="staircase-status" style="margin-top: 5px; font-weight: bold; color: #666;">Status: Ready</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Update Control Panel -->
                    <div style="text-align: center; margin-bottom: 30px;">
                        <button id="mass-update-button" class="mass-update-btn" style="font-size: 18px; padding: 15px 40px; background: #2271b1;">
                            🚀 Update All From GitHub
                        </button>
                        <div style="margin-top: 10px; font-size: 14px; color: #666;">
                            This will update Ruplin, Grove, and Staircase from their GitHub repositories
                        </div>
                    </div>
                    
                    <!-- Progress Display -->
                    <div id="update-progress" style="display: none; margin-bottom: 30px;">
                        <div style="background: #f0f0f1; border: 1px solid #c3c4c7; border-radius: 4px; padding: 20px;">
                            <h3 style="margin: 0 0 15px 0; font-size: 16px;">Update Progress</h3>
                            <div id="progress-spinner" style="text-align: center; margin: 20px 0;">
                                <div class="spinner" style="display: inline-block; width: 30px; height: 30px; border: 3px solid #f3f3f3; border-top: 3px solid #2271b1; border-radius: 50%; animation: spin 1s linear infinite;"></div>
                                <div style="margin-top: 10px; color: #666;">Updating components...</div>
                            </div>
                            <div id="progress-details" style="font-family: monospace; font-size: 13px; color: #333; background: white; padding: 10px; border-radius: 3px; min-height: 100px; white-space: pre-line;"></div>
                        </div>
                    </div>
                    
                    <!-- Results Display -->
                    <div id="update-results" style="display: none;">
                        <div style="border-radius: 4px; padding: 20px; margin-bottom: 20px;" id="results-container">
                            <h3 style="margin: 0 0 15px 0; font-size: 16px;">Update Results</h3>
                            <div id="results-summary" style="font-size: 18px; font-weight: bold; margin-bottom: 15px;"></div>
                            <div id="results-details" style="font-size: 14px; line-height: 1.6;"></div>
                        </div>
                        <div style="text-align: center;">
                            <button id="update-again-button" class="mass-update-btn" style="background: #666;">
                                Update Again
                            </button>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <!-- Footer Information -->
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
                <p style="color: #666; font-size: 13px;">
                    Aardvark Plugin • Mass Update Module • Version 1.0.0
                </p>
            </div>
            
        </div>
        
        <style>
            /* Page-specific styles */
            .wrap {
                margin: 10px 20px 0 2px;
            }
            
            /* Ensure our content isn't affected by any theme styles */
            .wrap h1 {
                font-size: 23px;
                font-weight: 400;
                line-height: 1.3;
            }
            
            /* Button styles */
            .mass-update-btn {
                display: inline-block;
                padding: 10px 20px;
                background: #2271b1;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                border: none;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.2s;
            }
            
            .mass-update-btn:hover {
                background: #135e96;
                color: white;
            }
            
            .mass-update-btn:disabled {
                background: #ccc;
                cursor: not-allowed;
                opacity: 0.7;
            }
            
            /* Spinner animation */
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            
            /* Table styles for future use */
            .mass-update-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            
            .mass-update-table th,
            .mass-update-table td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }
            
            .mass-update-table th {
                background: #f0f0f1;
                font-weight: 600;
            }
            
            .mass-update-table tr:hover {
                background: #f6f7f7;
            }
        </style>
        
        <script>
        jQuery(document).ready(function($) {
            console.log('Mass Update Plugins and Theme Mar page loaded');
            
            let isUpdating = false;
            
            // Main update button handler
            $('#mass-update-button').on('click', function() {
                if (isUpdating) return;
                
                if (!confirm('This will update Ruplin, Grove, and Staircase from GitHub. Continue?')) {
                    return;
                }
                
                isUpdating = true;
                const $button = $(this);
                
                // Reset status displays
                $('#ruplin-status').text('Status: Updating...').css('color', '#2271b1');
                $('#grove-status').text('Status: Updating...').css('color', '#2271b1');
                $('#staircase-status').text('Status: Updating...').css('color', '#2271b1');
                
                // Hide results, show progress
                $('#update-results').hide();
                $('#update-progress').show();
                $('#progress-details').html('Starting mass update process...\n');
                
                // Disable button
                $button.prop('disabled', true).text('⏳ Updating...');
                
                // Add progress message
                addProgressMessage('Initiating GitHub updates for all components...');
                
                // Perform the update
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'aardvark_mass_update_all',
                        nonce: '<?php echo wp_create_nonce('aardvark_mass_update'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            handleUpdateSuccess(response.data);
                        } else {
                            handleUpdateError(response.data || 'Update failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        handleUpdateError('Network error: ' + error);
                    },
                    complete: function() {
                        isUpdating = false;
                        $button.prop('disabled', false).text('🚀 Update All From GitHub');
                        $('#progress-spinner').hide();
                    }
                });
            });
            
            // Update again button
            $('#update-again-button').on('click', function() {
                $('#mass-update-button').click();
            });
            
            // Handle successful update
            function handleUpdateSuccess(data) {
                addProgressMessage('\\nUpdate process completed!');
                
                // Update individual statuses
                updateComponentStatus('ruplin', data.details.ruplin);
                updateComponentStatus('grove', data.details.grove);
                updateComponentStatus('staircase', data.details.staircase);
                
                // Show results
                setTimeout(function() {
                    $('#update-progress').hide();
                    $('#update-results').show();
                    
                    // Set results container color based on success
                    const hasErrors = data.error_count > 0;
                    $('#results-container').css({
                        'background': hasErrors ? '#fff3cd' : '#d1e7dd',
                        'border': '1px solid ' + (hasErrors ? '#ffecb5' : '#badbcc')
                    });
                    
                    // Display summary
                    $('#results-summary').html(data.overall_message).css({
                        'color': hasErrors ? '#664d03' : '#0f5132'
                    });
                    
                    // Display detailed messages
                    let detailsHtml = '<ul style="margin: 0; padding-left: 20px;">';
                    data.messages.forEach(function(message) {
                        const isError = message.includes('✗');
                        detailsHtml += '<li style="color: ' + (isError ? '#842029' : '#0f5132') + '">' + message + '</li>';
                    });
                    detailsHtml += '</ul>';
                    $('#results-details').html(detailsHtml);
                }, 1500);
            }
            
            // Handle update error
            function handleUpdateError(error) {
                addProgressMessage('\\n❌ ERROR: ' + error);
                
                // Update all statuses to error
                $('#ruplin-status').text('Status: Error').css('color', '#842029');
                $('#grove-status').text('Status: Error').css('color', '#842029');
                $('#staircase-status').text('Status: Error').css('color', '#842029');
                
                // Show error in results
                setTimeout(function() {
                    $('#update-progress').hide();
                    $('#update-results').show();
                    
                    $('#results-container').css({
                        'background': '#f8d7da',
                        'border': '1px solid #f5c2c7'
                    });
                    
                    $('#results-summary').html('Update failed').css('color', '#842029');
                    $('#results-details').html('<div style="color: #842029;">' + error + '</div>');
                }, 1500);
            }
            
            // Update individual component status
            function updateComponentStatus(component, result) {
                const $status = $('#' + component + '-status');
                
                if (result.status === 'success') {
                    $status.text('Status: ✓ Updated').css('color', '#0f5132');
                    addProgressMessage('✓ ' + component.charAt(0).toUpperCase() + component.slice(1) + ' updated successfully');
                } else {
                    $status.text('Status: ✗ Failed').css('color', '#842029');
                    addProgressMessage('✗ ' + component.charAt(0).toUpperCase() + component.slice(1) + ' update failed: ' + result.message);
                }
            }
            
            // Add message to progress details
            function addProgressMessage(message) {
                const $details = $('#progress-details');
                const currentContent = $details.html();
                const timestamp = new Date().toLocaleTimeString();
                $details.html(currentContent + '[' + timestamp + '] ' + message + '\\n');
                
                // Auto-scroll to bottom
                $details.scrollTop($details[0].scrollHeight);
            }
        });
        </script>
        <?php
    }
    
    /**
     * Get Aardvark SVG icon
     */
    private function get_aardvark_svg() {
        return '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" style="flex-shrink: 0;">
            <!-- Aardvark body -->
            <ellipse cx="15" cy="18" rx="8" ry="7" fill="#8B4513" stroke="#654321" stroke-width="1"/>
            
            <!-- Aardvark head -->
            <ellipse cx="15" cy="10" rx="5" ry="4" fill="#8B4513" stroke="#654321" stroke-width="1"/>
            
            <!-- Long snout/nose -->
            <ellipse cx="15" cy="6" rx="2" ry="3" fill="#A0522D" stroke="#654321" stroke-width="0.5"/>
            
            <!-- Ears -->
            <ellipse cx="11" cy="8" rx="2" ry="3" fill="#8B4513" stroke="#654321" stroke-width="0.5" transform="rotate(-20 11 8)"/>
            <ellipse cx="19" cy="8" rx="2" ry="3" fill="#8B4513" stroke="#654321" stroke-width="0.5" transform="rotate(20 19 8)"/>
            
            <!-- Eyes -->
            <circle cx="12.5" cy="9" r="1" fill="#000"/>
            <circle cx="17.5" cy="9" r="1" fill="#000"/>
            <circle cx="12.8" cy="8.7" r="0.3" fill="#FFF"/>
            <circle cx="17.8" cy="8.7" r="0.3" fill="#FFF"/>
            
            <!-- Nose tip -->
            <circle cx="15" cy="4" r="0.8" fill="#000"/>
            
            <!-- Legs -->
            <rect x="9" y="22" width="2" height="5" fill="#654321" rx="1"/>
            <rect x="13" y="22" width="2" height="5" fill="#654321" rx="1"/>
            <rect x="17" y="22" width="2" height="5" fill="#654321" rx="1"/>
            <rect x="21" y="22" width="2" height="5" fill="#654321" rx="1"/>
            
            <!-- Tail -->
            <ellipse cx="7" cy="20" rx="3" ry="1.5" fill="#8B4513" stroke="#654321" stroke-width="0.5" transform="rotate(-30 7 20)"/>
        </svg>';
    }
}
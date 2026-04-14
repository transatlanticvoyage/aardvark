<?php
/**
 * PPX Themes Plugins Mar - Page Renderer
 */

if (!defined('ABSPATH')) {
    exit;
}

class Aardvark_PPX_Themes_Plugins_Mar_Page {

    private function get_hauser_themes_data() {
        return array(
            array(
                'name'        => 'Cedar Journal',
                'slug'        => 'cedar-journal',
                'github_url'  => 'https://github.com/transatlanticvoyage/cedar-journal.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Cedar Journal WordPress theme.',
            ),
            array(
                'name'        => 'Skyline Forever',
                'slug'        => 'skyline-forever',
                'github_url'  => 'https://github.com/transatlanticvoyage/skyline-forever.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Skyline Forever WordPress theme.',
            ),
            array(
                'name'        => 'CleanPress',
                'slug'        => 'cleanpress',
                'github_url'  => 'https://github.com/transatlanticvoyage/cleanpress.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'CleanPress WordPress theme.',
            ),
            array(
                'name'        => 'Daily Writings',
                'slug'        => 'daily-writings',
                'github_url'  => 'https://github.com/transatlanticvoyage/daily-writings.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Daily Writings WordPress theme.',
            ),
            array(
                'name'        => 'Horizon Base',
                'slug'        => 'horizon-base',
                'github_url'  => 'https://github.com/transatlanticvoyage/horizon-base.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Horizon Base WordPress theme.',
            ),
            array(
                'name'        => 'TrueNorth',
                'slug'        => 'truenorth',
                'github_url'  => 'https://github.com/transatlanticvoyage/truenorth.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'TrueNorth WordPress theme.',
            ),
            array(
                'name'        => 'Urban Layout',
                'slug'        => 'urban-layout',
                'github_url'  => 'https://github.com/transatlanticvoyage/urban-layout.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Urban Layout WordPress theme.',
            ),
            array(
                'name'        => 'Pineframe',
                'slug'        => 'pineframe',
                'github_url'  => 'https://github.com/transatlanticvoyage/pineframe.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Pineframe WordPress theme.',
            ),
            array(
                'name'        => 'MetroPress',
                'slug'        => 'metropress',
                'github_url'  => 'https://github.com/transatlanticvoyage/metropress.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'MetroPress WordPress theme.',
            ),
            array(
                'name'        => 'Vista Core',
                'slug'        => 'vista-core',
                'github_url'  => 'https://github.com/transatlanticvoyage/vista-core.git',
                'branch_name' => 'main',
                'version'     => '1.0.0',
                'description' => 'Vista Core WordPress theme.',
            ),
        );
    }

    public function render() {
        $themes_data = $this->get_hauser_themes_data();
        ?>
        <div class="wrap">

            <h1 style="display: flex; align-items: center; gap: 14px; margin: 0 0 20px 0;">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" style="flex-shrink: 0;">
                    <ellipse cx="15" cy="18" rx="8" ry="7" fill="#8B4513" stroke="#654321" stroke-width="1"/>
                    <ellipse cx="15" cy="10" rx="5" ry="4" fill="#8B4513" stroke="#654321" stroke-width="1"/>
                    <ellipse cx="15" cy="6" rx="2" ry="3" fill="#A0522D" stroke="#654321" stroke-width="0.5"/>
                    <ellipse cx="11" cy="8" rx="2" ry="3" fill="#8B4513" stroke="#654321" stroke-width="0.5" transform="rotate(-20 11 8)"/>
                    <ellipse cx="19" cy="8" rx="2" ry="3" fill="#8B4513" stroke="#654321" stroke-width="0.5" transform="rotate(20 19 8)"/>
                    <circle cx="12.5" cy="9" r="1" fill="#000"/>
                    <circle cx="17.5" cy="9" r="1" fill="#000"/>
                    <circle cx="12.8" cy="8.7" r="0.3" fill="#FFF"/>
                    <circle cx="17.8" cy="8.7" r="0.3" fill="#FFF"/>
                    <circle cx="15" cy="4" r="0.8" fill="#000"/>
                    <rect x="9" y="22" width="2" height="5" fill="#654321" rx="1"/>
                    <rect x="13" y="22" width="2" height="5" fill="#654321" rx="1"/>
                    <rect x="17" y="22" width="2" height="5" fill="#654321" rx="1"/>
                    <rect x="21" y="22" width="2" height="5" fill="#654321" rx="1"/>
                    <ellipse cx="7" cy="20" rx="3" ry="1.5" fill="#8B4513" stroke="#654321" stroke-width="0.5" transform="rotate(-30 7 20)"/>
                </svg>
                PPX Themes Plugins Mar
            </h1>

            <h2 style="margin: 30px 0 15px 0;">Hauser Themes</h2>

            <!-- Search and Active Theme Badge -->
            <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 15px;">
                <input type="text" id="theme-search" placeholder="Search themes..." style="width: 300px; padding: 8px 12px; border: 1px solid #D1D5DB; border-radius: 4px; font-size: 14px; background: white; outline: none; transition: all 0.15s ease;" onFocus="this.style.outline='none'; this.style.borderColor='#3B82F6'; this.style.boxShadow='0 0 0 2px rgba(59, 130, 246, 0.1)'" onBlur="this.style.borderColor='#D1D5DB'; this.style.boxShadow='none'">
                <div style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border: 1px solid #c3c4c7; border-radius: 4px; background: #f0f6fc; font-size: 14px;">
                    <span style="color: #646970;">current active theme:</span>
                    <strong style="color: #0969da;"><?php echo esc_html(wp_get_theme()->get('Name')); ?></strong>
                </div>
            </div>

            <!-- Bulk Actions Section -->
            <div style="background: #f0f0f1; padding: 15px; margin: 20px 0; border: 1px solid #c3c4c7; border-radius: 5px;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <select id="bulk-action" style="padding: 8px; border: 1px solid #ddd; border-radius: 3px;">
                            <option value="">Bulk Actions</option>
                            <option value="update">Update</option>
                        </select>
                        <button type="button" id="apply-bulk-action" style="padding: 8px 15px; background: #2271b1; color: white; border: none; border-radius: 3px; cursor: pointer;">Process Selected Items</button>
                    </div>
                    <div style="display: flex; align-items: center; gap: 15px; color: #646970;">
                        <span id="selection-count" style="font-weight: bold;">0 items selected</span>
                        <button type="button" id="select-all" style="padding: 6px 12px; background: #f6f7f7; border: 1px solid #ddd; border-radius: 3px; cursor: pointer; font-size: 12px;">Select All</button>
                        <button type="button" id="deselect-all" style="padding: 6px 12px; background: #f6f7f7; border: 1px solid #ddd; border-radius: 3px; cursor: pointer; font-size: 12px;">Deselect All</button>
                    </div>
                </div>
            </div>

            <!-- Themes Table -->
            <div style="margin: 20px 0;">
                <table id="themes-table" style="width: 100%; border-collapse: collapse; border: 1px solid #555;">
                    <thead>
                        <tr style="background: #f1f1f1;">
                            <th style="border: 1px solid #555; padding: 12px; text-align: left; width: 40px;">
                                <input type="checkbox" id="select-all-checkbox">
                            </th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Theme Name</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Slug</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Version</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">GitHub URL</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Branch</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($themes_data as $theme):
                            $theme_obj = wp_get_theme($theme['slug']);
                            $is_installed = $theme_obj->exists();
                            $is_active = (get_stylesheet() === $theme['slug']);
                        ?>
                        <tr data-theme-slug="<?php echo esc_attr($theme['slug']); ?>">
                            <td style="border: 1px solid #555; padding: 8px; text-align: center;">
                                <input type="checkbox" class="theme-checkbox" value="<?php echo esc_attr($theme['slug']); ?>">
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <strong><?php echo esc_html($theme['name']); ?></strong>
                                <br><small><a href="<?php echo esc_url(rtrim($theme['github_url'], '.git')); ?>" target="_blank">Visit theme repo</a></small>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <span style="background: #f0f6fc; color: #0969da; padding: 2px 6px; border-radius: 3px; font-size: 12px; font-family: monospace;">
                                    <?php echo esc_html($theme['slug']); ?>
                                </span>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <?php echo esc_html($theme['version']); ?>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px; position: relative;">
                                <a href="<?php echo esc_url($theme['github_url']); ?>" target="_blank" style="color: #2271b1; text-decoration: none; font-size: 12px;">
                                    <?php echo esc_html(parse_url($theme['github_url'], PHP_URL_PATH)); ?>
                                </a>
                                <button class="copy-github-btn" data-copy-value="<?php echo esc_attr(ltrim(parse_url($theme['github_url'], PHP_URL_PATH), '/')); ?>" style="position: absolute; right: 0; top: 0; height: 100%; width: 12px; border: 1px solid gray; background: gray; cursor: pointer; font-size: 8px;" onmouseover="this.style.background='yellow'" onmouseout="this.style.background='gray'"></button>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px; position: relative;">
                                <span style="background: #f0f6fc; color: #0969da; padding: 2px 6px; border-radius: 3px; font-size: 12px; font-family: monospace;">
                                    <?php echo esc_html($theme['branch_name']); ?>
                                </span>
                                <button class="copy-branch-btn" data-copy-value="<?php echo esc_attr($theme['branch_name']); ?>" style="position: absolute; right: 0; top: 0; height: 100%; width: 12px; border: 1px solid gray; background: gray; cursor: pointer; font-size: 8px;" onmouseover="this.style.background='yellow'" onmouseout="this.style.background='gray'"></button>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <?php if (!$is_installed): ?>
                                    <!-- Install Button for uninstalled themes -->
                                    <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="install"
                                                style="padding: 10px 16px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 6px; cursor: pointer; background: #2271b1; color: white;">
                                            Install from GitHub
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <!-- Standard buttons for installed themes -->
                                    <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                        <!-- Update From Github Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="update-github"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 6px 0 0 6px; margin-right: -1px; cursor: pointer; <?php echo empty($theme['github_url']) ? 'background: #f0f0f0; color: #888; cursor: not-allowed;' : 'background: #2271b1; color: white;'; ?>"
                                                <?php echo empty($theme['github_url']) ? 'disabled' : ''; ?>>
                                            Update From Github
                                        </button>

                                        <!-- Activate Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="activate"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; margin-right: -1px; cursor: pointer; <?php echo $is_active ? 'background: #f0f0f0; color: #888; cursor: not-allowed;' : 'background: #00a32a; color: white;'; ?>"
                                                <?php echo $is_active ? 'disabled' : ''; ?>>
                                            Activate
                                        </button>

                                        <!-- De Plus Re-activate Button -->
                                        <button class="theme-action-btn de-plus-reactivate-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="de-plus-reactivate"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; margin-right: -1px; cursor: pointer; background: #2563EB; color: white;"
                                                <?php echo !$is_active ? 'disabled' : ''; ?>>
                                            <span class="btn-text">de plus re-activate</span>
                                            <div class="spinner" style="display: none; width: 20px; height: 20px; border: 2px solid #f3f3f3; border-top: 2px solid #3498db; border-radius: 50%; animation: spin 1s linear infinite; margin: 0 auto;"></div>
                                        </button>

                                        <!-- Deactivate Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="deactivate"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; margin-right: -1px; cursor: pointer; <?php echo !$is_active ? 'background: #f0f0f0; color: #888; cursor: not-allowed;' : 'background: #d63638; color: white;'; ?>"
                                                <?php echo !$is_active ? 'disabled' : ''; ?>>
                                            Deactivate
                                        </button>

                                        <!-- Delete Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="delete"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 0 6px 6px 0; cursor: pointer; background: #b32d2e; color: white;">
                                            Delete
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <style>
                .status-badge {
                    padding: 4px 8px;
                    border-radius: 3px;
                    font-size: 12px;
                    font-weight: bold;
                }
                .status-badge.active {
                    background: #d1e7dd;
                    color: #0f5132;
                }
                .status-badge.inactive {
                    background: #f8d7da;
                    color: #842029;
                }
                .editable {
                    cursor: pointer;
                    padding: 2px 4px;
                    border-radius: 3px;
                }
                .editable:hover {
                    background: #f0f0f1;
                }
                .editable.editing {
                    background: #fff;
                    border: 1px solid #2271b1;
                }
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
                .de-plus-reactivate-btn .spinner {
                    width: 20px;
                    height: 20px;
                    border: 2px solid #f3f3f3;
                    border-top: 2px solid #3498db;
                    border-radius: 50%;
                    animation: spin 1s linear infinite;
                }
                /* Debug feedback popup */
                .ppx-debug-overlay {
                    position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                    background: rgba(0,0,0,0.55); z-index: 99999;
                    display: flex; align-items: center; justify-content: center;
                }
                .ppx-debug-popup {
                    background: #fff; border-radius: 8px; box-shadow: 0 8px 32px rgba(0,0,0,0.25);
                    width: 620px; max-width: 90vw; max-height: 80vh; overflow-y: auto;
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                }
                .ppx-debug-popup-header {
                    padding: 16px 20px; border-bottom: 1px solid #e5e7eb;
                    display: flex; align-items: center; justify-content: space-between;
                }
                .ppx-debug-popup-header.error { background: #fef2f2; }
                .ppx-debug-popup-header.success { background: #f0fdf4; }
                .ppx-debug-popup-header h3 { margin: 0; font-size: 16px; }
                .ppx-debug-popup-header.error h3 { color: #dc2626; }
                .ppx-debug-popup-header.success h3 { color: #16a34a; }
                .ppx-debug-popup-close {
                    background: none; border: none; font-size: 22px; cursor: pointer;
                    color: #6b7280; padding: 0 4px; line-height: 1;
                }
                .ppx-debug-popup-close:hover { color: #111; }
                .ppx-debug-popup-body { padding: 16px 20px; }
                .ppx-debug-popup-body .ppx-debug-row {
                    display: flex; padding: 6px 0; border-bottom: 1px solid #f3f4f6; font-size: 13px;
                }
                .ppx-debug-popup-body .ppx-debug-label {
                    width: 130px; flex-shrink: 0; font-weight: 600; color: #374151;
                }
                .ppx-debug-popup-body .ppx-debug-value {
                    color: #6b7280; word-break: break-all; font-family: monospace; font-size: 12px;
                }
                .ppx-debug-popup-body .ppx-debug-response {
                    margin-top: 12px; padding: 10px; background: #f9fafb; border: 1px solid #e5e7eb;
                    border-radius: 4px; font-family: monospace; font-size: 11px; color: #374151;
                    white-space: pre-wrap; max-height: 200px; overflow-y: auto;
                }
            </style>
        </div>

        <script>
        jQuery(document).ready(function($) {

            // Debug feedback popup helper
            function showDebugPopup(type, title, data) {
                var headerClass = (type === 'success') ? 'success' : 'error';
                var html = '<div class="ppx-debug-overlay">';
                html += '<div class="ppx-debug-popup">';
                html += '<div class="ppx-debug-popup-header ' + headerClass + '">';
                html += '<h3>' + title + '</h3>';
                html += '<button class="ppx-debug-popup-close">&times;</button>';
                html += '</div>';
                html += '<div class="ppx-debug-popup-body">';

                if (typeof data === 'object' && data !== null) {
                    // Main message
                    if (data.message) {
                        html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Message</span><span class="ppx-debug-value">' + data.message + '</span></div>';
                    }
                    if (data.theme_slug) {
                        html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Theme Slug</span><span class="ppx-debug-value">' + data.theme_slug + '</span></div>';
                    }
                    if (data.github_url) {
                        html += '<div class="ppx-debug-row"><span class="ppx-debug-label">GitHub URL</span><span class="ppx-debug-value">' + data.github_url + '</span></div>';
                    }
                    if (data.branch) {
                        html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Branch</span><span class="ppx-debug-value">' + data.branch + '</span></div>';
                    }
                    // Debug sub-object
                    if (data.debug) {
                        var d = data.debug;
                        if (d.status_code) {
                            html += '<div class="ppx-debug-row"><span class="ppx-debug-label">HTTP Status</span><span class="ppx-debug-value">' + d.status_code + '</span></div>';
                        }
                        if (d.url) {
                            html += '<div class="ppx-debug-row"><span class="ppx-debug-label">API URL</span><span class="ppx-debug-value">' + d.url + '</span></div>';
                        }
                        if (d.owner) {
                            html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Repo Owner</span><span class="ppx-debug-value">' + d.owner + '</span></div>';
                        }
                        if (d.repo) {
                            html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Repo Name</span><span class="ppx-debug-value">' + d.repo + '</span></div>';
                        }
                        html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Has Token</span><span class="ppx-debug-value">' + (d.has_token ? 'Yes' : 'No') + '</span></div>';
                        if (d.response_body) {
                            html += '<div class="ppx-debug-response">' + $('<div>').text(d.response_body).html() + '</div>';
                        }
                    }
                } else {
                    html += '<div class="ppx-debug-row"><span class="ppx-debug-label">Message</span><span class="ppx-debug-value">' + (data || 'Unknown error') + '</span></div>';
                }

                html += '</div></div></div>';

                var $popup = $(html).appendTo('body');
                $popup.on('click', '.ppx-debug-popup-close', function() { $popup.remove(); });
                $popup.on('click', function(e) { if ($(e.target).hasClass('ppx-debug-overlay')) $popup.remove(); });
            }
            // Selection functionality
            let selectedCount = 0;

            function updateSelectionCount() {
                selectedCount = $('.theme-checkbox:checked').length;
                $('#selection-count').text(selectedCount + ' items selected');
            }

            $('#select-all-checkbox').on('change', function() {
                $('.theme-checkbox').prop('checked', this.checked);
                updateSelectionCount();
            });

            $('.theme-checkbox').on('change', function() {
                updateSelectionCount();
                $('#select-all-checkbox').prop('checked', $('.theme-checkbox:checked').length === $('.theme-checkbox').length);
            });

            $('#select-all').on('click', function() {
                $('.theme-checkbox').prop('checked', true);
                $('#select-all-checkbox').prop('checked', true);
                updateSelectionCount();
            });

            $('#deselect-all').on('click', function() {
                $('.theme-checkbox').prop('checked', false);
                $('#select-all-checkbox').prop('checked', false);
                updateSelectionCount();
            });

            // Search functionality
            $('#theme-search').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                $('#themes-table tbody tr').each(function() {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.indexOf(searchText) > -1);
                });
            });

            // Copy buttons for GitHub URL
            $(document).on('click', '.copy-github-btn', function(e) {
                e.preventDefault();
                var copyValue = $(this).data('copy-value');
                var $btn = $(this);
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(copyValue).then(function() {
                        $btn.css('background', 'green');
                        setTimeout(function() { $btn.css('background', 'gray'); }, 1000);
                    });
                } else {
                    var $temp = $('<input>');
                    $('body').append($temp);
                    $temp.val(copyValue).select();
                    document.execCommand('copy');
                    $temp.remove();
                    $btn.css('background', 'green');
                    setTimeout(function() { $btn.css('background', 'gray'); }, 1000);
                }
            });

            // Copy buttons for Branch
            $(document).on('click', '.copy-branch-btn', function(e) {
                e.preventDefault();
                var copyValue = $(this).data('copy-value');
                var $btn = $(this);
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(copyValue).then(function() {
                        $btn.css('background', 'green');
                        setTimeout(function() { $btn.css('background', 'gray'); }, 1000);
                    });
                } else {
                    var $temp = $('<input>');
                    $('body').append($temp);
                    $temp.val(copyValue).select();
                    document.execCommand('copy');
                    $temp.remove();
                    $btn.css('background', 'green');
                    setTimeout(function() { $btn.css('background', 'gray'); }, 1000);
                }
            });

            // Install from GitHub action
            $(document).on('click', '.theme-action-btn[data-action="install"]', function() {
                var $button = $(this);
                var themeSlug = $button.data('theme');

                if (!confirm('Are you sure you want to install "' + themeSlug + '" from GitHub?')) {
                    return;
                }

                var originalText = $button.text();
                $button.text('Installing...').prop('disabled', true).css({'opacity': '0.7', 'cursor': 'not-allowed'});

                $.post(ajaxurl, {
                    action: 'aardvark_install_theme',
                    theme: themeSlug,
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_install'); ?>'
                }).done(function(response) {
                    if (response.success) {
                        showDebugPopup('success', 'Theme Installed', {message: 'Theme "' + themeSlug + '" installed successfully.'});
                        setTimeout(function() { location.reload(); }, 1500);
                    } else {
                        showDebugPopup('error', 'Install Failed', response.data);
                        $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    }
                }).fail(function(jqXHR) {
                    showDebugPopup('error', 'Install Request Failed', {message: 'AJAX request failed', debug: {status_code: jqXHR.status, response_body: jqXHR.responseText ? jqXHR.responseText.substring(0, 500) : ''}});
                    $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                });
            });

            // Update From Github action
            $(document).on('click', '.theme-action-btn[data-action="update-github"]', function() {
                var $button = $(this);
                var themeSlug = $button.data('theme');

                if (!confirm('Are you sure you want to update "' + themeSlug + '" from GitHub?')) {
                    return;
                }

                var originalText = $button.text();
                $button.text('Updating...').prop('disabled', true).css({'opacity': '0.7', 'cursor': 'not-allowed'});

                $.post(ajaxurl, {
                    action: 'aardvark_update_theme',
                    theme: themeSlug,
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_update'); ?>'
                }).done(function(response) {
                    if (response.success) {
                        showDebugPopup('success', 'Theme Updated', {message: 'Theme "' + themeSlug + '" updated successfully.'});
                        setTimeout(function() { location.reload(); }, 1500);
                    } else {
                        showDebugPopup('error', 'Update Failed', response.data);
                        $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    }
                }).fail(function(jqXHR) {
                    showDebugPopup('error', 'Update Request Failed', {message: 'AJAX request failed', debug: {status_code: jqXHR.status, response_body: jqXHR.responseText ? jqXHR.responseText.substring(0, 500) : ''}});
                    $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                });
            });

            // Activate action
            $(document).on('click', '.theme-action-btn[data-action="activate"]', function() {
                var $button = $(this);
                var themeSlug = $button.data('theme');

                if (!confirm('Are you sure you want to activate "' + themeSlug + '"?')) {
                    return;
                }

                var originalText = $button.text();
                $button.text('Activating...').prop('disabled', true).css({'opacity': '0.7', 'cursor': 'not-allowed'});

                $.post(ajaxurl, {
                    action: 'aardvark_activate_theme',
                    theme: themeSlug,
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_activate'); ?>'
                }).done(function(response) {
                    if (response.success) {
                        alert('Theme "' + themeSlug + '" activated successfully.');
                        location.reload();
                    } else {
                        alert('Error activating theme: ' + (response.data || 'Unknown error'));
                        $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    }
                }).fail(function() {
                    alert('Failed to activate theme. Please try again.');
                    $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                });
            });

            // De plus re-activate action
            $(document).on('click', '.theme-action-btn[data-action="de-plus-reactivate"]', function() {
                var $button = $(this);
                var themeSlug = $button.data('theme');

                if (!confirm('Are you sure you want to de-activate and re-activate "' + themeSlug + '"?')) {
                    return;
                }

                $button.find('.btn-text').hide();
                $button.find('.spinner').show();
                $button.prop('disabled', true).css({'opacity': '0.7', 'cursor': 'not-allowed'});

                // Step 1: Switch to default theme to deactivate
                $.post(ajaxurl, {
                    action: 'aardvark_activate_theme',
                    theme: 'twentytwentyfour',
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_activate'); ?>'
                }).done(function(response) {
                    // Step 2: Re-activate original theme
                    $.post(ajaxurl, {
                        action: 'aardvark_activate_theme',
                        theme: themeSlug,
                        nonce: '<?php echo wp_create_nonce('aardvark_theme_activate'); ?>'
                    }).done(function(response2) {
                        if (response2.success) {
                            alert('Theme "' + themeSlug + '" de-activated and re-activated successfully.');
                            location.reload();
                        } else {
                            alert('Error re-activating theme: ' + (response2.data || 'Unknown error'));
                            $button.find('.spinner').hide();
                            $button.find('.btn-text').show();
                            $button.prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                        }
                    }).fail(function() {
                        alert('Failed to re-activate theme. Please try again.');
                        $button.find('.spinner').hide();
                        $button.find('.btn-text').show();
                        $button.prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    });
                }).fail(function() {
                    alert('Failed to deactivate theme. Please try again.');
                    $button.find('.spinner').hide();
                    $button.find('.btn-text').show();
                    $button.prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                });
            });

            // Deactivate action
            $(document).on('click', '.theme-action-btn[data-action="deactivate"]', function() {
                var $button = $(this);
                var themeSlug = $button.data('theme');

                if (!confirm('Are you sure you want to deactivate "' + themeSlug + '"? This will switch to the default theme.')) {
                    return;
                }

                $button.text('Deactivating...').prop('disabled', true).css({'opacity': '0.7', 'cursor': 'not-allowed'});

                $.post(ajaxurl, {
                    action: 'aardvark_activate_theme',
                    theme: 'twentytwentyfour',
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_activate'); ?>'
                }).done(function(response) {
                    if (response.success) {
                        alert('Theme "' + themeSlug + '" deactivated. Switched to default theme.');
                        location.reload();
                    } else {
                        alert('Error deactivating theme: ' + (response.data || 'Unknown error'));
                        $button.text('Deactivate').prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    }
                }).fail(function() {
                    alert('Failed to deactivate theme. Please try again.');
                    $button.text('Deactivate').prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                });
            });

            // Delete action
            $(document).on('click', '.theme-action-btn[data-action="delete"]', function() {
                var $button = $(this);
                var themeSlug = $button.data('theme');

                if (!confirm('Are you sure you want to delete "' + themeSlug + '"? This action cannot be undone.')) {
                    return;
                }

                $button.text('Deleting...').prop('disabled', true).css({'opacity': '0.7', 'cursor': 'not-allowed'});

                $.post(ajaxurl, {
                    action: 'aardvark_delete_theme',
                    theme: themeSlug,
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_delete'); ?>'
                }).done(function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error deleting theme: ' + (response.data || 'Unknown error'));
                        $button.text('Delete').prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    }
                }).fail(function() {
                    alert('Failed to delete theme. Please try again.');
                    $button.text('Delete').prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                });
            });

            // Bulk actions
            $('#apply-bulk-action').on('click', function() {
                var action = $('#bulk-action').val();
                var selected = $('.theme-checkbox:checked').map(function() {
                    return this.value;
                }).get();

                if (!action) {
                    alert('Please select a bulk action.');
                    return;
                }

                if (selected.length === 0) {
                    alert('Please select at least one theme.');
                    return;
                }

                if (!confirm('Are you sure you want to ' + action + ' ' + selected.length + ' theme(s)?')) {
                    return;
                }

                var $btn = $(this);
                $btn.text('Processing...').prop('disabled', true);

                var completed = 0;
                var errors = [];

                selected.forEach(function(themeSlug) {
                    var ajaxAction = '';
                    var nonce = '';

                    if (action === 'update') {
                        ajaxAction = 'aardvark_update_theme';
                        nonce = '<?php echo wp_create_nonce('aardvark_theme_update'); ?>';
                    }

                    if (ajaxAction) {
                        $.post(ajaxurl, {
                            action: ajaxAction,
                            theme: themeSlug,
                            nonce: nonce
                        }).done(function(response) {
                            if (!response.success) {
                                errors.push(themeSlug + ': ' + (response.data || 'Unknown error'));
                            }
                        }).fail(function() {
                            errors.push(themeSlug + ': Request failed');
                        }).always(function() {
                            completed++;
                            if (completed === selected.length) {
                                if (errors.length > 0) {
                                    alert('Some actions failed:\n' + errors.join('\n'));
                                }
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
        </script>
        <?php
    }
}

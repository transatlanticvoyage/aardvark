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
                        <?php foreach ($themes_data as $theme): ?>
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
                                <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                    <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="update-github"
                                            style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 6px 0 0 6px; margin-right: -1px; cursor: pointer; background: #2271b1; color: white;">
                                        Update From Github
                                    </button>
                                    <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme['slug']); ?>" data-action="delete"
                                            style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 0 6px 6px 0; cursor: pointer; background: #b32d2e; color: white;">
                                        Delete
                                    </button>
                                </div>
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
            </style>
        </div>

        <script>
        jQuery(document).ready(function($) {
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
                    action: 'aardvark_update_github_theme',
                    theme_slug: themeSlug,
                    nonce: '<?php echo wp_create_nonce('aardvark_theme_update'); ?>'
                }).done(function(response) {
                    if (response.success) {
                        alert('Theme "' + themeSlug + '" updated successfully.');
                        location.reload();
                    } else {
                        alert('Error updating theme: ' + (response.data || 'Unknown error'));
                        $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
                    }
                }).fail(function() {
                    alert('Failed to update theme. Please try again.');
                    $button.text(originalText).prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
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
                    theme_slug: themeSlug,
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
                        ajaxAction = 'aardvark_update_github_theme';
                        nonce = '<?php echo wp_create_nonce('aardvark_theme_update'); ?>';
                    }

                    if (ajaxAction) {
                        $.post(ajaxurl, {
                            action: ajaxAction,
                            theme_slug: themeSlug,
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

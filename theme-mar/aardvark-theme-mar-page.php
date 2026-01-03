<?php

class Aardvark_Theme_Mar_Page {
    
    public function render() {
        $themes_data = $this->get_themes_data();
        ?>
        <div class="wrap">
            
            <h1 style="display: flex; align-items: center; gap: 14px; margin: 0 0 20px 0;">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" style="flex-shrink: 0;">
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
                </svg>
                Aardvark Theme Mar
            </h1>
            
            <!-- Theme Filters -->
            <div style="margin-bottom: 20px; display: flex; align-items: flex-start; gap: 30px;">
                <div>
                    <div style="font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                        theme filter
                    </div>
                    <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                        <button type="button" data-filter="all" class="theme-filter-btn active" style="padding: 10px 8px; font-size: 14px; border: 1px solid #3B82F6; background: #3B82F6; color: white; border-radius: 6px 0 0 6px; margin-right: -1px; cursor: pointer;">all</button>
                        <button type="button" data-filter="active" class="theme-filter-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; background: white; color: black; margin-right: -1px; cursor: pointer;">active only</button>
                        <button type="button" data-filter="inactive" class="theme-filter-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 0 6px 6px 0; cursor: pointer; background: white; color: black;">inactive only</button>
                    </div>
                </div>
                
                <!-- Theme Management Links and Database Info -->
                <div style="align-self: flex-end; display: flex; align-items: center; gap: 10px;">
                    <a href="/wp-admin/themes.php" style="display: inline-block; padding: 10px 16px; font-size: 14px; background: #2271b1; color: white; text-decoration: none; border-radius: 6px; font-weight: 500; transition: background-color 0.15s ease;" onMouseOver="this.style.background='#1e5a8a'" onMouseOut="this.style.background='#2271b1'">
                        wp themes
                    </a>
                    <a href="/wp-admin/theme-install.php" style="display: inline-block; padding: 10px 16px; font-size: 14px; background: #2271b1; color: white; text-decoration: none; border-radius: 6px; font-weight: 500; transition: background-color 0.15s ease;" onMouseOver="this.style.background='#1e5a8a'" onMouseOut="this.style.background='#2271b1'">
                        add themes
                    </a>
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <input type="text" id="db-name-display" value="<?php echo esc_attr(DB_NAME); ?>" readonly style="padding: 8px 12px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px; background: #f9f9f9; color: #333; font-family: monospace;">
                        <button type="button" id="copy-db-name" style="padding: 8px 12px; font-size: 14px; background: #00a32a; color: white; border: none; border-radius: 4px; cursor: pointer;" title="Copy database name">📋</button>
                    </div>
                </div>
            </div>
            
            <!-- Rocket Chamber Div - Contains the pagination controls and search -->
            <div class="rocket_chamber_div" style="border: 1px solid black; padding: 0; margin: 20px 0; position: relative;">
                <div style="position: absolute; top: 4px; left: 4px; font-size: 16px; font-weight: bold; display: flex; align-items: center; gap: 6px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="black" style="transform: rotate(15deg);">
                        <!-- Rocket body -->
                        <ellipse cx="12" cy="8" rx="3" ry="6" fill="black"/>
                        <!-- Rocket nose cone -->
                        <path d="M12 2 L15 8 L9 8 Z" fill="black"/>
                        <!-- Left fin -->
                        <path d="M9 12 L7 14 L9 16 Z" fill="black"/>
                        <!-- Right fin -->
                        <path d="M15 12 L17 14 L15 16 Z" fill="black"/>
                        <!-- Exhaust flames -->
                        <path d="M10 14 L9 18 L10.5 16 L12 20 L13.5 16 L15 18 L14 14 Z" fill="black"/>
                        <!-- Window -->
                        <circle cx="12" cy="6" r="1" fill="white"/>
                    </svg>
                    rocket_chamber
                </div>
                <div style="margin-top: 24px; padding-top: 4px; padding-bottom: 0; padding-left: 8px; padding-right: 8px;">
                    <div style="display: flex; align-items: end; justify-content: space-between;">
                        <div style="display: flex; align-items: end; gap: 32px;">
                            <!-- Row pagination, search box, and column pagination table -->
                            <table style="border-collapse: collapse;">
                                <tbody>
                                    <tr>
                                        <td style="border: 1px solid black; padding: 4px; text-align: center;">
                                            <div style="font-size: 16px; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                                <span style="font-weight: bold;">row pagination</span>
                                                <span style="font-size: 14px; font-weight: normal;">
                                                    Showing <span style="font-weight: bold;" id="themes-showing"><?php echo count($themes_data); ?></span> of <span style="font-weight: bold;" id="themes-total"><?php echo count($themes_data); ?></span> themes
                                                </span>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px; text-align: center;">
                                            <div style="font-size: 16px; font-weight: bold;">
                                                search box 2
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px; text-align: center;">
                                            <div style="font-size: 16px; font-weight: bold;">
                                                wolf exclusion band
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px; text-align: center;">
                                            <div style="font-size: 16px; font-weight: bold;">
                                                column templates
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px; text-align: center;">
                                            <div style="font-size: 16px; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                                <span style="font-weight: bold;">column pagination</span>
                                                <span style="font-size: 14px; font-weight: normal;">
                                                    Showing <span style="font-weight: bold;" id="columns-showing">8</span> columns of <span style="font-weight: bold;">8</span> total columns
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid black; padding: 4px;">
                                            <div style="display: flex; align-items: end; gap: 16px;">
                                                <!-- Row Pagination Bar 1: Items per page selector -->
                                                <div style="display: flex; align-items: center;">
                                                    <span style="font-size: 12px; color: #4B5563; margin-right: 8px;">Rows/page:</span>
                                                    <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                                        <button type="button" data-rows="10" class="rows-per-page-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 6px 0 0 6px; margin-right: -1px; cursor: pointer; background: white;">10</button>
                                                        <button type="button" data-rows="25" class="rows-per-page-btn active" style="padding: 10px 8px; font-size: 14px; border: 1px solid #3B82F6; background: #3B82F6; color: white; margin-right: -1px; cursor: pointer;">25</button>
                                                        <button type="button" data-rows="50" class="rows-per-page-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; margin-right: -1px; cursor: pointer; background: white;">50</button>
                                                        <button type="button" data-rows="100" class="rows-per-page-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; margin-right: -1px; cursor: pointer; background: white;">100</button>
                                                        <button type="button" data-rows="200" class="rows-per-page-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; margin-right: -1px; cursor: pointer; background: white;">200</button>
                                                        <button type="button" data-rows="all" class="rows-per-page-btn" style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 0 6px 6px 0; cursor: pointer; background: white;">All</button>
                                                    </div>
                                                </div>
                                                <!-- Row Pagination Bar 2: Page navigation -->
                                                <div style="display: flex; align-items: center;">
                                                    <span style="font-size: 12px; color: #4B5563; margin-right: 8px;">Row page:</span>
                                                    <nav style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                                        <button type="button" id="prev-page" style="position: relative; display: inline-flex; align-items: center; border-radius: 6px 0 0 6px; padding: 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; color: #9CA3AF; border: 1px solid #D1D5DB; cursor: pointer; background: white;">
                                                            <svg style="width: 16px; height: 16px; color: #6B7280;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                                <path d="M1 4v6h6" />
                                                                <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" id="page-info-btn" style="position: relative; display: inline-flex; align-items: center; padding: 8px 12px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #D1D5DB; margin-left: -1px; cursor: pointer; background: white; font-weight: bold;">1</button>
                                                        <button type="button" id="next-page" style="position: relative; display: inline-flex; align-items: center; border-radius: 0 6px 6px 0; padding: 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; color: #9CA3AF; border: 1px solid #D1D5DB; margin-left: -1px; cursor: pointer; background: white;">
                                                            <svg style="width: 16px; height: 16px; color: #6B7280;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                                <path d="M23 4v6h-6" />
                                                                <path d="M20.49 15a9 9 0 1 1-2.13-9.36L23 10" />
                                                            </svg>
                                                        </button>
                                                    </nav>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px;">
                                            <div style="display: flex; align-items: end;">
                                                <input type="text" id="theme-search" placeholder="Search themes..." style="width: 200px; margin-bottom: 3px; padding: 8px 12px; border: 1px solid #D1D5DB; border-radius: 4px; font-size: 14px; background: white; outline: none; transition: all 0.15s ease;" onFocus="this.style.outline='none'; this.style.borderColor='#3B82F6'; this.style.boxShadow='0 0 0 2px rgba(59, 130, 246, 0.1)'" onBlur="this.style.borderColor='#D1D5DB'; this.style.boxShadow='none'">
                                            </div>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px;">
                                            <button type="button" id="wolf-options" style="background: #2563EB; color: white; font-weight: 500; padding: 8px 16px; border-radius: 6px; font-size: 14px; transition: background-color 0.15s ease; border: none; cursor: pointer;" onMouseOver="this.style.background='#1D4ED8'" onMouseOut="this.style.background='#2563EB'">
                                                wolf options
                                            </button>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px;">
                                            <button type="button" id="column-templates" style="background: #7C3AED; color: white; font-weight: 500; padding: 8px 16px; border-radius: 6px; font-size: 14px; transition: background-color 0.15s ease; border: none; cursor: pointer;" onMouseOver="this.style.background='#6D28D9'" onMouseOut="this.style.background='#7C3AED'">
                                                use the pillarshift coltemp system
                                            </button>
                                        </td>
                                        <td style="border: 1px solid black; padding: 4px;">
                                            <div style="display: flex; align-items: end; gap: 16px;">
                                                <!-- Column Pagination Bar 1: Columns per page quantity selector -->
                                                <div style="display: flex; align-items: center;">
                                                    <span style="font-size: 12px; color: #4B5563; margin-right: 8px;">Cols/page:</span>
                                                    <button type="button" data-cols="6" class="cols-per-page-btn" style="padding: 10px 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; border-radius: 4px 0 0 4px; margin-right: -1px; cursor: pointer; background: white;">6</button>
                                                    <button type="button" data-cols="8" class="cols-per-page-btn active" style="padding: 10px 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; background: #f8f782; color: black; margin-right: -1px; cursor: pointer;">8</button>
                                                    <button type="button" data-cols="10" class="cols-per-page-btn" style="padding: 10px 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; margin-right: -1px; cursor: pointer; background: white;">10</button>
                                                    <button type="button" data-cols="all" class="cols-per-page-btn" style="padding: 10px 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; border-radius: 0 4px 4px 0; cursor: pointer; background: white;">All</button>
                                                </div>
                                                <!-- Column Pagination Bar 2: Current column page selector -->
                                                <div style="display: flex; align-items: center;">
                                                    <span style="font-size: 12px; color: #4B5563; margin-right: 8px;">Col page:</span>
                                                    <button type="button" id="first-col-page" style="padding: 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; border-radius: 4px 0 0 4px; margin-right: -1px; cursor: pointer; background: white;">≪</button>
                                                    <button type="button" id="prev-col-page" style="padding: 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; margin-right: -1px; cursor: pointer; background: white;">
                                                        <svg style="width: 16px; height: 16px; color: #6B7280;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                            <path d="M1 4v6h6" />
                                                            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" id="col-page-display" style="padding: 8px 12px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; margin-right: -1px; cursor: pointer; background: white; font-weight: bold;">1</button>
                                                    <button type="button" id="next-col-page" style="padding: 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; margin-right: -1px; cursor: pointer; background: white;">
                                                        <svg style="width: 16px; height: 16px; color: #6B7280;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                            <path d="M23 4v6h-6" />
                                                            <path d="M20.49 15a9 9 0 1 1-2.13-9.36L23 10" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" id="last-col-page" style="padding: 8px; font-size: 14px; padding-top: 10px; padding-bottom: 10px; border: 1px solid #000; border-radius: 0 4px 4px 0; cursor: pointer; background: white;">≫</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bulk Actions Section -->
            <div style="background: #f0f0f1; padding: 15px; margin: 20px 0; border: 1px solid #c3c4c7; border-radius: 5px;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <select id="bulk-action" style="padding: 8px; border: 1px solid #ddd; border-radius: 3px;">
                            <option value="">Bulk Actions</option>
                            <option value="activate">Activate Theme</option>
                            <option value="delete">Delete Themes</option>
                        </select>
                        <button type="button" id="apply-bulk-action" style="padding: 8px 15px; background: #2271b1; color: white; border: none; border-radius: 3px; cursor: pointer;">🚀 Process Selected Items</button>
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
                            <th style="border: 1px solid #555; padding: 12px; text-align: center; width: 40px;">
                                <span style="color: darkgreen; font-size: 16px;">🎨</span>
                            </th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Theme Name</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Version</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Status</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Author</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Description</th>
                            <th style="border: 1px solid #555; padding: 12px; text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($themes_data as $theme_slug => $theme): ?>
                        <tr data-theme-slug="<?php echo esc_attr($theme_slug); ?>">
                            <td style="border: 1px solid #555; padding: 8px; text-align: center;">
                                <input type="checkbox" class="theme-checkbox" value="<?php echo esc_attr($theme_slug); ?>">
                            </td>
                            <td style="border: 1px solid #555; padding: 8px; text-align: center;">
                                <?php if ($theme['is_active']): ?>
                                    <span style="color: darkgreen; font-size: 16px;">🎨</span>
                                <?php else: ?>
                                    <span style="color: gray; font-size: 16px; opacity: 0.3;">🎨</span>
                                <?php endif; ?>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <strong><?php echo esc_html($theme['Name']); ?></strong>
                                <?php if (!empty($theme['ThemeURI'])): ?>
                                <br><small><a href="<?php echo esc_url($theme['ThemeURI']); ?>" target="_blank">Visit theme site</a></small>
                                <?php endif; ?>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <?php echo esc_html($theme['Version']); ?>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <span class="status-badge <?php echo $theme['is_active'] ? 'active' : 'inactive'; ?>">
                                    <?php echo $theme['is_active'] ? 'Active' : 'Inactive'; ?>
                                </span>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <?php echo esc_html($theme['Author']); ?>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <?php echo esc_html($theme['Description']); ?>
                            </td>
                            <td style="border: 1px solid #555; padding: 8px;">
                                <?php if ($theme['install_status'] === 'available'): ?>
                                    <!-- Install Button for GitHub themes not yet installed -->
                                    <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme_slug); ?>" data-action="install-github" 
                                                style="padding: 10px 16px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 6px; cursor: pointer; background: #2271b1; color: white;">
                                            Install from GitHub
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <!-- Standard buttons for installed themes -->
                                    <div style="display: inline-flex; border-radius: 6px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                                        <?php if ($theme['is_github_theme']): ?>
                                        <!-- Update From GitHub Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme_slug); ?>" data-action="update-github" 
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 6px 0 0 6px; margin-right: -1px; cursor: pointer; background: #2271b1; color: white;">
                                            Update From GitHub
                                        </button>
                                        <?php endif; ?>
                                        
                                        <?php if (!$theme['is_active']): ?>
                                        <!-- Activate Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme_slug); ?>" data-action="activate" 
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; <?php echo !$theme['is_github_theme'] ? 'border-radius: 6px 0 0 6px;' : ''; ?> margin-right: -1px; cursor: pointer; background: #00a32a; color: white;">
                                            Activate
                                        </button>
                                        <?php endif; ?>
                                        
                                        <!-- Preview Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme_slug); ?>" data-action="preview"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; <?php echo $theme['is_active'] && !$theme['is_github_theme'] ? 'border-radius: 6px 0 0 6px;' : ''; ?> margin-right: -1px; cursor: pointer; background: #2271b1; color: white;">
                                            Preview
                                        </button>
                                        
                                        <?php if (!$theme['is_active']): ?>
                                        <!-- Delete Button -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme_slug); ?>" data-action="delete"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 0 6px 6px 0; cursor: pointer; background: #b32d2e; color: white;">
                                            Delete
                                        </button>
                                        <?php else: ?>
                                        <!-- Customize Button for Active Theme -->
                                        <button class="theme-action-btn" data-theme="<?php echo esc_attr($theme_slug); ?>" data-action="customize"
                                                style="padding: 10px 8px; font-size: 14px; border: 1px solid #D1D5DB; border-radius: 0 6px 6px 0; cursor: pointer; background: #7C3AED; color: white;">
                                            Customize
                                        </button>
                                        <?php endif; ?>
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
            </style>

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
            
            // Theme actions
            $('.theme-action-btn').on('click', function() {
                const $button = $(this);
                const theme = $button.data('theme');
                const action = $button.data('action');
                
                if (action === 'activate') {
                    $button.prop('disabled', true).text('Activating...');
                    
                    $.post(ajaxurl, {
                        action: 'aardvark_activate_theme',
                        theme: theme,
                        nonce: '<?php echo wp_create_nonce('aardvark_theme_activate'); ?>'
                    }).done(function(response) {
                        if (response.success) {
                            alert('Theme activated successfully!');
                            location.reload();
                        } else {
                            alert('Error: ' + response.data);
                            $button.prop('disabled', false).text('Activate');
                        }
                    }).fail(function() {
                        alert('Activation failed. Please try again.');
                        $button.prop('disabled', false).text('Activate');
                    });
                } else if (action === 'preview') {
                    window.open('/wp-admin/customize.php?theme=' + encodeURIComponent(theme), '_blank');
                } else if (action === 'customize') {
                    window.location.href = '/wp-admin/customize.php';
                } else if (action === 'delete') {
                    if (confirm('Are you sure you want to delete this theme? This action cannot be undone.')) {
                        $button.prop('disabled', true).text('Deleting...');
                        
                        $.post(ajaxurl, {
                            action: 'aardvark_delete_theme',
                            theme: theme,
                            nonce: '<?php echo wp_create_nonce('aardvark_theme_delete'); ?>'
                        }).done(function(response) {
                            if (response.success) {
                                alert('Theme deleted successfully!');
                                location.reload();
                            } else {
                                alert('Error: ' + response.data);
                                $button.prop('disabled', false).text('Delete');
                            }
                        }).fail(function() {
                            alert('Deletion failed. Please try again.');
                            $button.prop('disabled', false).text('Delete');
                        });
                    }
                } else if (action === 'install-github') {
                    if (confirm('Install this theme from GitHub?')) {
                        $button.prop('disabled', true).text('Installing...');
                        
                        $.post(ajaxurl, {
                            action: 'aardvark_install_theme',
                            theme: theme,
                            nonce: '<?php echo wp_create_nonce('aardvark_theme_install'); ?>'
                        }).done(function(response) {
                            if (response.success) {
                                alert('Theme installed successfully!');
                                setTimeout(function() {
                                    location.reload();
                                }, 500);
                            } else {
                                alert('Error: ' + response.data);
                                $button.prop('disabled', false).text('Install from GitHub');
                            }
                        }).fail(function() {
                            alert('Installation failed. Please try again.');
                            $button.prop('disabled', false).text('Install from GitHub');
                        });
                    }
                } else if (action === 'update-github') {
                    if (confirm('Update this theme from GitHub?')) {
                        $button.prop('disabled', true).text('Updating...');
                        
                        $.post(ajaxurl, {
                            action: 'aardvark_update_theme',
                            theme: theme,
                            nonce: '<?php echo wp_create_nonce('aardvark_theme_update'); ?>'
                        }).done(function(response) {
                            if (response.success) {
                                alert('Theme updated successfully from GitHub!');
                                setTimeout(function() {
                                    location.reload();
                                }, 500);
                            } else {
                                alert('Error: ' + response.data);
                                $button.prop('disabled', false).text('Update From GitHub');
                            }
                        }).fail(function() {
                            alert('Update failed. Please try again.');
                            $button.prop('disabled', false).text('Update From GitHub');
                        });
                    }
                }
            });
            
            // Search functionality
            $('#theme-search').on('keyup', function() {
                const searchText = $(this).val().toLowerCase();
                $('#themes-table tbody tr').each(function() {
                    const $row = $(this);
                    const text = $row.text().toLowerCase();
                    $row.toggle(text.indexOf(searchText) > -1);
                });
                updateDisplayCounts();
            });
            
            // Theme filter functionality
            $('.theme-filter-btn').on('click', function() {
                $('.theme-filter-btn').removeClass('active').css({
                    'background': 'white',
                    'color': 'black',
                    'border': '1px solid #D1D5DB'
                });
                $(this).addClass('active').css({
                    'background': '#3B82F6',
                    'color': 'white',
                    'border': '1px solid #3B82F6'
                });
                
                const filterValue = $(this).data('filter');
                applyThemeFilter(filterValue);
            });
            
            function applyThemeFilter(filter) {
                let totalRows = 0;
                let activeCount = 0;
                let shownCount = 0;
                
                $('#themes-table tbody tr').each(function() {
                    const $row = $(this);
                    const $statusCell = $row.find('.status-badge');
                    const isActive = $statusCell.hasClass('active');
                    
                    totalRows++;
                    if (isActive) activeCount++;
                    
                    let show = false;
                    if (filter === 'all') {
                        show = true;
                    } else if (filter === 'active' && isActive) {
                        show = true;
                    } else if (filter === 'inactive' && !isActive) {
                        show = true;
                    }
                    
                    if (show) shownCount++;
                    
                    $row.toggle(show);
                });
                
                updateDisplayCounts();
            }
            
            // Row pagination functionality
            let currentPage = 1;
            let rowsPerPage = 25;
            let totalRows = <?php echo count($themes_data); ?>;
            
            function updateDisplayCounts() {
                const visibleRows = $('#themes-table tbody tr:visible').length;
                $('#themes-showing').text(visibleRows);
                $('#themes-total').text(totalRows);
            }
            
            function updateRowPagination() {
                const totalPages = Math.ceil(totalRows / rowsPerPage);
                $('#page-info-btn').text(currentPage);
                $('#prev-page').prop('disabled', currentPage <= 1);
                $('#next-page').prop('disabled', currentPage >= totalPages);
            }
            
            // Row pagination button handlers
            $('.rows-per-page-btn').on('click', function() {
                $('.rows-per-page-btn').removeClass('active').css({
                    'background': 'white',
                    'color': 'black',
                    'border': '1px solid #D1D5DB'
                });
                $(this).addClass('active').css({
                    'background': '#3B82F6',
                    'color': 'white',
                    'border': '1px solid #3B82F6'
                });
                
                const rowsValue = $(this).data('rows');
                rowsPerPage = rowsValue === 'all' ? totalRows : parseInt(rowsValue);
                currentPage = 1;
                updateRowPagination();
            });
            
            $('#prev-page').on('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    updateRowPagination();
                }
            });
            
            $('#next-page').on('click', function() {
                const totalPages = Math.ceil(totalRows / rowsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updateRowPagination();
                }
            });
            
            // Column pagination functionality
            let currentColPage = 1;
            let colsPerPage = 8;
            let totalCols = 8;
            
            function updateColPagination() {
                const totalColPages = Math.ceil(totalCols / colsPerPage);
                $('#col-page-display').text(currentColPage);
                $('#first-col-page').prop('disabled', currentColPage <= 1);
                $('#prev-col-page').prop('disabled', currentColPage <= 1);
                $('#next-col-page').prop('disabled', currentColPage >= totalColPages);
                $('#last-col-page').prop('disabled', currentColPage >= totalColPages);
            }
            
            // Column pagination button handlers
            $('.cols-per-page-btn').on('click', function() {
                $('.cols-per-page-btn').removeClass('active').css({
                    'background': 'white',
                    'color': 'black',
                    'border': '1px solid #000'
                });
                $(this).addClass('active').css({
                    'background': '#f8f782',
                    'color': 'black',
                    'border': '1px solid #000'
                });
                
                const colsValue = $(this).data('cols');
                colsPerPage = colsValue === 'all' ? totalCols : parseInt(colsValue);
                currentColPage = 1;
                updateColPagination();
                updateColumnVisibility();
            });
            
            function updateColumnVisibility() {
                // Simple column pagination logic - hide/show columns based on current page
                const startCol = (currentColPage - 1) * colsPerPage;
                const endCol = startCol + colsPerPage;
                
                $('#themes-table th, #themes-table td').each(function(index) {
                    const colIndex = $(this).index();
                    if (colsPerPage === totalCols) {
                        $(this).show(); // Show all columns
                    } else {
                        if (colIndex >= startCol && colIndex < endCol) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
                
                // Update display text
                const visibleCols = Math.min(colsPerPage, totalCols - startCol);
                $('#columns-showing').text(visibleCols);
            }
            
            $('#first-col-page, #prev-col-page, #next-col-page, #last-col-page').on('click', function() {
                const totalColPages = Math.ceil(totalCols / colsPerPage);
                const buttonId = $(this).attr('id');
                
                if (buttonId === 'first-col-page') {
                    currentColPage = 1;
                } else if (buttonId === 'prev-col-page' && currentColPage > 1) {
                    currentColPage--;
                } else if (buttonId === 'next-col-page' && currentColPage < totalColPages) {
                    currentColPage++;
                } else if (buttonId === 'last-col-page') {
                    currentColPage = totalColPages;
                }
                
                updateColPagination();
                updateColumnVisibility();
            });
            
            // Wolf options and column templates buttons (placeholder)
            $('#wolf-options').on('click', function() {
                alert('Wolf options popup will be implemented later');
            });
            
            $('#column-templates').on('click', function() {
                alert('Column templates popup will be implemented later');
            });
            
            // Database name copy functionality
            $('#copy-db-name').on('click', function() {
                const dbNameInput = document.getElementById('db-name-display');
                dbNameInput.select();
                dbNameInput.setSelectionRange(0, 99999); // For mobile devices
                
                try {
                    document.execCommand('copy');
                    $(this).text('✓').css('background', '#00a32a');
                    setTimeout(() => {
                        $(this).text('📋').css('background', '#00a32a');
                    }, 1000);
                } catch (err) {
                    console.log('Copy failed');
                }
            });
            
            // Initialize pagination
            updateRowPagination();
            updateColPagination();
            updateDisplayCounts();
            updateColumnVisibility();
            
            // Initialize with default filter (all themes)
            setTimeout(function() {
                applyThemeFilter('all');
            }, 100);
        });
        </script>
            
        </div>
        <?php
    }
    
    /**
     * Get themes data including both installed and GitHub themes
     */
    private function get_themes_data() {
        if (!function_exists('wp_get_themes')) {
            require_once ABSPATH . 'wp-admin/includes/theme.php';
        }
        
        // 1. Get installed themes
        $all_themes = wp_get_themes();
        $current_theme = get_stylesheet();
        
        // 2. Get GitHub theme definitions from database
        $github_themes = $this->get_github_theme_definitions();
        
        $themes_data = array();
        
        // Add all installed themes
        foreach ($all_themes as $theme_slug => $theme_obj) {
            $is_active = ($theme_slug === $current_theme);
            
            $themes_data[$theme_slug] = array(
                'Name' => $theme_obj->get('Name'),
                'Version' => $theme_obj->get('Version'),
                'Description' => $theme_obj->get('Description'),
                'ThemeURI' => $theme_obj->get('ThemeURI') ?: '',
                'Author' => $theme_obj->get('Author') ?: '',
                'is_active' => $is_active,
                'template' => $theme_obj->get_template(),
                'stylesheet' => $theme_obj->get_stylesheet(),
                'screenshot' => $theme_obj->get_screenshot(),
                'install_status' => 'installed',
                'github_url' => '',
                'branch_name' => '',
                'remote_version' => '',
                'is_github_theme' => false
            );
        }
        
        // Add uninstalled GitHub themes and merge metadata for installed ones
        foreach ($github_themes as $definition) {
            $theme_folder = $definition['theme_folder'];
            
            if (!isset($themes_data[$theme_folder])) {
                // Theme not installed - add as available
                $themes_data[$theme_folder] = array(
                    'Name' => $definition['theme_slug'],
                    'Version' => $definition['remote_version'] ?: 'Unknown',
                    'Description' => 'GitHub theme available for installation',
                    'ThemeURI' => $definition['github_url'],
                    'Author' => 'GitHub Theme',
                    'is_active' => false,
                    'template' => $theme_folder,
                    'stylesheet' => $theme_folder,
                    'screenshot' => '',
                    'install_status' => 'available',
                    'github_url' => $definition['github_url'],
                    'branch_name' => $definition['branch_name'],
                    'remote_version' => $definition['remote_version'],
                    'is_github_theme' => true
                );
            } else {
                // Theme is installed - merge GitHub metadata
                $themes_data[$theme_folder] = array_merge(
                    $themes_data[$theme_folder],
                    array(
                        'install_status' => 'installed',
                        'github_url' => $definition['github_url'],
                        'branch_name' => $definition['branch_name'],
                        'remote_version' => $definition['remote_version'],
                        'is_github_theme' => true
                    )
                );
            }
        }
        
        return $themes_data;
    }
    
    /**
     * Get GitHub theme definitions from database
     */
    private function get_github_theme_definitions() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'zen_themes_oasis';
        
        $results = $wpdb->get_results(
            "SELECT * FROM $table_name ORDER BY theme_slug",
            ARRAY_A
        );
        
        return $results ?: array();
    }
}
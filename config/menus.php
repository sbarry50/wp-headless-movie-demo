<?php
/**
 * Top level menus configuration.
 *
 * @package    SB2Media\MovieDemo
 * @since      1.0.0
 * @author     sbarry50
 * @link       http://example.com
 * @license    MIT
 */

/*********************************************************
 * Top level custom admin pages
 *
 * Format:
 *   [
 *      'page_title' => $page_title,
 *      'menu_title' => $menu_title,
 *      'capability' => $capability,
 *      'menu_slug'  => $menu_slug,
 *      'callback'   => $callback,
 *      'icon_url'   => $icon_url,
 *      'position'   => $position,
 *      'args'       => [
 *          'vue_id' => $vue_id     // Optionally, if you need to add a Vue Component to this menu
 *      ],
*   ],
********************************************************/

return [
    [
        'page_title' => 'Movie Settings',
        'menu_title' => 'Movie Settings',
        'capability' => 'manage_options',
        'menu_slug'  => 'movie-settings',
        'callback'   => 'menu-page.php',
        'icon_url'   => '',
        'position'   => null,
    ],
];

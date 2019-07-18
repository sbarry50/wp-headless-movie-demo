<?php
/**
 * Custom Post Type configurations.
 *
 * @package    SB2Media\MovieDemo
 * @since      1.0.0
 * @author     sbarry50
 * @link       http://example.com
 * @license    MIT
 */

$text_domain = SB2Media\MovieDemo\app()->text_domain;

/*********************************************************
 *
 * Format:
 *  [
 *      'id'          => $id,
 *      'label'       => __($label, $text_domain),
 *      'description' => __($description, $text_domain),
 *      'labels'      => [
 *          'name'               => _x($name, 'post type general name', $text_domain),
 *          'singular_name'      => _x($singular_name, 'post type singular name', $text_domain),
 *          'menu_name'          => _x($menu_name, 'admin menu', $text_domain),
 *          'name_admin_bar'     => _x($name_admin_bar, 'add new on admin bar', $text_domain),
 *          'add_new'            => _x('Add New', $add_new, $text_domain),
 *          'add_new_item'       => __($add_new_item, $text_domain),
 *          'new_item'           => __($new_item, $text_domain),
 *          'edit_item'          => __($edit_item, $text_domain),
 *          'view_item'          => __($view_item, $text_domain),
 *          'all_items'          => __($all_items, $text_domain),
 *          'search_items'       => __($search_items, $text_domain),
 *          'parent_item_colon'  => __($parent_item_colon, $text_domain),
 *          'not_found'          => __($not_found, $text_domain),
 *          'not_found_in_trash' => __($not_found_in_trash, $text_domain)
 *      ],
 *      'taxonomies'          => [ $taxonomies ],
 *      'public'              => $boolean,
 *      'show_in_menu'        => $boolean,
 *      'menu_icon'           => $menu_icon, // default: 'dashicons-admin-post'
 *      'supports'            => [ $supports ],
 *      'has_archive'         => $boolean,
 *      'show_in_rest'        => $boolean,
 *      'show_in_graphql'     => $boolean, // If using WPGraphQL Plugin
 *      'graphql_single_name' => $graphql_single_name, // If using WPGraphQL Plugin
 *      'graphql_plural_name' => $graphql_plural_name, // If using WPGraphQL Plugin
 *  ],
 *
********************************************************/

return [
    [
        'id'          => 'movie',
        'label'       => __('Movie', $text_domain),
        'description' => __('Movie Description', $text_domain),
        'labels'      => [
            'name'               => _x('Movies', 'post type general name', $text_domain),
            'singular_name'      => _x('Movie', 'post type singular name', $text_domain),
            'menu_name'          => _x('Movies', 'admin menu', $text_domain),
            'name_admin_bar'     => _x('Movie', 'add new on admin bar', $text_domain),
            'add_new'            => _x('Add New', 'movie', $text_domain),
            'add_new_item'       => __('Add New Movie', $text_domain),
            'new_item'           => __('New Movie', $text_domain),
            'edit_item'          => __('Edit Movie', $text_domain),
            'view_item'          => __('View Movie', $text_domain),
            'all_items'          => __('All Movies', $text_domain),
            'search_items'       => __('Search Movies', $text_domain),
            'parent_item_colon'  => __('Parent Movies:', $text_domain),
            'not_found'          => __('No movies found.', $text_domain),
            'not_found_in_trash' => __('No movies found in Trash.', $text_domain)
        ],
        'taxonomies'          => [],
        'public'              => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-format-video',
        'supports'            => ['title','movie_details'],
        'has_archive'         => false,
        'show_in_rest'        => true,
        'show_in_graphql'     => true, // If using WPGraphQL Plugin
        'graphql_single_name' => 'Movie', // If using WPGraphQL Plugin
        'graphql_plural_name' => 'Movies', // If using WPGraphQL Plugin
    ],
];

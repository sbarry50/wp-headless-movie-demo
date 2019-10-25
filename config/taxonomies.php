<?php
/**
 * Custom taxonomy configurations.
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
 *          'singular_name'      => _x($singlular_name, 'post type singular name', $text_domain),
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
 *      'public'              => $boolean,
 *      'supports'            => [ $supports ],
 *      'hierarchical'        => $boolean,
 *      'show_in_menu'        => $boolean,
 *      'show_in_rest'        => $boolean,
 *      'show_in_graphql'     => $boolean,              // If using WPGraphQL Plugin
 *      'graphql_single_name' => $graphql_single_name,  // If using WPGraphQL Plugin
 *      'graphql_plural_name' => $graphql_plural_name,  // If using WPGraphQL Plugin
 *  ],
 *
********************************************************/

return [
    [
        'id'          => 'movie_genre',
        'label'       => __('Movie Genre', $text_domain),
        'description' => __('Movie Genre Description', $text_domain),
        'labels'      => [
            'name'               => _x('Movie Genres', 'post type general name', $text_domain),
            'singular_name'      => _x('Movie Genre', 'post type singular name', $text_domain),
            'menu_name'          => _x('Movie Genres', 'admin menu', $text_domain),
            'name_admin_bar'     => _x('Movie Genre', 'add new on admin bar', $text_domain),
            'add_new'            => _x('Add New', 'movie genre', $text_domain),
            'add_new_item'       => __('Add New Movie Genre', $text_domain),
            'new_item'           => __('New Movie Genre', $text_domain),
            'edit_item'          => __('Edit Movie Genre', $text_domain),
            'view_item'          => __('View Movie Genre', $text_domain),
            'all_items'          => __('All Movie Genres', $text_domain),
            'search_items'       => __('Search Movie Genres', $text_domain),
            'parent_item_colon'  => __('Parent Movie Genres:', $text_domain),
            'not_found'          => __('No movie genres found.', $text_domain),
            'not_found_in_trash' => __('No movie genres found in Trash.', $text_domain)
        ],
        'public'              => true,
        'supports'            => ['movie'],
        'hierarchical'        => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'show_in_graphql'     => true, // If using WPGraphQL Plugin
        'graphql_single_name' => 'MovieGenre', // If using WPGraphQL Plugin
        'graphql_plural_name' => 'MovieGenres', // If using WPGraphQL Plugin
    ],
];

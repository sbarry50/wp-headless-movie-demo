<?php
/**
 * Meta fields configuration.
 *
 * @package    SB2Media\MovieDemo
 * @since      1.0.0
 * @author     sbarry50
 * @link       http://example.com
 * @license    MIT
 */

/*********************************************************
 *
 * Format:
 *   [
 *      'id'          => $id,
 *      'title'       => $title,
 *      'description' => $description,
 *      'callback'    => $callback,
 *      'meta_box'    => $meta_box,
 *      'args'        => [
 *          $args
 *      ],
 *      'graphql'      => [     // Optionally, if a meta field requires a custom GraphQL type
 *          'type'        => $type,
 *          'description' => $description,
 *          'resolver'    => $resolver,
 *      ]
 *   ],
 *
********************************************************/

return [
    [
        'id'          => 'movie_title',
        'title'       => 'Movie Title',
        'description' => 'The title of the movie',
        'callback'    => 'text.php',
        'meta_box'    => 'movie_details',
        'args'        => [],
    ],
    [
        'id'          => 'movie_rating',
        'title'       => 'Movie Rating',
        'description' => 'How would you rate this movie?',
        'callback'    => 'rating.php',
        'meta_box'    => 'movie_details',
        'args'        => [
            'ratedesc' => ['Terrible', 'Bad', 'OK', 'Good', 'Great'],
        ],
        'graphql' => [
            'type' => 'MovieRating',
            'description' => 'Movie rating',
            'resolver' => 'movie-ratings-graphql'
        ]
    ],
    [
        'id'          => 'movie_year',
        'title'       => 'Movie Year',
        'description' => 'The year the movie was released.',
        'callback'    => 'number.php',
        'meta_box'    => 'movie_details',
        'args'        => [
            'placeholder' => 'yyyy'
        ]
    ],
    [
        'id'          => 'movie_actors',
        'title'       => 'Movie Actors',
        'description' => 'The actors who starred in the movie.',
        'callback'    => 'multi-text.php',
        'meta_box'    => 'movie_details',
        'args'        => [
            'num_inputs' => 5
        ],
        'graphql' => [
            'type' => [
                'list_of' => 'String'
            ],
        ]
    ],
    [
        'id'          => 'movie_poster',
        'title'       => 'Movie Poster',
        'description' => 'Upload a movie poster',
        'callback'    => ['media', 'render'],
        'meta_box'    => 'movie_details',
        'args'        => [
            'admin_size'   => 'large',
            'admin_width' => 400,
            'admin_height' => 600,
            'graphql_size' => 'full',
        ],
        'graphql' => [
            'type' => 'MediaDetails',
            'resolver' => 'media-details-graphql',
        ]
    ],
    [
        'id'          => 'movie_details',
        'title'       => 'Movie Details',
        'description' => 'Not used as an input. Demo purposes for GraphQL only.',
        'callback'    => '',
        'meta_box'    => 'movie_details',
        'args'        => [],
        'graphql' => [
            'type' => 'MovieDetails',
            'description' => 'Movie Details GraphQL object demo',
            'resolver' => 'movie-details-graphql'
        ]
    ],
];

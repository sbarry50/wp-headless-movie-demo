<?php
/**
 * Custom types to register with GraphQL
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
 *  [
 *      'id'   => $id,
 *      'type' => $type,
 *      'args' => [
 *          'fields' => [
 *              $field_id => [
 *                  'type' => $type,
 *                  'description' => $description,
 *                  'resolve' => function () {
 *                      return;
 *                  }
 *              ],
 *              $field_id => [
 *                  'type' => $type,
 *                  'description' => $description,
 *                  'resolve' => function () {
 *                      return;
 *                  }
 *              ],
 *              $field_id => [
 *                  'type' => $type,
 *                  'description' => $description,
 *                  'resolve' => function () {
 *                      return;
 *                  }
 *              ],
 *          ]
 *      ],
 *  ],
********************************************************/

return [
    [
        'id'   => 'MovieRating',
        'type' => 'enum',
        'args' => [
            'description' => 'How would you rate this movie?',
            'values'      => [
                'GREAT' => [
                    'value' => '5'
                ],
                'GOOD' => [
                    'value' => '4'
                ],
                'OK' => [
                    'value' => '3'
                ],
                'BAD' => [
                    'value' => '2'
                ],
                'TERRIBLE' => [
                    'value' => '1'
                ],
            ],
        ],
    ],
    [
        'id'   => 'MovieDetails',
        'type' => 'object',
        'args' => [
            'description' => 'The movie details',
            'fields' => [
                'title' => [
                    'type' => 'String',
                    'description' => 'The movie title',
                    'resolve' => function ($movie_details) {
                        return isset($movie_details['title']) ? $movie_details['title'] : null;
                    }
                ],
                'rating' => [
                    'type' => 'MovieRating',
                    'description' => 'How would you rate this movie?',
                    'resolve' => function ($movie_details) {
                        return isset($movie_details['rating']) ? $movie_details['rating'] : null;
                    }
                ],
                'year' => [
                    'type' => 'String',
                    'description' => 'The year the movie was released.',
                    'resolve' => function ($movie_details) {
                        return isset($movie_details['year']) ? $movie_details['year'] : null;
                    }
                ],
                'actors' => [
                    'type' => [
                        'list_of' => 'String'
                    ],
                    'description' => 'The actors who starred in the movie.',
                    'resolve' => function ($movie_details) {
                        return isset($movie_details['actors']) ? $movie_details['actors'] : null;
                    }
                ],
                'poster' => [
                    'type' => 'MediaDetails',
                    'description' => 'Movie poster details.',
                    'resolve' => function ($movie_details) {
                        return isset($movie_details['poster']) ? $movie_details['poster'] : null;
                    }
                ],
            ]
        ],
    ]
];

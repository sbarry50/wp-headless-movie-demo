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
        'id'   => 'MovieGenre',
        'type' => 'enum',
        'args' => [
            'description' => 'The genre of movie',
            'values'      => [
                'COMEDY' => [
                    'value' => 'comedy'
                ],
                'DRAMA' => [
                    'value' => 'drama'
                ],
                'HORROR' => [
                    'value' => 'horror'
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
                    'resolve' => function ($params) {
                        return !empty($params['title']) ? $params['title'] : null;
                    }
                ],
                'genre' => [
                    'type' => 'MovieGenres',
                    'description' => 'The genre of the movie',
                    'resolve' => function ($params) {
                        return !empty($params['genre']) ? $params['genre'] : null;
                    }
                ],
                'year' => [
                    'type' => 'String',
                    'description' => 'The year the movie was released.',
                    'resolve' => function ($params) {
                        return isset($params['year']) ? $params['year'] : null;
                    }
                ],
                'actors' => [
                    'type' => [
                        'list_of' => 'String'
                    ],
                    'description' => 'The actors who starred in the movie.',
                    'resolve' => function ($params) {
                        return isset($params['actors']) ? $params['actors'] : null;
                    }
                ],
                'poster' => [
                    'type' => 'MediaDetails',
                    'description' => 'Movie poster details.',
                    'resolve' => function ($params) {
                        return isset($params['poster']) ? $params['poster'] : null;
                    }
                ],
            ]
        ],
    ]
];

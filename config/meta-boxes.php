<?php
/**
 * Meta box configuration.
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
 *      'id'       => $id,
 *      'title'    => $title,
 *      'callback' => $callback,
 *      'screen'   => $screen,
 *      'context'  => $context,
 *      'priority' => $priority,
 *      'args'     => [
 *          'vue_id' => $vue_id  // Optionally, if you need to add a Vue Component to this meta box.
 *      ],
 *   ],
********************************************************/

return [
    [
        'id'       => 'movie_details',
        'title'    => 'Movie Details',
        'callback' => 'meta-box.php',
        'screen'   => 'movie',
        'context'  => 'normal',
        'priority' => 'high',
        'args'     => [],
    ],
];

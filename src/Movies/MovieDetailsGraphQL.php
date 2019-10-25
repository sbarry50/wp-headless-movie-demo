<?php
/**
 * Class for managing the movie details for GraphQL
 *
 * @package    SB2Media\MovieDemo\Movies
 * @since      1.0.0
 * @author     sbarry
 * @link       http://example.com
 * @license    MIT
 */

namespace SB2Media\MovieDemo\Movies;

use SB2Media\Headless\Contracts\GraphQLResolverContract;
use function SB2Media\MovieDemo\app;
use function SB2Media\MovieDemo\config;

class MovieDetailsGraphQL implements GraphQLResolverContract
{
    /**
     * Resolve the movie details for GraphQL
     *
     * @since 1.0.0
     * @param array $config
     * @param string|array $value
     * @param integer $post_id
     * @return string
     */
    public function resolve(array $config, $value, int $post_id = null)
    {
        $movie_details = [];

        $movie_details['title'] = get_post_meta($post_id, 'movie_title', true);
        $movie_details['rating'] = get_post_meta($post_id, 'movie_rating', true);
        $movie_details['year'] = get_post_meta($post_id, 'movie_year', true);
        $movie_details['actors'] = get_post_meta($post_id, 'movie_actors', true);

        $poster_config = config()->getItem('movie_poster', 'meta-fields');
        $poster_value = get_post_meta($post_id, 'movie_poster', true);
        $movie_details['poster'] = app('media-details-graphql')->resolve($poster_config, $poster_value);

        return $movie_details;
    }
}

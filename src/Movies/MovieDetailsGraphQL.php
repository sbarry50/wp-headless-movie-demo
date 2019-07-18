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
use function SB2Media\Headless\app;
use function SB2Media\Headless\config;

class MovieDetailsGraphQL implements GraphQLResolverContract
{
    /**
     * Resolve the movie details for GraphQL
     *
     * @since 1.0.0
     * @param array $config
     * @param string|array $value
     * @return void
     */
    public function resolve(array $config, $value, int $post_id = null)
    {
        $movie_details = [];

        $movie_details['title'] = get_post_meta($post_id, 'movie_title', true);
        $movie_details['genre'] = get_post_meta($post_id, 'movie_genre', true);
        $movie_details['year'] = get_post_meta($post_id, 'movie_year', true);
        $movie_details['actors'] = get_post_meta($post_id, 'movie_actors', true);

        $poster_config = config()->getItem('movie_poster', 'meta-fields');
        $poster_value = get_post_meta($post_id, 'movie_poster', true);
        $movie_details['poster'] = app('media-details-graphql')->resolve($poster_config, $poster_value);

        return $movie_details;
    }
}

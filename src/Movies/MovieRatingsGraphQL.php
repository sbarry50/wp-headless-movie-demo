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

class MovieRatingsGraphQL implements GraphQLResolverContract
{
    /**
     * Resolve the movie ratings for GraphQL
     *
     * @since 1.0.0
     * @param array $config
     * @param string|array $value
     * @param integer $post_id
     * @return string
     */
    public function resolve(array $config, $value, int $post_id = null)
    {
        return $value;
    }
}

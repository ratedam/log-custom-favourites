<?php
/**
 * Class created to be used by shortcode and widget output generation
 */

namespace log_custom_favourites;


class LOG_DatabaseHandler
{
    /**
     * Get all the elements favourited
     * @return array - An array with the elements or empty
     */
    public static function log_favourite_get_elements(){

        $elements = array();

        // prepare the args
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'order' => 'ASC',
            'orderby' => 'date',
            'meta_query' => array(
                array(
                    'key'     => LOG_FAVOURITES_METAKEY,
                    'value'   => '1',
                    'compare' => '=',
                ),
            ),
        );

        // query the database
        $the_query = new \WP_Query( $args );

        // loop them
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                // append the elements to the array
                $elements[] = array(
                    'post_id'   => get_the_ID(),
                    'title'     => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'thumbnail' => get_the_post_thumbnail()
                );
            }
            // safety hat
            wp_reset_postdata();
        }

        return  $elements;
    }
}
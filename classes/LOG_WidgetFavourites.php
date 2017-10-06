<?php

/**
 * Create a custom widget that'll show the favourite posts
 * Uses the wp_widget call for the widgets api
 */
namespace log_custom_favourites;


class LOG_WidgetFavourites extends \WP_Widget {

    function __construct() {
        parent::__construct(
            'log_widget_favourites',
            __('Show LOG favourites' ),
            array (
                'description' => __( 'Show all LOG favourites' )
            )
        );
    }

    /**
     * Widget output
     * @param $args
     * @param $instance
     */
    function widget( $args, $instance ) {
        // get the favourited posts
        $posts = LOG_DatabaseHandler::log_favourite_get_elements();

        // try to echo them
        ob_start();
            include(LOG_FAVOURITES_PARTIALS . 'log-custom-favourites-public-output.php');
        echo ob_get_clean();
    }

    /**
     * The backoffice form update mechanics
     * @param $new_instance
     * @param $old_instance
     */
    function update( $new_instance, $old_instance ) {}

    /**
     * The backoffice form custom configs
     * @param $instance
     */
    function form( $instance ) {}


}
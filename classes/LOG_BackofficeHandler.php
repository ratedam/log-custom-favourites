<?php
/**
 * General handler class that'll control the class instantiating and general hooks for widgts
 */
namespace log_custom_favourites;

class LOG_BackofficeHandler{

	function __construct(){
	    // Initialize
		    add_action('init', array( $this , 'log_favourites_init' ) );
        // Register the widget
            add_action( 'widgets_init', array( $this , 'log_favourites_register_widget' ) );
	}


	function log_favourites_init(){
	    // Register the metaboxes
		    new Log_FieldRegister();

		// Integrate with the api
		    new LOG_ApiIntegration();

		// Register the shortcode
		    new LOG_ShortcodeHandler();

	}

    function log_favourites_register_widget() {
	    register_widget( 'log_custom_favourites\LOG_WidgetFavourites' );
    }

}

?>
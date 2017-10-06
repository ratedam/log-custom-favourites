<?php
/**
 * General handler class that'll control the class instantiating and general hooks for widgts
 */
namespace classes;

class LOG_BackofficeHandler{

	function __construct(){
	    // Initialize
		    add_action('init', array( $this , 'log_favourites_init' ) );
        // Register the widget
            add_action( 'widgets_init', array( $this , 'log_favourites_register_widget' ) );
	}


	function log_favourites_init(){
	    // Register the metaboxes
		    new LOG_FieldRegister();

		// Integrate with the api
		    new LOG_ApiIntegration();

		// Register the shortcode
		    new LOG_ShortcodeHandler();

	}

    function log_favourites_register_widget() {
	    register_widget( 'classes\LOG_WidgetFavourites' );
    }

}

?>
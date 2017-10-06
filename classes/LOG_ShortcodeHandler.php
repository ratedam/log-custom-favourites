<?php
/**
 * Handle the shortcode logic and output
 */
namespace log_custom_favourites;

class LOG_ShortcodeHandler{

    function __construct(){
        add_shortcode( 'log_favourites' , array( $this , 'log_output_favourites' ) );
    }

    function log_output_favourites( $atts ) {
        // get the available posts
        $posts = LOG_DatabaseHandler::log_favourite_get_elements();

        // try to echo them
        ob_start();
            include(LOG_FAVOURITES_PARTIALS . 'log-custom-favourites-public-output.php');
        return ob_get_clean();
    }
}

?>
<?php 
/*
Plugin Name:  Log Favourites
Plugin URI:   https://nourl.ocom
Description:  Log favourites plugin.
Version:      20171006
Author:       Ângelo Marques
Author URI:   https://pt.linkedin.com/in/%C3%A2ngelo-marques-a30364110
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

	if( ! defined('LOG_FAVOURITES_BASEPATH') ){
		define('LOG_FAVOURITES_BASEPATH' , plugin_dir_path( __FILE__ ) );
	}
	
	if( ! defined('LOG_FAVOURITES_PARTIALS' ) ){
		define('LOG_FAVOURITES_PARTIALS' , LOG_FAVOURITES_BASEPATH . "partials/" );
	}

	if( ! defined( 'LOG_FAVOURITES_METAKEY' ) ){
	    define('LOG_FAVOURITES_METAKEY','log_favourite');
    }

    define('LOG_FAVOURITES_VER' , 1.0 );


    // Add the autoloader
    spl_autoload_register( 'log_custom_favourite_autoloader' );
    function log_custom_favourite_autoloader( $class_name ) {
        if ( false !== strpos( $class_name, 'LOG' ) ) {
            $classes_dir = realpath( LOG_FAVOURITES_BASEPATH ) . DIRECTORY_SEPARATOR ;
            $class_file = $class_name . '.php';
            require_once $classes_dir . $class_file;
        }
    }
	
	$log_backoffice_handler = new classes\LOG_BackofficeHandler();




?>
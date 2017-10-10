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

USE classes\LOG_BackofficeHandler;

	if( ! defined('LOG_FAVOURITES_BASEPATH') ){
		define('LOG_FAVOURITES_BASEPATH' , plugin_dir_path( __FILE__ ) );
	}
	
	if( ! defined('LOG_FAVOURITES_PARTIALS' ) ){
		define('LOG_FAVOURITES_PARTIALS' , LOG_FAVOURITES_BASEPATH . "partials" . DIRECTORY_SEPARATOR );
	}

	if( ! defined( 'LOG_FAVOURITES_METAKEY' ) ){
	    define('LOG_FAVOURITES_METAKEY','log_favourite');
    }

    define('LOG_FAVOURITES_VER' , 1.0 );


    // Add the autoloader
    spl_autoload_register( 'log_custom_favourite_autoloader' );
    function log_custom_favourite_autoloader( $class ) {
        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        if ( file_exists(LOG_FAVOURITES_BASEPATH . $class . '.php') ) {
            include LOG_FAVOURITES_BASEPATH . $class . '.php';
        }

    }

    $log_backoffice_handler = new LOG_BackofficeHandler();

?>
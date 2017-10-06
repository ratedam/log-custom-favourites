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
	
	require 'classes/LOG_BackofficeHandler.php';
	require 'classes/LOG_FieldRegister.php';
	require 'classes/LOG_ApiIntegration.php';
	require 'classes/LOG_ShortcodeHandler.php';
	require 'classes/LOG_WidgetFavourites.php';
	require 'classes/LOG_DatabaseHandler.php';

	
	$log_backoffice_handler = new log_custom_favourites\LOG_BackofficeHandler();




?>
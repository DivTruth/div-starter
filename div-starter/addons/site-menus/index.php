<?php 
/**
 * Plugin Name: Div: Site Menus Add-on
 * Plugin URI: http://divblend.com/div-starter
 * Description: A Div Library add-on that uses ACF (5.0+) to add site specific option pages,
 * equipped with Site Options Panel, Site Info page, and a generic Homepage Options page
 *
 * @package 	Div Library
 * @category 	Add-On
 */

/**
 * Must load through action otherwise will create duplicate
 * site application instances because of multiple PHP request
 */
add_action( 'plugins_loaded', 'load_site_menus' );

function load_site_menus(){
	# Load Addon Class
	include_once( dirname(__FILE__).'/site-menu.php' );
	# Register ACF Fields
	include_once( dirname(__FILE__).'/acf-site-info.php' );	
	include_once( dirname(__FILE__).'/acf-site-settings.php' );
	# Build Site Menus
	if(class_exists('Site_Menu')){
		/* Load Site Menu class */
		$site_menu = new Site_Menu();
		add_action( 'setup_theme', array($site_menu, 'init') );
	}
}

?>
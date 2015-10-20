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
	include_once( dirname(__FILE__).'/site-menu.php' );		# Load Addon Class
	include_once( dirname(__FILE__).'/acf-site-info.php' );	# Register ACF Fields
	include_once( dirname(__FILE__).'/acf-site-options.php' );	# Register ACF Fields
	if(class_exists('Site_Menu')){
		/* Load Site Menu class */
		$site_menu = new Site_Menu();
		add_action( 'setup_theme', array($site_menu, 'init') );
	}
}

?>
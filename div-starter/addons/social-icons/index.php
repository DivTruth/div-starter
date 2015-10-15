<?php 
/**
 * Plugin Name: Div: Social Icons
 * Plugin URI: http://divblend.com/div-starter/add-ons/social-icons
 * Description: A Div Library add-on that uses ACF (5.0+) and Font Awesome 
 * 		to bring a variety of social media icons to be used throughout 
 * 		your website
 *
 * @package 	Div Library
 * @category 	Add-On
 */

/* Load Social Icon class */
include_once( dirname(__FILE__).'/social-icon.php' );

if(class_exists('Social_Icon')){
	$Social_Icon = new Social_Icon();
	add_action( 'plugins_loaded', array($Social_Icon, 'init') );
}

?>
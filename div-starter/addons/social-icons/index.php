<?php 
/**
 * Plugin Name: Div: Social Icons
 * Plugin URI: http://divblend.com/div-starter/addons/social-icons
 * Description: A Div Library add-on that uses ACF (5.0+) and Font Awesome 
 * 		to bring a variety of social media icons to be used throughout 
 * 		your website
 *
 * @package 	Div Library
 * @category 	Add-On
 */

/**
 * Must load through action otherwise will create duplicate
 * site application instances because of multiple PHP request
 */
add_action( 'plugins_loaded', 'load_social_icon_addon' );

function load_social_icon_addon(){
	include_once( dirname(__FILE__).'/social-icon.php' );		# Load Addon Class
	include_once( dirname(__FILE__).'/acf-social-icons.php' );	# Register ACF Fields
	if(class_exists('Social_Icon')){
		/* Load Social Icon class */
		$social_icons = new Social_Icon();
		add_action( 'setup_theme', array($social_icons, 'init') );
	}
}

?>
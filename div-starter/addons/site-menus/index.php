<?php 
/**
 * Plugin Name: Div: Site Menus Add-on
 * Plugin URI: http://divblend.com/div-starter
 * Description: A Div Library add-on that uses ACF (5.0+) to add site specific option pages, equipped with Site Options Panel, Site Info page, and a generic Homepage Options page
 *
 * @package 	Div Library
 * @category 	Add-On
 */

/**
 * Ensure theme and server variable compatibility and setup image sizes..
 */
add_action( 'after_setup_theme', 'init_site_menus' );
function init_site_menus() {
	$app = site_application::instance();

	/* ACF Option Pages*/
	if( function_exists('acf_add_options_page') ) {

		/* Main Menu: Site Options */
		acf_add_options_page(array(
			'page_title' 	=> 'Site Options',
			'menu_title'	=> 'Site Options',
			'menu_slug' 	=> 'site-options',
			'capability'	=> 'edit_posts',
			'icon_url'		=> $app->path['images_url'].'admin-menu-icon.png',
			'position'		=> '2.5',
			'redirect'		=> false
		));

		/* Child Menu: Site Information */
		acf_add_options_page(array(
			'page_title' 	=> 'Site Information Details',
			'menu_title'	=> 'Information',
			'menu_slug' 	=> 'site-info',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'site-options',
			'redirect'		=> false
		));

		/* Child Menu: Child Options Page */
		// acf_add_options_page(array(
		// 	'page_title' 	=> 'More Options',
		// 	'menu_title'	=> 'More Options',
		// 	'menu_slug' 	=> 'more-options',
		// 	'capability'	=> 'edit_posts',
		// 	'parent_slug'	=> 'site-options',
		// 	'redirect'		=> false
		// ));

	}
	
}

add_action('wp_footer','enque_ga_script');
function enque_ga_script(){
	the_field('tracking_scripts','options');
}

/* Register ACF Fields */
include_once( dirname(__FILE__).'/acf-site-options.php' );
include_once( dirname(__FILE__).'/acf-site-info.php' ); 
?>
<?php 
/**
 * Add-on Name:   Site Menus
 * Description:   Custom site menus
 * Dependencies:  ACF 5.0+, Div Library
 * @link          http://divblend.com/div-starter/add-ons/social-icons/
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Site_Menu {

	/**
	 * Site Application instance
	 * @var String
	 */
	public $app;

	/**
	 * Site Menu Constructor.
	 * @access public
	 */
	public function __construct() {
		/* Set Site Application instance */
		$this->app = site_application::instance();
	}

	/**
	 * Init
	 * @access public
	 */
	public function init(){
		# Hooks & Filters
		add_action( 'after_setup_theme', array($this, 'init_site_menus') );
		if( function_exists('get_field') ) {
			add_action( get_field('tracking_scripts_position'), array($this, 'enque_ga_script') );
		}
	}

	/**
	 * Initiate all the custom site menus
	 * @access public
	 */
	function init_site_menus() {
		$this->app = site_application::instance();

		/* ACF Option Pages*/
		if( function_exists('acf_add_options_page') ) {

			/* Main Menu: Site Options */
			acf_add_options_page(array(
				'page_title' 	=> 'Site Options',
				'menu_title'	=> 'Site Options',
				'menu_slug' 	=> 'site-options',
				'capability'	=> 'edit_posts',
				'icon_url'		=> $this->app->path['images_url'].'admin-menu-icon.png',
				'position'		=> '2.5',
				'redirect'		=> true
			));

			/* Child Menu: Site Settings */
			acf_add_options_page(array(
				'page_title' 	=> 'Application Settings',
				'menu_title'	=> 'Settings',
				'menu_slug' 	=> 'site-settings',
				'capability'	=> 'edit_posts',
				'parent_slug'	=> 'site-options',
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

	function enque_ga_script(){
		the_field('tracking_scripts','options');
	}

}

?>
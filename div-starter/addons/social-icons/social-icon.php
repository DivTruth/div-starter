<?php 
/**
 * Add-on Name:   Social Icons
 * Description:   Simple solution for placing follow and share icons throughout your site
 * Dependencies:  ACF 5.0+, Div Library
 * @link          http://divblend.com/div-starter/add-ons/social-icons/
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Social_Icon {

	/**
	 * Site Application instance
	 * @var String
	 */
	public $app;

	/**
	 * Social Icon Constructor.
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
		add_action( 'after_setup_theme', array( $this, 'load_dashboard') );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles'), 999 );

		add_filter('query_vars', array( $this, 'add_query_var') );
		add_action('template_redirect', array( $this, 'css_display') );

		# Load Icon Template
		add_action( 'social_icons', array( $this, 'load_div_social_icons') );
		add_action( 'wp_head', array( $this, 'load_styles') );
	}

	/**
	 * Load Dashboard Options
	 * @access public
	 */
	public function load_dashboard() {
		/* ACF Option Pages*/
		if( function_exists('acf_add_options_page') ) {

			/* Main Menu: Site Options */
			acf_add_options_page(array(
				'page_title'  => 'Social Network Options',
				'menu_title'  => 'Social Network Options',
				'menu_slug'   => 'social-options',
				'capability'  => 'edit_posts',
				'icon_url'    => $this->app->path['images_url'].'admin-menu-icon.png',
				'position'    => '5',
				'parent_slug' => 'site-options',
				'redirect'    => false
			));

		}
	}

	/**
	 * Load Styles
	 * @access public
	 */
	public function load_styles() {
		_e('<link rel="stylesheet" href="'.$this->app->path['addons_url'].'social-icons/style-options.php?ds_social_icons=css" type="text/css" media="screen" />');
	}

	/**
	 * Add Query Var
	 * @access public
	 */
	public function add_query_var($query_vars) {
		$query_vars[] = 'ds_social_icons';	# custom query variable created to reference in the call to the file
		return $query_vars;
	}

	/**
	 * CSS Display
	 * @access public
	 */
	public function css_display(){
		$css = get_query_var('ds_social_icons');
		if ($css == 'css'){
			include_once ( dirname(__FILE__) . '/style-options.php');
			exit;  # This stops WP from loading any further
		}
	}

	/**
	 * Load Div Social Icons Template
	 * @access public
	 */
	public function load_div_social_icons($args){
		div_get_template( 'social-icons-template.php', $args, '', dirname(__FILE__).'/' );
	}

	/**
	 * Enqueue Styles
	 * @access public
	 */
	public static function enqueue_styles() {
		wp_enqueue_style( 'div-social' );
	}

}

?>
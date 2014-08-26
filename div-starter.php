<?php
/**
 * Plugin Name: Div Starter Application
 * Plugin URI: http://divblend.com/div-starter
 * Description: This is a site boilerplate to create your own application with custom solutions for your project while extending the Div Library Plugin. 
 * Version: 0.1.0 (alpha)
 * Author: Div Blend Team
 * Author URI: http://divblend.com/div-blend-contributors/
 * Div Library: 1.0
 * Requires at least: 3.8
 * Tested up to: 3.9
 *
 * @package 	Div Library
 * @category 	Core
 * @author 		@TODO Your name or company name
 * @link      	@TODO http://projectsite.com
 * @copyright 	@TODO 2014 Your name or company name
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; # Exit if accessed directly
}


/**
 * Main DSA Class
 *
 * @class DSA
 * @version	1.0
 */
global $app_name;
$app_name = "div_starter";

final class div_starter {

	/**
	 * @var string
	 */
	public $library;

	/**
	 * @var string
	 */
	public $version = '0.1.0';
	
	/**
	 * @var string
	 */
	public $directory = 'div-starter';

	/**
	 * Path Definitions
	 * @var 	array
	 * @since   1.0
	 */
	public $path = array();

	/**
	 *  Application Class Name
	 * @var 	string
	 * @since   1.0
	 */
	public $name;

	/**
	 * @var Div_Library The single instance of the class
	 * @since 1.0
	 */
	protected static $_instance = null;

	/**
	 * Main Div_Library Instance
	 *
	 * Ensures only one instance of Div_Library is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @static
	 * @see DIV()
	 * @return Div_Library - Main instance
	 */
	public static function instance($library = "") {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self($library);
		}
		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'divlibrary' ), $this->version );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'divlibrary' ), $this->version );
	}

	/**
	 * Auto-load in-accessible properties on demand.
	 *
	 * @param mixed $key
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( method_exists( $this, $key ) ) {
			return $this->$key();
		}
	}

	/**
	 * Starter Constructor.
	 * @access public
	 * @return Starter
	 */
	public function __construct($library) {
		global $app_name;
		$this->name 		= $app_name;
		$this->library 		= $library;

		// Auto-load classes on demand. This effectively creates a queue of autoload functions, and runs through each of them in the order they are defined.
		if ( function_exists( "__autoload" ) ) {
			spl_autoload_register( "__autoload" );
		}

		spl_autoload_register( array( $this, 'autoload' ) );

		// Define constants
		$this->define_constants();

		// Include required files
		$this->includes();

		// Hooks
		add_action( 'plugins_loaded', array( $this, 'include_fields' ), 20 );
		add_action( 'widgets_init', array( $this, 'include_widgets' ), 20 ); # After Div Library (10)
		// add_action( 'init', array( $this, 'init' ), 0 );
		// add_action( 'init', array( 'DS_Shortcodes', 'init' ), 20 );
		
		// Register ACF Add-on Fields
		// add_action( 'acf/register_fields', array( $this, 'register_acf_fields' ) );
		// add_action( 'acf_settings', array( $this, 'acf_settings' ) );
		
		// Setup any theme environment settings
		add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );

		// Loaded action
		do_action( 'divengine_loaded' );
	}

	/**
	 * Auto-load Engine classes on demand to reduce memory consumption.
	 *
	 * @param mixed $class
	 * @return void
	 */
	public function autoload( $class ) {
		$path  = null;
		$class = strtolower( $class );
		$file = 'class-' . str_replace( '_', '-', $class ) . '.php';

		if ( strpos( $class, 'de_shortcode_' ) === 0 ) {
			$path = $this->plugin_path() . '/includes/shortcodes/';
		} 

		if ( $path && is_readable( $path . $file ) ) {
			include_once( $path . $file );
			return;
		}

		if ( $path && is_readable( $path . $file ) ) {
			include_once( $path . $file );
			return;
		}
	}

	/**
	 * Define DE Constants
	 */
	private function define_constants() {
		$this->path['plugin_file'] 			= __FILE__;
		$this->path['url'] 					= WPMU_PLUGIN_URL.'/'.$this->directory.'/';
		$this->path['dir'] 					= WPMU_PLUGIN_DIR.'/'.$this->directory.'/';
		$this->path['template_path']		= $this->path['url'].'templates';
		
		#includes
		$this->path['includes_dir']		= $this->path['dir'] .'includes/';
		$this->path['admin_dir']		= $this->path['includes_dir'].'admin/';
		$this->path['shortcodes_dir']	= $this->path['includes_dir'].'shortcodes/';
		$this->path['widgets_dir']		= $this->path['includes_dir'].'widgets/';
			
			$this->path['includes_url']		= $this->path['url'].'includes/';
			$this->path['admin_url']		= $this->path['includes_url'].'admin/';
			$this->path['shortcodes_url']	= $this->path['includes_url'].'shortcodes/';
			$this->path['widgets_url']		= $this->path['includes_url'].'widgets/';

		#templates
		$this->path['templates_dir']		= $this->path['dir'] .'templates/';
		$this->path['widget_templates_dir']	= $this->path['templates_dir'].'widgets/';
		
			$this->path['templates_url']		= $this->path['url'].'/templates/';
			$this->path['widget_templates_url']	= $this->path['templates_url'].'widgets/';
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	private function includes() {
		// include_once( 'includes/core-functions.php' );			# Core div functions
		// include_once( ENGINE_INCLUDES_DIR.'class-shortcodes.php' );			# Shortcodes class

		if ( is_admin() ) {
			// include_once( 'includes/admin/class-de-admin.php' );
		}

		if ( defined( 'DOING_AJAX' ) ) {
			// $this->ajax_includes();
		}

		if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {
			$this->frontend_includes();
		}

	}

	/**
	 * Include required ajax files.
	 */
	public function ajax_includes() {
		// include_once( 'includes/class-ds-ajax.php' );				# Ajax functions for admin and the front-end
	}

	/**
	 * Include required frontend files.
	 */
	public function frontend_includes() {
		// include_once( 'includes/class-ds-template-loader.php' );		# Template Loader
		// include_once( 'includes/class-ds-frontend-scripts.php' );	# Frontend Scripts
	}
	
	/**
	 * Include core fields
	 */
	public function include_fields() {
		// ACF Fields
		// include_once( 'includes/fields/cpt-fields.php' );
	}

	/**
	 * Include core widgets
	 */
	public function include_widgets() {
		include_once( $this->path['widgets_dir'].'class-widget-banner.php' );
		add_action( 'starter_loaded', 'register_DS_Widget_Banner', 1);

		// include_once( $this->path['widgets_dir'].'class-widget-text-image.php' );
		// add_action( 'starter_loaded', 'register_DS_Widget_Text_Image', 1);
	}

	/**
	 * Init DSA when WordPress Initialises.
	 */
	public function init() {
		// Before init action
		do_action( 'before_starter_init' );

		// Load Class instances
		// $this->user_agent = new DE_Detection();		# Detection class

		// Init action
		do_action( 'starter_loaded', $this );
	}

	/**
	 * Ensure theme and server variable compatibility and setup image sizes..
	 */
	public function setup_environment() {

	}

	public function register_acf_fields(){  
		#Include ACF 4.0+ add-ons
	    // include_once($this->plugin_path().'/includes/fields/acf-repeater/repeater.php');                                  #FIELD: Repeater
	    // include_once($this->plugin_path().'/includes/fields/acf-gallery/gallery.php');                                    #FIELD: Gallery
	}
	public function acf_settings( $options ){
	    // Activate ACF 4.0+ add-ons
	    // $options['activation_codes']['repeater'] 		= '';
	    // $options['activation_codes']['options_page'] 	= '';
	    // $options['activation_codes']['gallery'] 			= '';
	    // $options['activation_codes']['flexible_content'] = '';
	    return $options;
	}

}

/**
 * Returns the main instance of DE to prevent the need to use globals.
 * @return STARTER
 */
if(class_exists('div_starter')) :

	add_action( 'divlibrary_loaded', 'STARTER', 10, 1);

	function STARTER ($library){
	    div_starter::instance($library);
	}  

endif;
?>
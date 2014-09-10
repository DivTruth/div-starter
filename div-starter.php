<?php
/**
 * Plugin Name: Div Starter Application
 * Plugin URI: http://divblend.com/div-starter
 * Description: This is a site boilerplate to create your own application with custom solutions for your project while extending the Div Library Plugin. 
 * Version: 0.2.0 (alpha)
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
 * Main site_application Class
 *
 * @class site_application
 * @version	1.0
 */
final class site_application {
	
	/**
	 * @var string
	 */
	public $directory = 'div-starter'; #TODO: If you change directory name, adjust accordingly

	/**
	 * @var string
	 */
	public $version = '0.2.0';

	/**
	 * @var string
	 */
	public $library;
	
	/**
	 * Path Definitions
	 * @var 	array
	 * @since   1.0
	 */
	public $path = array();

	/**
	 * @var The single instance of the site_application class
	 * @since 1.0
	 */
	protected static $_instance = null;

	/**
	 * Main site_application Instance
	 * Ensures only one instance of site_application is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @static
	 * @see $app
	 * @return site_application - Main instance
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
	 * Site Application Constructor.
	 * @access public
	 * @return Site Application
	 */
	public function __construct($library) {
		# Pass instance of Div Library upon construction
		$this->library = $library;

		# Define application paths
		$this->define_paths();

		# Include required files
		$this->includes();

		# Install Add-ons
		$this->setup_add_ons();

		# Install Custom Post Type Modules
		$this->setup_modules();

		# Hooks
		add_action( 'widgets_init', array( $this, 'include_widgets' ), 20 ); # After Div Library (10)
		add_action( 'init', array( $this, 'init' ), 0 );
		// add_action( 'init', array( 'DS_Shortcodes', 'init' ), 20 );
		
		# Setup any theme environment settings
		add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );

		# Loaded action
		do_action( 'site_application_loaded' );
	}

	/**
	 * Define application paths
	 */
	private function define_paths() {
		$this->path['plugin_file'] 			= __FILE__;
		$this->path['url'] 					= WPMU_PLUGIN_URL.'/'.$this->directory.'/';
		$this->path['dir'] 					= WPMU_PLUGIN_DIR.'/'.$this->directory.'/';
		$this->path['template_path']		= $this->directory.'/templates/';
		
		#add-ons
		$this->path['addons_dir']	= $this->path['dir'] .'addons/';
		$this->path['addons_url']	= $this->path['url'].'addons/';

		#modules
		$this->path['modules_dir']	= $this->path['dir'] .'modules/';
		$this->path['modules_url']	= $this->path['url'].'modules/';
		
		#appearance
		$this->path['appearance_dir']	= $this->path['dir'] .'appearance/';
		$this->path['images_dir']		= $this->path['appearance_dir'].'images/';
			
			$this->path['appearance_url']	= $this->path['url'].'appearance/';
			$this->path['images_url']		= $this->path['appearance_url'].'images/';
		
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
		foreach( glob($this->path['includes_dir'] . 'class-*.php') as $class_path )
			require_once( $class_path );

		if ( is_admin() ) {
			# Admin only scripts
			// include_once( 'includes/admin.php' );
		}

		if ( defined( 'DOING_AJAX' ) ) {
			# Ajax functions for admin and the front-end
			// include_once( 'includes/ajax.php' );
		}

		if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {
			# Frontend only Scripts
			// include_once( 'includes/frontend-scripts.php' );	
		}

	}
	
	/**
	 * Install Add-Ons
	 */
	public function setup_add_ons() {
		foreach( glob($this->path['addons_dir'] . '*/index.php') as $class_path )
			require_once( $class_path );
		do_action('div_init_addons');
	}

	/**
	 * Install CPT Modules
	 */
	public function setup_modules() {
		foreach( glob($this->path['modules_dir'] . '*/_*.php') as $class_path )
			require_once( $class_path );
		do_action('div_init_modules');
	}

	/**
	 * Include core widgets
	 */
	public function include_widgets() {
		foreach( glob($this->path['widgets_dir'] . '*.php') as $class_path )
			require_once( $class_path );
	}

	/**
	 * Init site_application when WordPress Initialises.
	 */
	public function init() {
		// Before init action
		do_action( 'before_starter_init' );

		// Load Class instances

		// Init action
		do_action( 'site_application_loaded', $this );
	}

	/**
	 * Ensure theme and server variable compatibility and setup image sizes..
	 */
	public function setup_environment() {
		
	}

}

/**
 * Returns the main instance of site_application to prevent the need to use globals.
 * @return init_site_application
 */
if(class_exists('site_application')) :

	add_action( 'divlibrary_loaded', 'init_site_application'); # load after div library is complete

	function init_site_application ($library){
	    $app = site_application::instance($library);
	}  

endif;
?>
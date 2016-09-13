<?php
/**
 * Plugin Name: Div Starter Application
 * Plugin URI: http://divblend.com/div-starter
 * Description: This is a site application boilerplate to create your own application with custom solutions for your project while extending the Div Library Plugin. 
 * Version: 0.3.0 (beta)
 * Author: Div Blend Team
 * Author URI: http://divblend.com/div-blend-contributors/
 * Div Library: 0.3.0
 * Requires at least: 3.8
 * Tested up to: 3.9
 *
 * @package 	Div Library
 * @category 	Core
 * @author 		@TODO Your name or company name
 * @link      	@TODO http://projectsite.com
 * @copyright 	@TODO 2014 Your name or company name
 */
if ( ! defined( 'ABSPATH' ) ) exit; # Exit if accessed directly

/**
 * Main site_application Class
 *
 * @class site_application
 * @version	1.0
 */
final class site_application {
	
	/**
	 * Site application directory name
	 * 
	 * NOTE: If you rename the main directory, adjust accordingly
	 * 
	 * @var string
	 */
	public $directory = 'div-starter';

	/**
	 * Site Application version
	 * 
	 * @var string
	 */
	public $version = '1.0';

	/**
	 * Div Library instance
	 * 
	 * @var string
	 */
	public $library;
	
	/**
	 * Path Definitions
	 * 
	 * @var 	array
	 */
	public $path = array();

	/**
	 * The single instance of the class
	 * 
	 * @var site_application
	 */
	protected static $_instance = null;
	
	/**
	 * Main site_application Instance
	 * 
	 * NOTE: Ensures only one instance of site_application is loaded or can be loaded.
	 *
	 * @static
	 * @see site_application()
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
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'divlibrary' ), '1.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'divlibrary' ), '1.0' );
	}

	/**
	 * site_application Constructor.
	 */
	public function __construct($library) {
		# Pass instance of Div Library upon construction
		$this->library = $library;

		# Define application paths
		$this->define_paths();

		# Auto load library classes
		$this->autoload();

		# Install Add-ons
		$this->setup_add_ons();

		# Install Custom Post Type Modules
		$this->setup_modules();

		# Hooks
		$this->hooks();
		
		# Setup any theme environment settings
		add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );

		# Loaded action
		do_action( 'site_application_loaded' );
	}

	/**
	 * Register auto-loader methods
	 * 
	 * NOTE: Auto-load classes on demand. This effectively creates a queue of autoload 
	 * functions, and runs through each of them in the order they are defined
	 */
	private function autoload(){
		spl_autoload_register( array( $this, 'includes' ) );
	}

	/**
	 * Autoload the include classes
	 *
	 * @param      string  $class
	 */
	private function includes( $class ) {
		if( is_file($this->path['includes_dir'].'class-'.$class.'.php') )
			require $this->path['includes_dir'].'class-'.$class.'.php';
		else if( is_file($this->path['includes_dir'].'fields/'.$class.'.php') )
			require $this->path['includes_dir'].'fields/'.$class.'.php';

		# Admin only scripts
		// if ( is_admin() )
		// 	require $this->path['includes_dir'].'admin/class-'.$class.'.php';
	}

	/**
	 * Setup action and filter hooks
	 */
	private function hooks(){
		// add_action( 'widgets_init', array( $this, 'include_widgets' ), 20 ); # After Div Library (10)
		add_action( 'init', array( $this, 'init' ), 0 );
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
		do_action('div_init_modules');
		foreach( glob($this->path['modules_dir'] . '*/_*.php') as $class_path )
			require_once( $class_path );
		do_action('after_setup_modules');
	}

	/**
	 * Include core widgets
	 */
	public function include_widgets() {
		foreach( glob($this->path['widgets_dir'] . '*.php') as $class_path )
			require_once( $class_path );
	}

	/**
	 * Init site_application when WordPress Initialises
	 */
	public function init() {
		# Before init action
		do_action( 'before_starter_init' );

		# Load Class instances

		# Init action
		do_action( 'site_application_loaded', $this );
	}

	/**
	 * Ensure theme and server variable compatibility and setup image sizes
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
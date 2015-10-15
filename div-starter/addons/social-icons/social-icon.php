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
   * Social Icon Constructor.
   * @access public
   */
  public function __construct() {
    /* Register ACF Fields */
    include_once( dirname(__FILE__).'/acf-social-icons.php' ); 
  }

  /**
   * Init
   * @access public
   */
  public function init(){
    # Hooks & Filters
    add_action( 'after_setup_theme', array( $this, 'load_dashboard') );
    add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles'), 999 );
    # Load Icon Template
    add_action( 'social_icons', array( $this, 'load_div_social_icons') );
  }

  /**
   * Load Dashboard Options
   * @access public
   */
  function load_dashboard() {
    $app = site_application::instance();

    /* ACF Option Pages*/
    if( function_exists('acf_add_options_page') ) {

      /* Main Menu: Site Options */
      acf_add_options_page(array(
        'page_title'  => 'Social Network Options',
        'menu_title'  => 'Social Network Options',
        'menu_slug'   => 'social-options',
        'capability'  => 'edit_posts',
        'icon_url'    => $app->path['images_url'].'admin-menu-icon.png',
        'position'    => '5',
        'parent_slug' => 'site-options',
        'redirect'    => false
      ));

    }
    
  }


  /**
   * Enqueue Scripts and Styles
   *
   * @access public
   * @return void
   */
  public function load_div_social_icons($args){
    div_get_template( 'social-icons-template.php', $args, '', dirname(__FILE__).'/' );
  }

  /**
   * Enqueue Scripts and Styles
   *
   * @access public
   * @return void
   */
  public static function scripts_and_styles() {
    $app = site_application::instance();
    wp_register_style( 'ds-social', $app->path['css_url'].'social.css', array(), '', 'all' );
    wp_enqueue_style( 'ds-social' );
  }

}

?>
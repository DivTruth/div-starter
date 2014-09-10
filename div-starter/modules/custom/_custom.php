<?php 
/**
 * Module Name:   Custom Post Type Module
 * Description:   Boilerplate for setting custom post type module solutions
 * Dependencies:  ACF 5.0+, Div Library
 * @link          http://divblend.com/div-starter/modules
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(class_exists('custom_module')){
  $custom = new custom_module();
  add_action( 'div_init_modules', array($custom, 'init') );
}

class custom_module {

  public $cpt = "custom";
  public $lables = array();
  public $args = array();
  public $module;

  public function __construct(){
    $this->labels = array();
    $this->args = array(
      'supports'      => array('title','thumbnail'),
      'menu_icon'     => 'dashicons-calendar',
      'menu_position' => 3,
    );
    $this->module = $this->register_cpt();
    $this->register_acf_fields();
  }

  public function init(){
    # Hooks & Filters
    add_filter( 'single_template', array( $this, 'single_template') );
    add_action( 'widgets_init', array( $this, 'include_widgets' ), 20 ); # After Div Library (10)
  }

  /**
   * REGISTER CPT
   *
   * @uses DIV_CPT
   * @link http://codex.wordpress.org/Function_Reference/register_post_type 
   */
  public function register_cpt(){
    return new DIV_CPT($this->cpt, $this->args, $this->labels);
  }

  /**
   * SET SINGLE TEMPLATE FOR CPT
   * Include field files exported from ACF
   * @example /modules/module/single-custom.php
   *
   */
  public function single_template( $single_template ) {
    if ( is_singular($this->cpt) ){
        $single_template = dirname(__FILE__).'/single-'.$this->cpt.'.php';
    }
    return $single_template;
  }

  /**
   * INCLUDE ALL ACF FIELDS
   * Include field files exported from ACF
   * @example /modules/module/fields-example.php
   *
   */
  function register_acf_fields(){
    foreach( glob(__DIR__ . '/fields*.php') as $class_path )
      require_once( $class_path );
  }

  /**
   * INCLUDE ALL DEFINED WIDGETS
   * Include field files exported from ACF
   * @example /modules/module/widget-example.php
   *
   */
  function include_widgets(){
    foreach( glob(__DIR__ . '/widget*.php') as $class_path )
      require_once( $class_path );
  }

}

/** CUSTOM FUNCTIONS ******************************************************************/

function custom_cpt_function_example(){
  #custom cpt-specific function code here
}

?>
<?php 
/**
 * Module Name:   Custom Post Type Module
 * Description:   Boilerplate for setting custom post type module solutions
 * Dependencies:  ACF 5.0+, Div Library
 * @link          http://divblend.com/div-starter/modules
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

class custom extends DIV_Module{

  public function __construct(){
    $this->labels = array();
    $this->args = array(
      'supports'      => array('title','thumbnail'),
      'menu_icon'     => 'dashicons-portfolio',
      'menu_position' => 3,
    );

    parent::__construct(); #do not remove this
  }

}

if(class_exists('custom')){
  $custom = new custom();
  add_action( 'plugins_loaded', array($custom, 'init') );
}

?>
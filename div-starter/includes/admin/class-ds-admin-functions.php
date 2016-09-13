<?php
if ( ! defined( 'ABSPATH' ) ) exit; # Exit if accessed directly

/**
 * Div Starter Admin.
 *
 * @class     DS_Admin 
 * @author    Div Blend Team
 * @category  Admin
 * @package   DivStarter/Admin
 * @version     1.0
 */
class DS_Admin_Function {

  /**
   * Constructor
   */
  public function __construct() {
    $this->filters();
  }

  /**
   * Include any classes we need within admin.
   */
  public function filters() {
    /* Relative URL */
    if( get_field('relative_image_urls', 'options') )
      add_filter('image_send_to_editor', array( $this, 'switch_to_relative_url'),10,8);
  }

  /**
   * Switch the content editor to use a relative url
   *
   * @param      string        $html
   * @param      integer       $id
   * @param      string        $caption
   * @param      string        $title
   * @param      string        $align
   * @param      string        $url
   * @param      array         $size
   * @param      string        $alt
   *
   * @return     string  $html
   */
  function switch_to_relative_url($html, $id, $caption, $title, $align, $url, $size, $alt){
    $sp = strpos($html,"src=") + 5;
    $ep = strpos($html,"\"",$sp);
    
    $imageurl = substr($html,$sp,$ep-$sp);
    
    $relativeurl = str_replace("http://","",$imageurl);
    $sp = strpos($relativeurl,"/");
    $relativeurl = substr($relativeurl,$sp);
    
    $html = str_replace($imageurl,$relativeurl,$html);
    
    return $html;
  } 

}
return new DS_Admin_Function();
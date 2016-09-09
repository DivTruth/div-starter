<?php 
/**
 * Class Name:    Starter Role
 * Description:   Permissions and Roles for Site Application
 * Dependencies:  ACF 5.0+, Div Library
 * @link          http://divblend.com/div-starter/modules
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(class_exists('Starter_Role')){
  $Starter_Role = new Starter_Role();
  add_action( 'plugins_loaded', array($Starter_Role, 'init') );
}

class Starter_Role{

  /**
   * Custom Defined Roles
   * @var array
   */
  var $starter_roles;

  /**
   * Menu Permissions
   * @var  array
   */
  var $menu_perms;

  public function __construct(){
    DIV_Role::clear_roles(); # prevent duplicate issues

    /* Setup Roles for this application */
    $this->starter_roles = array(
      /* Standard Div Truth Developer */
      'developer' => array(
        'display_name' => 'Developer', # (optional)
        'capabilities' => array('administrator','developer_menus','designer_menus')
      ),
      /* Standard Div Truth Developer */
      'designer' => array(
        'display_name' => 'Designer', # (optional)
        'capabilities' => array('administrator','designer_menus')
      ),

      /* Add a custom role */
      // 'developer' => array(
      //   'display_name' => 'Developer',
      //   'capabilities' => array(
      //   )
      // ),
    );

    /* Setup Menu Perms for this application */
    $this->menu_perms = array(
      # Capability => Array(menu-slug)
      'developer_menus' => array(
        'Wordfence',                            # Wordfence Plugin
        'edit.php?post_type=acf-field-group',   # ACF
        'tools.php',                            # Tools
        # Sub-Menus
        array(
          'plugins.php'=>'plugin-editor.php',         # Plugin -> Editor
          'options-general.php'=>'options-media.php'  # Settings -> Media
        )
      ),
      'designer_menus' => array(
        'vc-general',                           # Visual Component
        'theme_options'                         # General Theme Options
      ),
    );
  }

  function init(){
    $this->setup_roles();
    $this->setup_dashboard_menus();
  }

  function setup_roles(){
    new DIV_Role($this->starter_roles);
  }

  function setup_dashboard_menus(){
    add_action( 'admin_menu', array( $this, 'setup_menu_by_role' ), 9999 );
    add_filter( 'acf/settings/show_admin', array( $this, 'show_acf_menu' ) );
  }

  function show_acf_menu( $show ) {
    return current_user_can('developer_menus');
  }

  /**
   * Setup admin menu based on user's role
   * @return void
   */
  function setup_menu_by_role() {
    /* Iterate through all menu permissions from constructor */
    foreach ($this->menu_perms as $permission => $menu_array) {
      /* Verify if user has a given permission */
      if(!current_user_can($permission)){
        /* If not, remove all permission related menu items */
        foreach ($menu_array as $key => $menu) {
          /* Check for sub-menu */
          if(is_array($menu)){
            foreach ($menu as $parent => $child) {
              remove_submenu_page( $parent, $child );
            }
          } else {
            remove_menu_page( $menu );
          }
        }
      }
    }
  }
}

?>
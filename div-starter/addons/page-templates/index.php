<?php
/**
 * PAGE TEMPLATES
 * Simple solution for registering new page templates. Simply insert new templates in the template folder OR add a "page-templates" folder in the theme and insert your templates there
 *
 * @version		1.0
 * @package		DivStarter/Classes
 * @category	Functions
 * @author 		Div Blend Team
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'site_app_page_templates' ) ) {
  
	/**
	 * REGISTER PAGE TEMPLATES
	 * @access public
	 * @subpackage SiteApp/Addons
	 * @return void
	 */
	function site_app_page_templates() {
		$templates = array();

		$files = array_diff( scandir(__DIR__.'/templates/',1), array('..', '.') );
		foreach( $files as $file)
			$templates[$file] = preg_replace('/\\.[^.\\s]{3,4}$/', '', DIV\services\helper::beautify($file) );

		new DIV_Template( $templates, __DIR__.'/templates/' );
	}
	site_app_page_templates();  

}

if ( ! function_exists( 'theme_page_templates' ) ) {

	/**
	 * REGISTER THEME PAGE TEMPLATES
	 * @access public
	 * @subpackage SiteApp/Addons
	 * @return void
	 */
	function theme_page_templates() {
		$template_dir = apply_filters( 'theme_page_template_directory', 'page-templates' );
		if( file_exists(get_stylesheet_directory().'/'.$template_dir) ){
			$templates = array();

			$files = array_diff( scandir(get_stylesheet_directory().'/'.$template_dir,1), array('..', '.') );
			foreach( $files as $file)
				$templates[$file] = preg_replace('/\\.[^.\\s]{3,4}$/', '', DIV\services\helper::beautify($file) );

			new DIV_Template( $templates, get_stylesheet_directory().'/'.$template_dir );
		}
	}
	theme_page_templates();
	
}
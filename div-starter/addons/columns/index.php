<?php 
/**
 * Plugin Name: Div: Columns
 * Plugin URI: http://divblend.com/div-starter/add-ons/columns
 * Description: A Div Library add-on that uses ACF (5.0+) for custom columns
 *
 * @package 	Div Library
 * @category 	Add-On
 */

/* Register ACF Fields */
include_once( dirname(__FILE__).'/acf-columns.php' ); 

add_action( 'content_columns', 'load_div_columns');
function load_div_columns($args){
	div_get_template( 'columns-template.php', $args, '', dirname(__FILE__).'/' );
}

?>
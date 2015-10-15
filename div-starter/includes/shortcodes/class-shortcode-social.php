<?php
/**
 * Div Starter Social Icon Shortcodes
 * These social icon shortcodes provide an easy way for setting up social sharing on your site
 *
 * @version     1.0
 * @package 	Div-Starter/Shortcodes/Social
 * @category 	Shortcodes
 * @author 		Div Blend Team
 */

class Social_Icons {

	/**
	 * FACEBOOK SOCIAL ICON
	 * @example [facebook url="http://facebook.com/"]
	 * 
	 * @author Nick Worth
	 * @since 1.0
	 * @param <string> $width
	 * @param <string> $height
	 **/
	public static function facebook( $atts ) {
		extract(shortcode_atts(array(
	    	'url'	 	=> 'http://facebook.com',
	    	'color'		=> '#3C599F'
	    ), $atts));
   		
   		echo '<a href="' . $url . '" class="facebook" target="_blank">facebook</a>';
	}

}
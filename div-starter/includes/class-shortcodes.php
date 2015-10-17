<?php
/**
 * DS_Shortcode class.
 * Div Starter shortcodes will be added here by their respectice classes
 *
 * @class 		DS_Shortcodes
 * @version		1.0
 * @package		DivStarter/Classes
 * @category	Class
 * @author 		Div Blend Team
 */

if( ! defined( 'ABSPATH' ) ) exit;

class DS_Shortcodes extends DIV_Shortcodes {

	/**
	 * Init shortcodes
	 */
	public static function init() {
		global $shortcode_tags;
		

		# Define shortcodes
		$shortcodes = array(
			'facebook'	=> __CLASS__ . '::facebook',
		);

		foreach ( $shortcodes as $shortcode => $function ) {
			if ( !array_key_exists( $shortcode, $shortcode_tags ) )
			add_shortcode( apply_filters( "{$shortcode}_shortcode", $shortcode ), $function );
		}

	}

	

	/**
	 * Facebook Social Icon
	 *
	 * @access public
	 * @param mixed $atts
	 * @return string
	 */
	public static function facebook( $atts ) {
		return self::shortcode_wrapper( array( 'Social_Icons', 'facebook' ), $atts );
	}

}
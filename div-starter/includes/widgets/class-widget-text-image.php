<?php
/**
 * Div Library Text/Image Widget
 *
 * A text widget with an image
 *
 * @version 	1.0
 * @package 	Div_Library/Widgets
 * @category 	Widgets
 * @author 		Div Blend Team
 * @extends 	DS_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class DIV_Widget_Text_Image extends DIV_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'divlibrary widget_text_image';
		$this->widget_description = __( "Simple text widget with an image.", 'divlibrary' );
		$this->widget_id          = 'divlibrary_widget_text_image';
		$this->widget_name        = __( 'DS: Text & Image', 'divlibrary' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( '', 'divlibrary' ),
				'label' => __( 'Title:', 'divlibrary' )
			),
			'image_id' => array(
				'type'  => 'image',
				'std'   => 0,
				'label' => __( 'Select a Banner Image:', 'divlibrary' )
			),
			'link'  => array(
				'type'  => 'text',
				'std'   => __( 'http://', 'divlibrary' ),
				'label' => __( 'Set a link (optional):', 'divlibrary' )
			),
			'new_window' => array(
				'type'  => 'checkbox',
				'std'   => 1,
				'label' => __( 'Open in a new window?', 'divlibrary' )
			),
			'content'  => array(
				'type'  => 'textarea',
				'std'   => __( '', 'divlibrary' ),
				'label' => __( 'Text:', 'divlibrary' )
			),
		);
		parent::__construct();
	}

}

register_widget( 'DIV_Widget_Text_Image' );
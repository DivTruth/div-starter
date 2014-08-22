<?php
/**
 * Banner Widget
 * Easily add a banner image and link element to you page
 *
 * @version 	1.0
 * @category 	Widgets
 * @package 	Div_Library/Div_Starter/Widgets
 * @author 		Div Blend Team
 * @extends 	DIV_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class DS_Widget_Banner extends DIV_Widget {

	/**
	 * @var string
	 * Required to define template path of widget
	 * Default: {div-starter}/templates/widgets/{widget}.php
	 */
	public $widget_template;

	/**
	 * Constructor
	 */
	public function __construct() {
		$widget_template 			= STARTER()->path['widget_templates_dir'].'banner.php';
		$this->widget_cssclass    	= 'divstarter widget_banner';
		$this->widget_description 	= __( "Add a banner image in the sidebar.", 'divstarter' );
		$this->widget_id          	= 'divstarter_widget_banner';
		$this->widget_name        	= __( 'DS: Banner', 'divstarter' );
		$this->settings           	= array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Advertisement', 'divstarter' ),
				'label' => __( 'Title:', 'divstarter' )
			),
			'image_id' => array(
				'type'  => 'image',
				'std'   => 0,
				'label' => __( 'Select a Banner Image:', 'divstarter' )
			),
			'link'  => array(
				'type'  => 'text',
				'std'   => __( 'http://', 'divstarter' ),
				'label' => __( 'Set a link (optional):', 'divstarter' )
			),
			'new_window' => array(
				'type'  => 'checkbox',
				'std'   => 1,
				'label' => __( 'Open in a new window?', 'divstarter' )
			),
		);
		parent::__construct();
	}

}

register_widget( 'DS_Widget_Banner' );
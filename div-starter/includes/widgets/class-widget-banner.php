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

class DIV_Widget_Banner extends DIV_Widget {

	/**
	 * @var array
	 * Required to define template path of widget
	 * Default: /{template->path}/{widget}.php
	 */
	public $template;

	/**
	 * @var instance of site_application
	 */
	public $app;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->app 					= site_application::instance();
		$this->template 			= array(
			'path' 		=> $this->app->path['template_path'].'widgets/',
			'default' 	=> $this->app->path['widget_templates_dir']
		);

		$this->widget_cssclass    	= 'widget_banner';
		$this->widget_description 	= __( "Add a banner image in the sidebar.", 'divlibrary' );
		$this->widget_id          	= 'banner';
		$this->widget_name        	= __( 'DIV: Banner', 'divlibrary' );
		$this->settings           	= array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Advertisement', 'divlibrary' ),
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
		);
		parent::__construct();
	}

}

register_widget( 'DIV_Widget_Banner' );
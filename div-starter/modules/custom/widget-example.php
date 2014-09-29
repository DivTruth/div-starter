<?php
/**
 * Module Example Widget
 * Description of cpt module widget purpose
 *
 * @version 	1.0
 * @package 	Div_Starter/Modules/Custom
 * @category 	Widgets
 * @author 		Div Blend Team
 * @extends 	DIV_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Example extends DIV_Widget {

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
			'path' 		=> '',
			'default' 	=> dirname(__FILE__).'/'
		);

		$this->widget_cssclass    = 'divlibrary custom_widget';
		$this->widget_description = __( "Custom CPT Example widget", 'divlibrary' );
		$this->widget_id          = 'template_example_widget'; #template file name
		$this->widget_name        = __( 'DS: Module Example', 'divlibrary' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Sample Widget', 'divlibrary' ),
				'label' => __( 'Title:', 'divlibrary' )
			),
			'content'  => array(
				'type'  => 'textarea',
				'std'   => __( '', 'divlibrary' ),
				'label' => __( 'Content:', 'divlibrary' )
			),
		);
		parent::__construct();
	}

}

register_widget( 'Widget_Example' );
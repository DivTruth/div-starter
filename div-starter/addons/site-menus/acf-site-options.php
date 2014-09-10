<?php 
/*
Feature Name:   ACF Fields: Site Options
Description:    A generic site options panel for specific site options
Dependencies:   ACF
*/

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_5400d7142a302',
	'title' => 'Site Option Instructions',
	'fields' => array (
		array (
			'key' => 'field_540663f5224f3',
			'label' => 'Instructions',
			'name' => '',
			'prefix' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'message' => 'Create your own options using ACF builder, make sure to select the location for Options Page -> Site Options. Once you have your options simply export the code and replace this field group <strong>(see /addons/site-menus/acf-site-options.php)</strong>',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'site-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif; ?>
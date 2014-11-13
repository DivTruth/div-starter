<?php 
/*
Feature Name:   ACF Fields: Columns
Description:    Basic Column Setup
Version:        1.0
Dependencies:   ACF
*/

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'content_column_group',
	'title' => 'Content Columns',
	'fields' => array (
		array (
			'key' => 'field_54064591343ad',
			'label' => 'Columns',
			'name' => 'columns',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => 'Add a new column and enter the column details',
			'required' => 0,
			'conditional_logic' => 0,
			'min' => 1,
			'max' => '',
			'layout' => 'table',
			'button_label' => 'Add Column',
			'sub_fields' => array (
				array (
					'key' => 'field_fg98451987',
					'label' => 'Emblem',
					'name' => 'emblem',
					'prefix' => '',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'column_width' => 10,
					'return_format' => 'id',
					'preview_size' => 'full',
					'library' => 'all',
				),
				array (
					'key' => 'field_540768e6f4c4d',
					'label' => 'Content',
					'name' => 'content',
					'prefix' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'column_width' => 40,
					'default_value' => '',
					'tabs' => 'visual',
					'toolbar' => 'basic',
					'media_upload' => 0,
				),
				array (
					'key' => 'field_54076d40bc423',
					'label' => 'Button',
					'name' => 'button',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'column_width' => 20,
					'default_value' => '',
					'placeholder' => 'Click Here',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_54076d7abc424',
					'label' => 'Link',
					'name' => 'link',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'column_width' => 30,
					'default_value' => '/',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page',
				'operator' => '==',
				'value' => '9',
			),
		),
	),
	'menu_order' => 2,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'custom_fields',
		3 => 'discussion',
		4 => 'comments',
		5 => 'tags',
		6 => 'send-trackbacks',
	),
));

endif;
?>
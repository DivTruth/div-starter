<?php 

#TODO: Replace with your exported ACF fields

if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_5408d5c203938',
	'title' => 'Custom Details',
	'fields' => array (
		array (
			'key' => 'field_5408e10ab07ed',
			'label' => 'Description',
			'name' => 'description',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => 'Example description with ACF documentation <strong style="float:right;">(ACF: description)</strong>',
			'required' => 0,
			'conditional_logic' => 0,
			'default_value' => '',
			'tabs' => 'visual',
			'toolbar' => 'basic',
			'media_upload' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'custom',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
));

endif; ?>
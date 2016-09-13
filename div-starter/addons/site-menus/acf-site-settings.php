<?php 
/*
Feature Name:   ACF Fields: Site Settings
Description:    Settings for specific site options
Dependencies:   ACF
*/

if( function_exists('acf_add_local_field_group') ):

/**
 * DEVELOPER NOTE
 */
acf_add_local_field_group(array (
    'key' => 'group_57a54c6seffd5',
    'title' => 'Developer Note',
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
                'value' => 'site-settings',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

/**
 * Site Application Options
 */
acf_add_local_field_group(array (
    'key' => 'group_57a54c6fdeed8',
    'title' => 'Application Options',
    'fields' => array (
        array (
            'key' => 'field_57a54c8fb2b81',
            'label' => 'Relative Image URLs',
            'name' => 'relative_image_urls',
            'type' => 'true_false',
            'instructions' => 'This will configure the content editor to use relative urls when inserting images (this is recommended for sites using a https with a SSL)',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => 'Enable relative image urls',
            'default_value' => 0,
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'site-settings',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

endif;
?>
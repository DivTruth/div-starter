<?php
/**
 * Upcoming Classes Widget Template
 *
 * @version     1.0
 * @author 		Div Truth
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( empty($instance) ) return; // No instance vars (customizer instance)

extract($args);
extract($instance);

echo $before_widget;
	
	$title  = apply_filters('widget_title', empty( $title ) ? __( '', 'divstarter' ) : $title );

	if ( $title )
		echo $before_title . $title . $after_title;

	echo '<div class="widget_text_image_content">';

		echo '<div class="">'.$content.'</div>';
		
	echo '</div>';

echo $after_widget;
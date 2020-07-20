<?php
/**
 * @package Div Starter
 * @since   1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php get_header(); ?>

	<div id="content"> 
    	<div id="inner-content" class="wrap clearfix"><div id="main" class="clearfix" role="main">    

		    <?php _e('This is the page template for your custom post type'); ?>

			<?php 
			$custom = new custom();
			$test = $custom->loop();
			print_r($test);
		    ?>

		</div>
	</div>
<?php get_footer(); ?>
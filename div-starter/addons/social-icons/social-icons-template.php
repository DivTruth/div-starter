<?php 
/**
 * Feature Name:   	ACF: Social Icons Template
 * Description:    	HTML markup for Social Icons Template
 * @dependencies: 	ACF
 * @version:        1.0
 * @link: 			http://codepen.io/ameyraut/pen/yfzog?editors=110
 */
?>

<div class="social-icons-wrapper">
	<ul class="social-icons icon-circle list-unstyled list-inline">
 		<?php if(get_field('facebook','options')){ ?>
			<li> <a href="<?php the_field('facebook','options') ?>"><i class="fa fa-facebook"></i></a></li> 
 		<?php } ?>
 		<?php if(get_field('google','options')){ ?>
			<li> <a href="#"><i class="fa fa-google-plus"></i></a></li> 
 		<?php } ?>
 		<?php if(get_field('instagram','options')){ ?>
			<li> <a href="#"><i class="fa fa-instagram"></i></a></li> 
 		<?php } ?>
 		<?php if(get_field('linkedin','options')){ ?>
			<li> <a href="#"><i class="fa fa-linkedin"></i></a></li> 
 		<?php } ?>
 		<?php if(get_field('pinterest','options')){ ?>
			<li> <a href="#"><i class="fa fa-pinterest"></i></a></li> 
 		<?php } ?>
 		<?php if(get_field('twitter','options')){ ?>
			<li> <a href="#"><i class="fa fa-twitter"></i></a></li>
 		<?php } ?>
 		<?php if(get_field('vimeo','options')){ ?>
			<li> <a href="#"><i class="fa fa-vimeo-square"></i></a></li>
 		<?php } ?>
 		<?php if(get_field('youtube','options')){ ?>
			<li> <a href="#"><i class="fa fa-youtube"></i></a></li>
 		<?php } ?>
  	</ul>
</div>
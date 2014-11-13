<?php 
/*
Feature Name:   ACF: Columns Template
Description:    HTML markup for ACF Columns Template
Version:        1.0
Dependencies:   ACF
*/

$cols = 3; // Set the columns per row
$i = 0
?>

<div id="content_columns" class="wrap">
	<?php if( have_rows('columns') ):
	while ( have_rows('columns') ) : the_row(); ?>
		<?php if($i == 0) $pos = "first"; elseif($i == 2) $pos = "last"; ?>
		<div class="column fourcol <?php echo $pos; ?>">
            <a href="<?php the_sub_field('link'); ?>"><div class="emblem"><?php echo wp_get_attachment_image(get_sub_field('emblem') ); ?></div></a>
			<div class="content"><?php the_sub_field('content'); ?></div>
			<div class="cta">
				<a href="<?php the_sub_field('link'); ?>" class=""><?php the_sub_field('button'); ?></a>
			</div>
		</div>
	<?php endwhile;

	else :

	endif;

?>
</div>
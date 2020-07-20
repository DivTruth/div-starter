<?php
/**
 * The template for displaying custom post type content
 *
 * @package Div Starter
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

    <header class="article-header">
        
        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium');
        }  ?> 

    </header> <!-- end article header -->

    <section class="entry-content clearfix">
        <?php the_content(); ?>
    </section> <!-- end article section -->
    
</article> <!-- end article -->
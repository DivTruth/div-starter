<?php
/**
 * @package Div Framework
 * @since   1.0
*/
?>

<?php get_header(); ?>

    <?php 
    /**
     * df_begin_content hook
     *
     * @hooked df_begin_content_container - 10
     * @hooked df_begin_main_container - 15
     */
    do_action('df_begin_content') ?>
         
        <?php #The Loop ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

            <?php do_action('df_before_loop_content') ?>

                <?php remove_action( 'df_post_content', 'df_post_info', 15); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

                    <header class="article-header">

                        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <p class="byline vcard"><?php
                            printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s @ %3$s </time>', 'divtruth'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_time('g:iA'));
                            printf(__('<span class="tags">%1$s</span', 'divtruth'), get_the_category_list(', '));
                        ?></p>

                    </header> <!-- end article header -->

                    <section class="entry-content clearfix">
                        <?php the_content(); ?>
                    </section> <!-- end article section -->

                    <footer class="article-footer">
                        <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'divtruth') . '</span> ', ', ', ''); ?></p>
                    </footer> <!-- end article footer -->
                    
                </article> <!-- end article -->              
            
            <?php do_action('df_after_loop_content') ?>

        <?php endwhile; ?>

            <?php //TODO: Pagination functionality ?>
    
        <?php else : ?>
            
            <?php 
            /**
             * df_post_not_found hook
             *
             * @hooked df_end_main_container - 5
             * @hooked df_load_sidebar - 10
             * @hooked df_end_content_container - 15
             */
            _e('<article id="post-not-found" class="hentry clearfix">');
                do_action('df_post_not_found'); 
            _e('</article>'); ?>
    
        <?php endif; ?>
                  
    <?php 
    /**
     * df_end_content hook
     *
     * @hooked df_end_main_container - 10
     * @hooked get_sidebar - 15
     * @hooked df_end_content_container - 20
     */
    remove_action( 'df_end_content', 'get_sidebar', 15 );
    do_action('df_end_content') ?>

<?php get_footer(); ?>

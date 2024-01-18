<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Allure News
 */

get_header();
global $allure_news_theme_options;
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            /**
             * allure_news_before_main_content hook.
             *
             * @since 0.1
             */
            do_action('allure_news_before_main_content');

            /**
             * allure_news_breadcrumb hook.
             *
             * @since 1.0
             * @hooked allure_news_construct_breadcrumb -  10
             *
             */
            do_action('allure_news_breadcrumb');
            ?>
            <?php
            if( is_active_sidebar( 'single-above-title' )) {
                ?>
                <div class="single-top-sidebar">
                    <?php dynamic_sidebar( 'single-above-title' ); ?>
                </div>
                <?php
            }
            ?>
            <?php

            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());

                the_post_navigation();

                /**
                 * allure_news_after_single_post_navigation hook
                 * @since Allure News 1.0.0
                 *
                 */
                do_action('allure_news_after_single_post_navigation');


                if (is_active_sidebar('single-below-content')) {
                    ?>
                    <div class="single-bottom-sidebar">
                        <?php dynamic_sidebar('single-below-content'); ?>
                    </div>
                    <?php
                }
                /**
                 * allure_news_related_posts hook
                 * @since Allure News 1.0.0
                 *
                 * @hooked allure_news_popular_meta -  10
                 */
                do_action('allure_news_popular_meta', get_the_ID());

                
                /**
                 * Allure News author information section
                 * @since Allure News 1.0.0
                 *
                */
                $author_info = $allure_news_theme_options['allure-news-show-hide-author-box'];

                    if( 1 == $author_info){
                        get_template_part( 'template-parts/content', 'author');
                }

                /**
                 * allure_news_related_posts hook
                 * @since Allure News 1.0.0
                 *
                 * @hooked allure_news_related_posts -  10
                 */
                do_action('allure_news_related_posts', get_the_ID());

                // If comments are open or we have at least one comment, load up the comment template.
                if ((comments_open() || get_comments_number()) && ($allure_news_theme_options['allure-news-enable-single-comments-form'] == 1)) :
                    comments_template();
                endif;

            endwhile; // End of the loop.

            /**
             * allure_news_after_main_content hook.
             *
             * @since 0.1
             */
            do_action('allure_news_after_main_content');
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
/**
 * allure_news_sidebar hook
 * @since Allure News 1.0.0
 *
 * @hooked allure_news_sidebar -  10
 */
do_action('allure_news_sidebar');

get_footer();

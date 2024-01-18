<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure News
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            /**
             * allure_news_before_main_content hook.
             *
             * @since 1.0
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

            if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header><!-- .page-header -->


            <div class="ct-post-list">
                <?php
                $blog_layout = $allure_news_theme_options['allure-news-blog-layout'];
                $blog_column_layout = $allure_news_theme_options['allure-news-column-blog-page'];
                if(($blog_layout == 'masonry') && ($blog_column_layout != 'one-column')){
                    $blog_layout_class = 'ct-masonry';
                }else{
                    $blog_layout_class = '';
                }

                echo "<div class='allure-news-article-wrapper clearfix ". $blog_layout_class ."'>";
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_type());

                endwhile;
                echo '</div>';

                /**
                 * allure_news_action_navigation hook
                 * @since Allure News 1.0.0
                 *
                 * @hooked allure_news_posts_navigation -  10
                 */
                do_action('allure_news_action_navigation');

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
            </div>
            <?php

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

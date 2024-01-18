<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

            if (have_posts()) :

            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php
            endif;
            ?>
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

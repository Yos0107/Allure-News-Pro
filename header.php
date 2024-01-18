<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Allure News
 */
global $allure_news_theme_options;
$allure_news_theme_options = allure_news_get_options_value();
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php allure_news_do_microdata('body'); ?>>
    <?php
    //wp_body_open hook from WordPress 5.2
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>
    <div id="page" class="site">
        <?php
        /**
         * allure_news_before_header hook.
         *
         * @since 1.0.0
         *
         * @hooked allure_news_do_skip_to_content_link - 10
         *
         */
        do_action('allure_news_before_header');


        /**
         * allure_news_header_start_container hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_header_start');

        /**
         * allure_news_header hook.
         *
         * @since 1.0.0
         *
         * @hooked allure_news_construct_header - 10
         */
        do_action('allure_news_header');

        /**
         * allure_news_header_end_container hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_header_end');

        /**
         * allure_news_after_header hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_after_header');


        if (($allure_news_theme_options['allure-news-enable-trending-news'] == 1) && (is_front_page()) && ($allure_news_theme_options['allure-news-enable-trending-news-position'] == 'default-position')) :
            do_action('allure_news_trending_news');
        endif;

        //Check if slider is enabled from customizer
        if ($allure_news_theme_options['allure-news-enable-slider'] == 1) :

            $allure_news_featured_type = $allure_news_theme_options['allure-news-slider-post-types'];
            if ($allure_news_featured_type == 'featured-three') {
                /**
                 * allure_news_carousel_awesome hook.
                 *
                 * @since 1.0.0
                 *
                 * @hooked allure_news_carousel_awesome - 10
                 */
                do_action('allure_news_carousel_awesome');
            } elseif ($allure_news_featured_type == 'featured-two') {
                /**
                 * allure_news_carousel_modern hook.
                 *
                 * @since 1.0.0
                 *
                 * @hooked allure_news_constuct_modern_carousel - 10
                 */
                do_action('allure_news_carousel_modern');
            } elseif ($allure_news_featured_type == 'featured-one') {
                /**
                 * allure_news_carousel hook.
                 *
                 * @since 1.0.0
                 *
                 * @hooked allure_news_constuct_carousel - 10
                 */
                do_action('allure_news_carousel');
            } else {
                /**
                 * allure_news_carousel_four hook.
                 *
                 * @since 1.0.0
                 *
                 * @hooked allure_news_constuct_fourth_carousel - 10
                 */
                do_action('allure_news_carousel_four');
            }

        endif;

        if (($allure_news_theme_options['allure-news-enable-trending-news'] == 1) && (is_front_page()) && ($allure_news_theme_options['allure-news-enable-trending-news-position'] == 'below-featured')) :
            do_action('allure_news_trending_news');
        endif;


        if (($allure_news_theme_options['allure-news-enable-post-carousel-below-slider'] == 1) && (is_front_page())) :
            /**
             * allure_news_post_carousel_customizer hook.
             *
             * @since 1.0.0
             *
             */
            do_action('allure_news_post_carousel_customizer_hook');
        endif;

        if (($allure_news_theme_options['allure-news-enable-post-grid-layout'] == 1) && (is_front_page())) :
            /**
             * allure_news_post_grid_layout hook.
             *
             * @since 1.0.0
             *
             */
            do_action('allure_news_post_grid_layout_hook');
        endif;

        //Full Width Sidebar Area below the featured Section
        if (is_active_sidebar('allure-news-home-full-width-area') && is_front_page()) {
        ?>
            <div class="ct-below-featured-area">
                <div class="container-inner">
                    <?php dynamic_sidebar('allure-news-home-full-width-area'); ?>
                </div>
            </div>
        <?php
        }
        ?>


        <div id="content" class="site-content">
            <?php
            $container_class = !is_page_template('elementor_header_footer') ? 'container-inner ct-container-main' : 'container-outer ct-container-main';
            ?>
            <div class="<?php echo $container_class; ?> clearfix">
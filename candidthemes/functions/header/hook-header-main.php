<?php
/**
 * Main Header Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('allure_news_construct_main_header')) {
    /**
     * Add main header block
     *
     * @since 1.0.0
     */
    function allure_news_construct_main_header()
    {
        global $allure_news_theme_options;
        $logo_position = $allure_news_theme_options['allure-news-custom-logo-position'];
        if($logo_position == 'center'){
            $logo_class = 'full-wrapper text-center';
            $logo_right_class = 'full-wrapper';
        }else{
            $logo_class = 'float-left';
            $logo_right_class = 'float-right';
        }
        ?>
        <?php

        $has_header_image = has_header_image();
        if (!empty($has_header_image)) {
            ?>
            <div class="logo-wrapper-block" style="background-image: url(<?php echo header_image(); ?>);">
            <?php
        } else {
            ?>
            <div class="logo-wrapper-block">
            <?php
        }
        ?>
        <div class="container-inner clearfix logo-wrapper-container">
        <div class="logo-wrapper <?php echo $logo_class ?>">
            <div class="site-branding">

                <div class="allure-news-logo-container">
                    <?php
                    if (function_exists('the_custom_logo')) {

                        the_custom_logo();

                    }
                    if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                 rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;

                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </div> <!-- allure-news-logo-container -->
            </div><!-- .site-branding -->
        </div> <!-- .logo-wrapper -->
        <?php
        global $allure_news_theme_options;
        //Check if header advertisement is enabled from customizer
        if ($allure_news_theme_options['allure-news-enable-ads-header'] == 1):
            /**
             * allure_news_header_ads hook.
             *
             * @since 1.0.0
             *
             */
            do_action('allure_news_header_ads');

        endif;
        ?>
        </div> <!-- .container-inner -->
        </div> <!-- .logo-wrapper-block -->
        <?php
    }
}
add_action('allure_news_main_header', 'allure_news_construct_main_header', 10);
add_action('allure_news_main_header_one', 'allure_news_construct_main_header', 20);
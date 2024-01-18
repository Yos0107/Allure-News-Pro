<?php
/**
 * Main Navigation Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('allure_news_construct_main_navigation')) {
    /**
     * Add main navigation on header
     *
     * @since 1.0.0
     */
    function allure_news_construct_main_navigation()
    {
        global $allure_news_theme_options;

        $menu_alignment_class = "";
        $menu_alignment = $allure_news_theme_options['allure-news-change-primary-menu-position'];
        $sticky_header_option = $allure_news_theme_options['allure-news-enable-sticky-primary-menu'];
        $header_layout = $allure_news_theme_options['allure-news-change-primary-menu-position'];
        if ($sticky_header_option == 1 && $header_layout != 'header-two') {
            $sticky_header_class = 'sticky-header';

        } else {
            $sticky_header_class = '';
        }
        if ($menu_alignment == 'default-menu-position') {
            $menu_alignment_class = "center-aligned";
        }
        ?>
        <div class="allure-news-menu-container <?php echo $sticky_header_class; ?>">
            <div class="container-inner clearfix">
                <nav id="site-navigation"
                     class="main-navigation <?php echo $menu_alignment_class ?>" <?php allure_news_do_microdata('navigation'); ?>>
                    <div class="navbar-header clearfix">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span> </span>
                        </button>
                    </div>
                    <ul id="primary-menu" class="nav navbar-nav nav-menu">
                        <?php
                        if ($allure_news_theme_options['allure-news-enable-menu-home-icon'] == 1):
                            if (is_front_page()) {
                                $home_class = 'current-menu-item';
                            } else {
                                $home_class = '';
                            }

                            ?>
                            <li class="<?php echo $home_class; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">
                                    <i class="fa fa-home"></i> </a></li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if (has_nav_menu('menu-1')) :
                            wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'items_wrap' => '%3$s',
                                'container' => false
                            ));
                        else:
                            wp_list_pages(array('depth' => 0, 'title_li' => ''));
                        endif; // has_nav_menu
                        ?>
                    </ul>
                </nav><!-- #site-navigation -->

                <?php
                if ($allure_news_theme_options['allure-news-enable-menu-section-search'] == 1):
                    ?>
                    <div class="ct-menu-search"><a class="search-icon-box" href="#"> <i class="fa fa-search"></i>
                        </a></div>
                    <div class="top-bar-search">
                        <?php get_search_form(); ?>
                        <button type="button" class="close"></button>
                    </div>
                <?php
                endif;
                ?>
            </div> <!-- .container-inner -->
        </div> <!-- allure-news-menu-container -->
        <?php

    }
}
add_action('allure_news_main_navigation', 'allure_news_construct_main_navigation', 10);
add_action('allure_news_main_header_one', 'allure_news_construct_main_navigation', 10);
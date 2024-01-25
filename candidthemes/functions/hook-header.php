<?php
/**
 * Header Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('allure_news_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function allure_news_do_skip_to_content_link()
    {
        ?>
        <a class="skip-link screen-reader-text"
           href="#content"><?php esc_html_e('Skip to content', 'allure-news'); ?></a>
        <?php
    }
}
add_action('allure_news_before_header', 'allure_news_do_skip_to_content_link', 10);

if (!function_exists('allure_news_preloader')) {
    /**
     * Add preloader to website
     *
     * @since 1.0.0
     */
    function allure_news_preloader()
    {
        global $allure_news_theme_options;


        //Check if preloader is enabled from customizer
        if ($allure_news_theme_options['allure-news-preloader'] == 1) :
            $preloader_image = $allure_news_theme_options['allure-news-preloader-image'];
            $preloader_text = $allure_news_theme_options['allure-news-preloader-text'];
            $preloader_type = esc_attr($allure_news_theme_options['allure-news-preloader-type']);
            ?>
            
            <!-- Preloader -->
            <?php if($preloader_type == 'text'){ ?>
                <div id="preloader">
                    <div class="loader-inner">
                        <div id="text-loader">
                            <h2 id="bg-loader"><?php echo esc_html($preloader_text); ?></h2>
                            <h2 id="fg-loader"><?php echo esc_html($preloader_text); ?></h2>
                        </div>
                    </div>
                </div>
            <?php }elseif($preloader_type == 'dots'){ ?>
                <div id="preloader">
                    <div class="loader-inner">
                        <div id="text-loader">
                            <h2 id="bg-loader">....<span>.</span></h2>
                            <h2 id="fg-loader">....<span>.</span></h2>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div id="loader-wrapper">
                    <?php
                    if(($preloader_type == 'image' )){
                        ?>
                        <img src="<?php echo esc_url($preloader_image); ?>">
                        <?php
                    }else{
                        ?>
                        <div id="loader"></div>

                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
                        <?php
                    }
                    ?>
                </div>
        <?php };

        endif; }
}
add_action('allure_news_before_header', 'allure_news_preloader', 20);

if (!function_exists('allure_news_header_start_container')) {
    /**
     * Add header html open tag
     *
     * @since 1.0.0
     */
    function allure_news_header_start_container()
    {
        ?>
        <header id="masthead" class="site-header" <?php allure_news_do_microdata('header'); ?>>
        <?php

    }
}
add_action('allure_news_header_start', 'allure_news_header_start_container', 10);


if (!function_exists('allure_news_construct_header')) {
    /**
     * Add header block.
     *
     * @since 1.0.0
     */
    function allure_news_construct_header()
    {
        /**
         * allure_news_after_header_open hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_after_header_open');
        ?>
        <div class="overlay"></div>
        <?php
        global $allure_news_theme_options;

        //Check if top header is enabled from customizer
        if ($allure_news_theme_options['allure-news-enable-top-header'] == 1):

            /**
             * allure_news_top_bar hook.
             *
             * @since 1.0.0
             *
             * @hooked allure_news_before_top_bar - 5
             * @hooked allure_news_trending_news - 10
             * @hooked allure_news_top_header_right_start - 15
             * @hooked allure_news_top_social_menu - 20
             * @hooked allure_news_top_menu - 25
             * @hooked allure_news_top_search - 30
             * @hooked allure_news_top_header_right_end - 35
             * @hooked allure_news_after_top_bar - 40
             */
            do_action('allure_news_top_bar');
        endif; // $allure_news_theme_options['allure-news-enable-top-header']

        $allure_news_header_types = $allure_news_theme_options['allure-news-header-types'];
        if ($allure_news_header_types == 'header-one'):
            /**
             * allure_news_main_header_one hook.
             *
             * @since 1.0.0
             *
             * @hooked allure_news_construct_main_navigation - 10
             * @hooked allure_news_construct_main_header - 20
             *
             */
            do_action('allure_news_main_header_one');

        elseif ($allure_news_header_types == 'header-two'):
            /**
             * allure_news_main_header_right_menu hook.
             *
             * @since 1.0.0
             *
             * @hooked allure_news_main_header_right_menu - 10
             *
             */
            do_action('allure_news_main_header_right_menu');
        else:
            /**
             * allure_news_main_header hook.
             *
             * @since 1.0.0
             *
             * @hooked allure_news_construct_main_header - 10
             *
             */
            do_action('allure_news_main_header');


            /**
             * allure_news_main_navigation hook.
             *
             * @since 1.0.0
             *
             * @hooked allure_news_construct_main_navigation - 10
             *
             */
            do_action('allure_news_main_navigation');
        endif;


        /**
         * allure_news_before_header_close hook.
         *
         * @since 1.0.0
         *
         */
        do_action('allure_news_before_header_close');

    }
}
add_action('allure_news_header', 'allure_news_construct_header', 10);


if (!function_exists('allure_news_header_end_container')) {
    /**
     * Add header html close tag
     *
     * @since 1.0.0
     */
    function allure_news_header_end_container()
    {
        ?>
        </header><!-- #masthead -->
        <?php

    }
}
add_action('allure_news_header_end', 'allure_news_header_end_container', 10);

if (!function_exists('allure_news_header_ads')) {
    /**
     * Add header ads
     *
     * @since 1.0.0
     */
    function allure_news_header_ads()
    {
        global $allure_news_theme_options;
        $logo_position = $allure_news_theme_options['allure-news-custom-logo-position'];
        if ($logo_position == 'center') {
            $logo_class = 'full-wrapper text-center';
            $logo_right_class = 'full-wrapper';
        } else {
            $logo_class = 'float-left';
            $logo_right_class = 'float-right';
        }
        $allure_news_header_ads_options = $allure_news_theme_options['allure-news-header-ads-selection'];
        if ($allure_news_header_ads_options == 'image') {
            $allure_news_header_ad_image = esc_url($allure_news_theme_options['allure-news-header-ads-image']);
            $allure_news_header_ad_url = esc_url($allure_news_theme_options['allure-news-header-ads-image-link']);
            if (!empty($allure_news_header_ad_image)):
                ?>
                <div class="logo-right-wrapper clearfix  <?php echo $logo_class ?>">
                    <?php
                    if (!empty($allure_news_header_ad_image) && (!empty($allure_news_header_ad_url))) {
                        ?>
                        <a href="<?php echo $allure_news_header_ad_url ?>" target="_blank">
                            <img src="<?php echo $allure_news_header_ad_image; ?>"
                                 class="<?php echo logo_right_class; ?>">
                        </a>
                        <?php
                    } else if (!empty($allure_news_header_ad_image)) {
                        ?>
                        <img src="<?php echo $allure_news_header_ad_image; ?>"
                             class="<?php echo logo_right_class; ?>">
                        <?php
                    }
                    ?>
                </div> <!-- .logo-right-wrapper -->
            <?php
            endif; // !empty $allure_news_header_ad_image

        } elseif($allure_news_header_ads_options == 'code') {
            $header_ads_code = $allure_news_theme_options['allure-news-header-ads-code'];
            ?>
            <div class="logo-right-wrapper clearfix  <?php echo $logo_class ?>">
                <?php
                echo $header_ads_code;
                ?>
            </div>
            <?php

        }else{
            if(is_active_sidebar( 'header-advertisement' )){
                ?>
                <div class="logo-right-wrapper header-widget-wrapper clearfix  <?php echo $logo_class ?>">
                    <?php
                    dynamic_sidebar( 'header-advertisement' );
                    ?>
                </div>
                <?php
            }
        }


    }
}
add_action('allure_news_header_ads', 'allure_news_header_ads', 10);


if (!function_exists('allure_news_trending_news_item')) {
    /**
     * Add trending news section
     *
     * @since 1.0.0
     */
    function allure_news_trending_news_item()
    {
        global $allure_news_theme_options;
        $trending_cat = absint($allure_news_theme_options['allure-news-trending-news-category']);
        $trending_title = esc_attr($allure_news_theme_options['allure-news-enable-trending-news-text']);
        $trending_thumnail = $allure_news_theme_options['allure-news-enable-trending-image'];
        $trending_post_type = $allure_news_theme_options['allure-news-enable-trending-news-selection'];
        $speed_controller = $allure_news_theme_options[ 'allure-news-post-speed'];

        if (is_rtl()) {
            $marquee_class = 'trending-right';
        } else {
            $marquee_class = 'trending-left';
        }
        ?>
        <?php
        if ($trending_post_type == 'popular-news') {
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => 10,
                'orderby' => 'meta_value_num',
                'meta_key' => 'post_views_count',
                'order' => 'DESC',
                'cat' => $trending_cat
            );
        } else {
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => 10,
                'cat' => $trending_cat
            );

        }

        $query = new WP_Query($query_args);
        if ($query->have_posts()) :
            ?>

            <div class="trending-wrapper">
                <?php
                if ($trending_title):
                    ?>
                    <strong class="trending-title">
                        <?php echo $trending_title; ?>
                    </strong>
                <?php
                endif;
                ?>
                <div class="trending-content <?php echo $marquee_class; ?>" data-speed="<?php echo absint( $speed_controller ); ?>">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>"
                        title="<?php the_title(); ?>">
                            <?php if ($trending_thumnail == 1): ?>
                                <span class="img-marq">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </span>
                            <?php endif; ?>
                            <?php the_title(); ?>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div> <!-- .top-right-col -->
        <?php
        endif;
        ?>
        <?php


    }
}
add_action('allure_news_trending_news', 'allure_news_trending_news_item', 10);

// Post Carousel from Customizer
if (!function_exists('allure_news_post_carousel_customizer')) {
    /**
     * Post Carousel from Customizer
     *
     * @since 1.0.0
     */
    function allure_news_post_carousel_customizer()
    {
        global $allure_news_theme_options;
        $cat_id = absint($allure_news_theme_options['allure-news-post-carousel-below-slider-cat']);
        $post_number = absint($allure_news_theme_options['allure-news-enable-post-carousel-below-slider-number']);
        $enable_cat = $allure_news_theme_options['allure-news-enable-post-carousel-below-slider-category'];
        $enable_date = $allure_news_theme_options['allure-news-enable-post-carousel-below-slider-date'];
        $enable_read_time = $allure_news_theme_options['allure-news-enable-post-carousel-below-slider-read-time'];
        $enable_author = $allure_news_theme_options['allure-news-enable-post-carousel-below-slider-author'];
        $section_title = esc_html($allure_news_theme_options['allure-news-enable-post-carousel-below-slider-title']);

        $query_args = array(
            'post_type' => 'post',
            'cat' => $cat_id,
            'posts_per_page' => $post_number,
            'ignore_sticky_posts' => true
        );

        $query = new WP_Query($query_args);

        if ($query->have_posts()) :

            $bg_color = sanitize_hex_color($allure_news_theme_options['allure-news-post-carousel-background']);
            $text_color = sanitize_hex_color($allure_news_theme_options['allure-news-post-carousel-text-color']);

            ?>
            <div class="ct-header-carousel-section" style="background-color: <?php echo $bg_color; ?>; color: <?php echo $text_color; ?>;">
                <div class="container-inner">
                <?php
                if ($section_title) {
                    ?>
                    <h2 class="widget-title"> <?php 
                    echo  ('<span style= background-color:' .$bg_color.'>' .esc_html($section_title) .'</span>'); ?> </h2>
                    <?php
                }
                ?>
                <div class="ct-header-carousel ct-post-overlay clearfix">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <div class="ct-carousel-single">
                            <?php
                            if (has_post_thumbnail()) {
                                ?>
                                <div class="post-thumb">
                                    <?php
                                    allure_news_post_formats(get_the_ID());
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('allure-news-carousel-img'); ?>
                                    </a>
                                </div>
                                <?php
                            } else {
                                ?>

                                <div class="post-thumb">
                                    <?php
                                    allure_news_post_formats(get_the_ID());
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel.jpg' ?>"
                                             alt="<?php the_title(); ?>">

                                    </a>
                                </div>

                                <?php
                            }
                            ?>
                            <div class="featured-section-details post-content">
                                <?php
                                if ($enable_cat) {
                                    ?>
                                    <div class="post-meta">
                                        <?php
                                        allure_news_featured_carousel_category(get_the_ID());
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="post-meta">
                                    <?php
                                    if ($enable_date) {
                                        allure_news_widget_posted_on();
                                    }
                                    if ($enable_read_time) {
                                        allure_news_read_time_slider(get_the_ID());
                                    }
                                    if ($enable_author) {
                                        allure_news_widget_posted_by();
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div> <!-- .container-inner -->
            </div> <!-- .ct-header-carousel-section -->
        <?php
        endif;
    }
}
add_action('allure_news_post_carousel_customizer_hook', 'allure_news_post_carousel_customizer', 10);


// Post Carousel from Customizer
if (!function_exists('allure_news_post_grid_layout')) {
    /**
     * Post Grid from Customizer
     *
     * @since 1.0.0
     */
    function allure_news_post_grid_layout()
    {
        global $allure_news_theme_options;
        $cat_id_1 = absint($allure_news_theme_options['allure-news-grid-column-select-category-one']);
        $cat_id_2 = absint($allure_news_theme_options['allure-news-grid-column-select-category-two']);
        $cat_id_3 = absint($allure_news_theme_options['allure-news-grid-column-select-category-three']);
        $post_number = absint($allure_news_theme_options['allure-news-grid-column-post-number']);
        $show_category = $allure_news_theme_options['allure-news-grid-column-category'];
        $enable_date = $allure_news_theme_options['allure-news-grid-column-date'];
        $enable_read_time = $allure_news_theme_options['allure-news-grid-column-read-time'];
        $enable_author = $allure_news_theme_options['allure-news-grid-column-author'];

        $show_excerpt = $allure_news_theme_options['allure-news-grid-column-excerpt'];
        $excerpt_length = $allure_news_theme_options['allure-news-grid-column-excerpt-length'];

        $cat1_class = 'cat-' . $cat_id_1;
        $cat2_class = 'cat-' . $cat_id_2;
        $cat3_class = 'cat-' . $cat_id_3;

        $show_default_image = $allure_news_theme_options['allure-news-extra-hide-default-thumbnails'];

        $bg_color = sanitize_hex_color($allure_news_theme_options['allure-news-post-grid-background']);


        $text_color = sanitize_hex_color($allure_news_theme_options['allure-news-post-grid-text-color']);

        ?>
        <div class="block ct-cat-cols ct-below-featured-area ct-grid-wrapper ct-header-post-grid-laypout"
             style="background-color: <?php echo $bg_color; ?>; color: <?php echo $text_color; ?>;">
            <div class="container-inner">
                <div class="row widget clearfix">
                    <div class="ct-three-cols">
                        <?php
                        if ($cat_id_1) {
                            ?>
                            <h2 class="widget-title <?php echo $cat1_class; ?>">
                                <a href="<?php echo esc_url(get_category_link($cat_id_1)); ?>"
                                style="color: <?php echo $text_color; ?>;">
                                <?php echo '<span style= background-color:' .$bg_color. '>' . esc_html(get_cat_name($cat_id_1)). '</span>'; ?>
                                </a>

                            </h2>
                            <?php
                        }
                        ?>

                        <?php
                        $i = 1;
                        $two_category_section = array(
                            'ignore_sticky_posts' => true,
                            'post_type' => 'post',
                            'cat' => $cat_id_1,
                            'posts_per_page' => $post_number,
                            'order' => 'DESC'
                        );
                        $two_category_section_query = new WP_Query($two_category_section);

                        if ($i == 1) {
                            ?>
                            <div class="ct-post-overlay">
                                <?php
                                while ($two_category_section_query->have_posts()):
                                    $two_category_section_query->the_post();
                                    $post_class = '';
                                    if (has_post_thumbnail()) {

                                        ?>

                                        <div class="post-thumb">
                                            <?php
                                            allure_news_post_formats(get_the_ID());
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('allure-news-carousel-img'); ?>
                                            </a>
                                        </div>

                                    <?php } elseif ($show_default_image != 1) {
                                        ?>

                                        <div class="post-thumb">
                                            <?php
                                            allure_news_post_formats(get_the_ID());
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel.jpg' ?>"
                                                     alt="<?php the_title(); ?>">

                                            </a>
                                        </div>

                                        <?php
                                    } else {
                                        $post_class = 'post-relative';
                                    } ?>
                                    <div class="post-content <?php echo $post_class; ?>">
                                        <?php if ($show_category == 1) { ?>
                                            <div class="post-meta">
                                                <?php
                                                allure_news_list_category(get_the_ID());
                                                ?>
                                            </div>
                                        <?php } ?>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                    <?php if ($enable_date == 1 || $enable_read_time == 1 || $enable_author == 1) { ?>
                                        <div class="post-meta">
                                            <?php
                                            if ($enable_date) {
                                                allure_news_widget_posted_on();
                                            }
                                            if ($enable_read_time) {
                                                allure_news_read_time_slider(get_the_ID());
                                            }
                                            if ($enable_author) {
                                                allure_news_widget_posted_by();
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>
                                        <?php if ($show_excerpt == 1) { ?>
                                            <div class="post-excerpt">
                                                <?php echo wp_trim_words(get_the_content(), $excerpt_length); ?>
                                            </div>
                                        <?php } ?>
                                    </div><!-- Post content end -->

                                    <?php $i++;
                                    break; endwhile;
                                ?>

                            </div><!-- Post Overaly Article end -->
                            <?php
                        }
                        if ($i >= 2) {
                            ?>
                            <div class="list-post-block">
                                <ul class="list-post">
                                    <?php
                                    while ($two_category_section_query->have_posts()):
                                        $two_category_section_query->the_post();
                                        ?>
                                        <li>
                                            <div class="post-block-style">

                                                <?php

                                                if (has_post_thumbnail()) {
                                                    ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('thumbnail'); ?>
                                                        </a>
                                                    </div><!-- Post thumb end -->
                                                <?php } elseif ($show_default_image != 1) { ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-thumb.jpg' ?>"
                                                                 alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div><!-- Post thumb end -->
                                                <?php } ?>

                                                <div class="post-content">
                                                    <?php if ($show_category == 1) { ?>
                                                        <div class="post-meta">
                                                            <?php
                                                            allure_news_list_category(get_the_ID());
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                    <h3 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"
                                                           style="color: <?php echo $text_color; ?>;"><?php the_title(); ?></a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <?php
                                                        if ($enable_date) {
                                                            allure_news_posted_on_color($text_color);
                                                        }
                                                        if ($enable_read_time) {
                                                            allure_news_read_time_slider(get_the_ID());
                                                        }
                                                        if ($enable_author) {
                                                            allure_news_widget_posted_by_color($text_color);
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php if ($show_excerpt == 1) { ?>
                                                        <div class="post-excerpt">
                                                            <?php echo wp_trim_words(get_the_content(), $excerpt_length); ?>
                                                        </div>
                                                    <?php } ?>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->

                                        <?php $i++; endwhile;
                                    wp_reset_postdata();
                                    ?>


                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                            <?php
                        }
                        ?>

                    </div><!-- Col 1 end -->

                    <div class="ct-three-cols">

                        <?php
                        if ($cat_id_2) {
                            ?>
                            <h2 class="widget-title <?php echo $cat2_class; ?>">
                                <a href="<?php echo esc_url(get_category_link($cat_id_2)); ?>"
                                style="color: <?php echo $text_color; ?>;">
                                <?php echo '<span style= background-color:' .$bg_color. '>' . esc_html(get_cat_name($cat_id_2)). '</span>'; ?>
                                </a>
                            </h2>
                            <?php
                        }
                        ?>
                        <?php
                        $i = 1;
                        $two_category_section = array(
                            'ignore_sticky_posts' => true,
                            'post_type' => 'post',
                            'cat' => $cat_id_2,
                            'posts_per_page' => $post_number,
                            'order' => 'DESC'
                        );
                        $two_category_section_query = new WP_Query($two_category_section);

                        if ($i == 1) {
                            ?>

                            <div class="ct-post-overlay clearfix">
                                <?php

                                $ID = array();
                                while ($two_category_section_query->have_posts()):
                                    $two_category_section_query->the_post();

                                    $ID[] = get_the_ID();

                                    $post_class = '';
                                    if (has_post_thumbnail()) {

                                        ?>

                                        <div class="post-thumb">
                                            <?php
                                            allure_news_post_formats(get_the_ID());
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('allure-news-carousel-img'); ?>
                                            </a>
                                        </div>

                                    <?php } elseif ($show_default_image != 1) {
                                        ?>

                                        <div class="post-thumb">
                                            <?php
                                            allure_news_post_formats(get_the_ID());
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel.jpg' ?>"
                                                     alt="<?php the_title(); ?>">

                                            </a>
                                        </div>

                                        <?php
                                    } else {
                                        $post_class = 'post-relative';
                                    } ?>
                                    <div class="post-content <?php echo $post_class; ?>">
                                        <?php if ($show_category == 1) { ?>
                                            <div class="post-meta">
                                                <?php
                                                allure_news_list_category(get_the_ID());
                                                ?>
                                            </div>
                                        <?php } ?>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="post-meta">
                                            <?php
                                            if ($enable_date) {
                                                allure_news_widget_posted_on();
                                            }
                                            if ($enable_read_time) {
                                                allure_news_read_time_slider(get_the_ID());
                                            }
                                            if ($enable_author) {
                                                allure_news_widget_posted_by();
                                            }
                                            ?>
                                        </div>
                                        <?php if ($show_excerpt == 1) { ?>
                                            <div class="post-excerpt">
                                                <?php echo wp_trim_words(get_the_content(), $excerpt_length); ?>
                                            </div>
                                        <?php } ?>
                                    </div><!-- Post content end -->

                                    <?php
                                    $i++;
                                    break;
                                endwhile;
                                ?>

                            </div><!-- Post Overaly Article end -->
                            <?php
                        }

                        if ($i >= 2) {
                            ?>
                            <div class="list-post-block">
                                <ul class="list-post">
                                    <?php
                                    while ($two_category_section_query->have_posts()):
                                        $two_category_section_query->the_post();
                                        ?>
                                        <li>
                                            <div class="post-block-style">

                                                <?php

                                                if (has_post_thumbnail()) {
                                                    ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('thumbnail'); ?>
                                                        </a>
                                                    </div><!-- Post thumb end -->
                                                <?php } elseif ($show_default_image != 1) { ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-thumb.jpg' ?>"
                                                                 alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div><!-- Post thumb end -->
                                                <?php } ?>

                                                <div class="post-content">
                                                    <?php if ($show_category == 1) { ?>
                                                        <div class="post-meta">
                                                            <?php
                                                            allure_news_list_category(get_the_ID());
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                    <h3 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"
                                                           style="color: <?php echo $text_color; ?>;"><?php the_title(); ?></a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <?php
                                                        if ($enable_date) {
                                                            allure_news_posted_on_color($text_color);
                                                        }
                                                        if ($enable_read_time) {
                                                            allure_news_read_time_slider(get_the_ID());
                                                        }
                                                        if ($enable_author) {
                                                            allure_news_widget_posted_by_color($text_color);
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php if ($show_excerpt == 1) { ?>
                                                        <div class="post-excerpt">
                                                            <?php echo wp_trim_words(get_the_content(), $excerpt_length); ?>
                                                        </div>
                                                    <?php } ?>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->

                                        <?php
                                        $i++;
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                            <?php
                        }
                        ?>
                    </div><!-- Col 2 end -->
                    <div class="ct-three-cols">

                        <?php
                        if ($cat_id_3) {
                            ?>
                            <h2 class="widget-title <?php echo $cat3_class; ?>">
                                <a href="<?php echo esc_url(get_category_link($cat_id_3)); ?>"
                                   style="color: <?php echo $text_color; ?>;">
                                    <?php echo '<span style= background-color:' .$bg_color. '>' . esc_html(get_cat_name($cat_id_3)). '</span>'; ?>
                                </a>
                            </h2>
                            <?php
                        }
                        ?>

                        <?php
                        $i = 1;
                        $two_category_section = array(
                            'ignore_sticky_posts' => true,
                            'post_type' => 'post',
                            'cat' => $cat_id_3,
                            'posts_per_page' => $post_number,
                            'order' => 'DESC'
                        );
                        $two_category_section_query = new WP_Query($two_category_section);

                        if ($i == 1) {
                            ?>

                            <div class="ct-post-overlay clearfix">
                                <?php

                                $ID = array();
                                while ($two_category_section_query->have_posts()):
                                    $two_category_section_query->the_post();

                                    $ID[] = get_the_ID();

                                    $post_class = '';
                                    if (has_post_thumbnail()) {

                                        ?>

                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('allure-news-carousel-img'); ?>
                                            </a>
                                        </div>

                                    <?php } elseif ($show_default_image != 1) {
                                        ?>

                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel.jpg' ?>"
                                                     alt="<?php the_title(); ?>">

                                            </a>
                                        </div>

                                        <?php
                                    } else {
                                        $post_class = 'post-relative';
                                    } ?>
                                    <div class="post-content <?php echo $post_class; ?>">
                                        <?php if ($show_category == 1) { ?>
                                            <div class="post-meta">
                                                <?php
                                                allure_news_list_category(get_the_ID());
                                                ?>
                                            </div>
                                        <?php } ?>
                                        <h3 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <div class="post-meta">
                                            <?php
                                            if ($enable_date) {
                                                allure_news_widget_posted_on();
                                            }
                                            if ($enable_read_time) {
                                                allure_news_read_time_slider(get_the_ID());
                                            }
                                            if ($enable_author) {
                                                allure_news_widget_posted_by();
                                            }
                                            ?>
                                        </div>
                                        <?php if ($show_excerpt == 1) { ?>
                                            <div class="post-excerpt">
                                                <?php echo wp_trim_words(get_the_content(), $excerpt_length); ?>
                                            </div>
                                        <?php } ?>
                                    </div><!-- Post content end -->

                                    <?php $i++;
                                    break;endwhile;
                                ?>

                            </div><!-- Post Overaly Article end -->
                            <?php
                        }

                        if ($i >= 2) {
                            ?>
                            <div class="list-post-block">
                                <ul class="list-post">
                                    <?php
                                    while ($two_category_section_query->have_posts()):
                                        $two_category_section_query->the_post();
                                        ?>
                                        <li>
                                            <div class="post-block-style">

                                                <?php

                                                if (has_post_thumbnail()) {
                                                    ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_post_thumbnail('thumbnail'); ?>
                                                        </a>
                                                    </div><!-- Post thumb end -->
                                                <?php } elseif ($show_default_image != 1) { ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-thumb.jpg' ?>"
                                                                 alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div><!-- Post thumb end -->
                                                <?php } ?>

                                                <div class="post-content">
                                                    <?php if ($show_category == 1) { ?>
                                                        <div class="post-meta">
                                                            <?php
                                                            allure_news_list_category(get_the_ID());
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                    <h3 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"
                                                           style="color: <?php echo $text_color; ?>;"><?php the_title(); ?></a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <?php
                                                        if ($enable_date) {
                                                            allure_news_posted_on_color($text_color);
                                                        }
                                                        if ($enable_read_time) {
                                                            allure_news_read_time_slider(get_the_ID());
                                                        }
                                                        if ($enable_author) {
                                                            allure_news_widget_posted_by_color($text_color);
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php if ($show_excerpt == 1) { ?>
                                                        <div class="post-excerpt">
                                                            <?php echo wp_trim_words(get_the_content(), $excerpt_length); ?>
                                                        </div>
                                                    <?php } ?>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->

                                        <?php $i++;endwhile;
                                    wp_reset_postdata(); ?>

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                        <?php } ?>
                    </div><!-- Col 3 end -->
                </div><!-- Row end -->
            </div> <!-- .ct-container -->
        </div><!-- Block  end -->
        <?php
    }
}
add_action('allure_news_post_grid_layout_hook', 'allure_news_post_grid_layout', 10);
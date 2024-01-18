<?php
/**
 * Main Navigation Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('allure_news_constuct_awesome_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function allure_news_constuct_awesome_carousel()
    {

        global $allure_news_theme_options;

        if (is_front_page()) {
            global $allure_news_theme_options;
            $allure_news_site_layout = $allure_news_theme_options['allure-news-site-layout-options'];
            $slider_cat = $allure_news_theme_options['allure-news-select-category'];
            $featured_cat = $allure_news_theme_options['allure-news-select-category-featured-right'];
            $allure_news_enable_date = $allure_news_theme_options['allure-news-slider-post-date'];
            $allure_news_enable_author = $allure_news_theme_options['allure-news-slider-post-author'];
            $allure_news_enable_pagination = $allure_news_theme_options['allure-news-slider-slide-prev-next'];
            $allure_news_pagination_class = "";
            if($allure_news_enable_pagination == false){
                $allure_news_pagination_class = "allure-news-disable-prevnext";
            }
            ?>
            <div class="allure-news-featured-block allure-news-ct-row allure-awesome-carousel clearfix">
                <?php

                allure_news_main_carousel($slider_cat);


                $query_args = array(
                    'post_type' => 'post',
                    'ignore_sticky_posts' => true,
                    'posts_per_page' => 4,
                    'cat' => $featured_cat
                );

                $query = new WP_Query($query_args);
                if ($query->have_posts()) :
                    ?>
                    <div class="allure-news-col allure-news-col-2">
                        <div class="allure-news-inner-row clearfix">
                            <?php
                            $i=1;
                            while ($query->have_posts()) :
                                $query->the_post();
                                ?>
                                <div class="allure-news-col">
                                    <div class="featured-section-inner ct-post-overlay">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            ?>
                                            <div class="post-thumb">
                                                <?php
                                                allure_news_post_formats(get_the_ID());
                                                ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if ($allure_news_site_layout == 'boxed') {
                                                        the_post_thumbnail('allure-news-carousel-img');
                                                    } else {
                                                        the_post_thumbnail('allure-news-carousel-large-img');
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="post-thumb">
                                                <?php
                                                allure_news_post_formats(get_the_ID());
                                                ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if ($allure_news_site_layout == 'boxed') {
                                                        ?>
                                                        <img src="<?php echo get_template_directory_uri().'/candidthemes/assets/images/allure-mag-carousel.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo get_template_directory_uri().'/candidthemes/assets/images/allure-mag-carousel-large.jpg' ?>" alt="<?php the_title(); ?>">
                                                        <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <div class="featured-section-details post-content">
                                            <div class="post-meta">
                                                <?php
                                                allure_news_featured_list_category(get_the_ID());
                                                ?>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <?php
                                            if ($allure_news_enable_date || $allure_news_enable_author) {
                                                ?>
                                                <div class="post-meta">
                                                    <?php
                                                    if ($allure_news_enable_date) {
                                                        allure_news_posted_on();
                                                    }
                                                    allure_news_read_time_words_count(get_the_ID());
                                                    if ($allure_news_enable_author) {
                                                        allure_news_posted_by();
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div> <!-- .featured-section-inner -->
                                </div><!--.allure-news-col-->
                                <?php
                                $i++;

                            endwhile;
                            wp_reset_postdata()
                            ?>

                        </div>
                    </div><!--.allure-news-col-->
                <?php
                endif;
                ?>

            </div><!-- .allure-news-ct-row-->
            <?php


        }//is_front_page
    }
}
add_action('allure_news_carousel_awesome', 'allure_news_constuct_fourth_carousel', 10);
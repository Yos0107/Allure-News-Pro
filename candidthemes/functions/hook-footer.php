<?php
/**
 * Header Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('allure_news_footer_start')) {
    /**
     * Add footer start tag.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_start()
    {
        ?>
        <footer id="colophon" class="site-footer">
        <?php
    }
}
add_action('allure_news_footer', 'allure_news_footer_start', 5);

if (!function_exists('allure_news_footer_socials')) {
    /**
     * Add footer social media
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_socials()
    {
        global $allure_news_theme_options;
        if ($allure_news_theme_options['allure-news-footer-social-icons'] == 1) {
            ?>
            <div class="ct-footer-social">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social-menu',
                    'menu_id' => 'menu-social-1',
                    'container' => 'ul',
                    'menu_class' => 'allure-news-menu-social'
                ));
                ?>
            </div>
            <?php

        }
    }
}
add_action('allure_news_footer', 'allure_news_footer_socials', 10);

if (!function_exists('allure_news_footer_widget')) {
    /**
     * Add footer top widget blocks
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_widget()
    {
        //Check if there are widgets on any footer sidebar
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
            ?>

            <div class="top-footer">
                <div class="container-inner clearfix">
                    <?php
                    $count = 0;
                    for ($i = 1; $i <= 3; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            $count++;
                        }
                    }
                    $column = $count;
                    $column_class = 'widget-column footer-active-' . absint($count);
                    for ($i = 1; $i <= 4; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            ?>
                            <div class="ct-col-<?php echo esc_attr($column); ?>">
                                <?php dynamic_sidebar('footer-' . $i); ?>
                            </div>
                            <?php
                        }
                    }

                    ?>
                </div> <!-- .container-inner -->
            </div> <!-- .top-footer -->
            <?php
        }
    }
}
add_action('allure_news_footer', 'allure_news_footer_widget', 15);


if (!function_exists('allure_news_footer_siteinfo')) {
    /**
     * Add footer site info block
     *
     * @param none
     * @return void
     * @since 1.0.0
     *
     */
    function allure_news_footer_siteinfo()
    {
        ?>

        <div class="site-info" <?php allure_news_do_microdata('footer'); ?>>
            <div class="container-inner">
                <?php
                global $allure_news_theme_options;
                $allure_news_copyright = wp_kses_post($allure_news_theme_options['allure-news-footer-copyright']);
                $allure_news_powered_text = wp_kses_post($allure_news_theme_options['allure-news-footer-powered-text']);
                if (!empty($allure_news_copyright)):
                    ?>
                    <span class="copy-right-text"><?php echo $allure_news_copyright; ?></span><br>
                <?php
                endif; //$allure_news_copyright
                if (!empty($allure_news_powered_text)) {
                    echo $allure_news_powered_text;
                }
                ?>
            </div> <!-- .container-inner -->
        </div><!-- .site-info -->
        <?php
    }
}
add_action('allure_news_footer', 'allure_news_footer_siteinfo', 20);


if (!function_exists('allure_news_footer_end')) {
    /**
     * Add footer end tag.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_end()
    {
        ?>
        </footer><!-- #colophon -->
        <?php
    }
}
add_action('allure_news_footer', 'allure_news_footer_end', 25);

if (!function_exists('allure_news_construct_gototop')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_construct_gototop()
    {
        global $allure_news_theme_options;
        if ($allure_news_theme_options['allure-news-go-to-top'] == 1):
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'allure-news'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
        <?php
        endif;

    }
}
add_action('allure_news_gototop', 'allure_news_construct_gototop', 10);


//hooks you may missed section
if (!function_exists('allure_news_you_may_missed')) {
    /**
     * Add you may missed section
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_you_may_missed()
    {
        global $allure_news_theme_options;
        $sec_enable = $allure_news_theme_options['allure-news-footer-you-may-missed'];
        $post_cat = $allure_news_theme_options['allure-news-you-missed-select-category'];
        $post_col = $allure_news_theme_options['allure-news-footer-you-may-missed-column'];
        $post_date = $allure_news_theme_options['allure-news-footer-you-may-missed-date'];
        $post_category = $allure_news_theme_options['allure-news-footer-you-may-missed-category'];
        $sec_title = $allure_news_theme_options['allure-news-footer-you-may-missed-title'];
        $enable_author = $allure_news_theme_options['allure-news-footer-you-may-missed-author'];
        $show_read_time = $allure_news_theme_options['allure-news-footer-you-may-missed-read-time'];
        $show_default_image = $allure_news_theme_options['allure-news-extra-hide-default-thumbnails'];
        $bg_color =  sanitize_hex_color($allure_news_theme_options['allure-news-missed-this-background']);
        $text_color = sanitize_hex_color($allure_news_theme_options['allure-news-missed-this-text-color']);

        if ($sec_enable == 0) {
            return;
        }
        if ($post_col == 2) {
            $post_col_column = 'ct-two-cols';
        } elseif ($post_col == 3) {
            $post_col_column = 'ct-three-cols';
        } elseif ($post_col == 4) {
            $post_col_column = 'ct-four-cols';
        } else {
            $post_col_column = 'ct-five-cols';
        }
        ?>
        <div class="ct-missed-block widget" style="background-color: <?php echo $bg_color; ?>; color: <?php echo $text_color; ?>;"">
            <div class="container-inner">
            <?php
            if($sec_title){
                ?>
                <h2 class="widget-title"> <?php echo '<span>' .esc_html($sec_title) .'</span>'; ?> </h2>
                <?php
            }
            ?>
            <?php
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => $post_col,
                'cat' => $post_cat
            );

            $query = new WP_Query($query_args);
            if ($query->have_posts()) :
                ?>
                <div class="ct-grid-post clearfix">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <div class="ct-col <?php echo $post_col_column; ?>">
                            <section class="ct-grid-post-list">
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
                                }elseif ($show_default_image != 1) {
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
                                <div class="post-content mt-10">
                                    <?php if($post_category == 1 ){ ?>
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
                                    <?php if ($post_date == 1 || $show_read_time == 1 || $enable_author == 1) { ?>
                                        <div class="post-meta">
                                            <?php
                                            if ($post_date == 1){
                                                allure_news_posted_on_color($text_color);
                                            }
                                            if ($show_read_time == 1){
                                                allure_news_read_time_words_count(get_the_ID());
                                            }
                                            if ($enable_author) {
                                                allure_news_widget_posted_by_color($text_color);
                                            }

                                            ?>
                                        </div>
                                    <?php } ?>
                                </div><!-- Post content end -->
                            </section>
                        </div><!--.allure-news-col-->
                    <?php
                    endwhile;
                    wp_reset_postdata()
                    ?>

                </div>

            <?php
            endif;
            ?>
            </div>
        </div>
        <?php
    }
}
add_action('allure_news_you_may_missed_hook', 'allure_news_you_may_missed', 10);

/*
* Instagram Feed Shortcodes Above the Footer
*/

if (!function_exists('allure_news_footer_instagram_feed')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function allure_news_footer_instagram_feed()
    {
        global $allure_news_theme_options;
        $instagram_shortcode = $allure_news_theme_options['allure-news-footer-instagram-feed'];
        if (!empty($instagram_shortcode) && function_exists('sb_instagram_feed_init')) {
            echo do_shortcode($instagram_shortcode);
        }
    }
}
add_action('allure_news_footer_instagram_feed_action', 'allure_news_footer_instagram_feed', 10);
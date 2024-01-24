<?php
/**
 * Single Post Hook Element.
 *
 * @package Allure News
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Display related posts from same category
 *
 * @param int $post_id
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_related_post')) :

    function allure_news_related_post($post_id)
    {

        global $allure_news_theme_options;
        if ($allure_news_theme_options['allure-news-single-page-related-posts'] == 0) {
            return;
        }
        $posts_numbers = $allure_news_theme_options['allure-news-single-page-related-posts-number'];
        if (absint($posts_numbers) < 1) {
            $posts_numbers = 3;
        }
        $related_by = $allure_news_theme_options['allure-news-single-page-related-selection-types'];

        $count = 0;
        if($related_by == 'category') {
            $categories = get_the_category($post_id);
            if ($categories) {
                $category_ids = array();
                $category = get_category($category_ids);
                $categories = get_the_category($post_id);
                foreach ($categories as $category) {
                    $category_ids[] = $category->term_id;
                }
                $count = count($category_ids);

                $allure_news_cat_post_args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post_id),
                    'post_type' => 'post',
                    'posts_per_page' => $posts_numbers,
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => true
                );

            }
        }else{
            $tags = get_the_tags($post_id);
            if ($tags) {
                $tags_ids = array();
                foreach ($tags as $tag) {
                    $tags_ids[] = $tag->term_id;
                }

                $count = count($tags_ids);
                $allure_news_cat_post_args = array(
                    'tag__in' => $tags_ids,
                    'post__not_in' => array($post_id),
                    'post_type' => 'post',
                    'posts_per_page' => $posts_numbers,
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => true
                );

            }
        }
        if ($count >= 1) { ?>
            <div class="related-pots-block">
                <?php
                $allure_news_related_post_title = $allure_news_theme_options['allure-news-single-page-related-posts-title'];
                if (!empty($allure_news_related_post_title)):
                    ?>
                    <h2 class="widget-title">
                       <span> <?php echo $allure_news_related_post_title; ?></span>
                    </h2>
                <?php
                endif;
                ?>
                <ul class="related-post-entries clearfix">
                    <?php

                    $allure_news_featured_query = new WP_Query($allure_news_cat_post_args);

                    while ($allure_news_featured_query->have_posts()) : $allure_news_featured_query->the_post();
                        ?>
                        <li>
                            <?php
                            if (has_post_thumbnail() && ($allure_news_theme_options['allure-news-single-page-related-posts-image'] == 1)):
                                ?>
                                <figure class="widget-image">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_post_thumbnail('allure-news-small-thumb'); ?>
                                    </a>
                                </figure>
                            <?php
                            endif;
                            ?>
                            <div class="featured-desc">
                                <h2 class="related-title">
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <?php
                                if ($allure_news_theme_options['allure-news-single-page-related-posts-date'] == 1):
                                    ?>
                                    <div class="entry-meta">
                                        <?php
                                        allure_news_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                                <?php
                                endif;
                                ?>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div> <!-- .related-post-block -->
            <?php
        }
    }
endif;
add_action('allure_news_related_posts', 'allure_news_related_post', 10, 1);


/**
 * Save user visits
 *
 * @param int $post_id
 * @return null
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_popular_meta')) :

    function allure_news_popular_meta($post_id)
    {
        $count_post = get_post_meta( $post_id, 'post_views_count', true);

        if( (int)$count_post >= 0)
        {
            $count_post = (int)$count_post + 1;
            update_post_meta($post_id, 'post_views_count', $count_post);
        }
        else
        {
            $count_post = 0;
            delete_post_meta( $post_id, 'post_views_count');
            add_post_meta( $post_id, 'post_views_count', $count_post);

        }
    }
endif;
add_action('allure_news_popular_meta', 'allure_news_popular_meta', 10, 1);
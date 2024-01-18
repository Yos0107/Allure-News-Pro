<?php
/**
 * Allure News Category Three Column Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Allure_News_Category_Three_Column')) {
    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Allure_News_Category_Three_Column extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'cat_id_1' => 0,
                'cat_id_2' => 0,
                'cat_id_3' => 0,
                'post_number' => 5,
                'post-date' => 1,
                'show_category' => 1,
                'show-excerpt' => 0,
                'excerpt-length' => 15,
            );
            return $defaults;

        }

        public function __construct()
        {
            $opts = array(
                'classname' => 'allure-news-cat_column',
                'description' => esc_html__('Three Category Column Widget.', 'allure-news'),
            );
            parent::__construct('allure_news_three_category_column_widget', esc_html__('Allure News Three Category Column', 'allure-news'), $opts);
        }

        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults());

            $cat_id_1 = absint($instance['cat_id_1']);
            $cat_id_2 = absint($instance['cat_id_2']);
            $cat_id_3 = absint($instance['cat_id_3']);
            $post_number = absint($instance['post_number']);
            $post_date = absint($instance['post-date']);
            $show_category = absint($instance['show_category']);
            $show_excerpt = absint($instance['show-excerpt']);
            $excerpt_length = absint($instance['excerpt-length']);
            $cat1_class = 'cat-' . $cat_id_1;
            $cat2_class = 'cat-' . $cat_id_2;
            $cat3_class = 'cat-' . $cat_id_3;

            echo $args['before_widget'];
            global $allure_news_theme_options;
            $show_default_image = !empty($allure_news_theme_options['allure-news-extra-hide-default-thumbnails']) ? $allure_news_theme_options['allure-news-extra-hide-default-thumbnails'] : '';
            $hide_read_time = !empty($allure_news_theme_options['allure-news-extra-hide-read-time']) ? $allure_news_theme_options['allure-news-extra-hide-read-time']: '';
            ?>
            <div class="block ct-cat-cols">
                <div class="row clearfix">
                    <div class="ct-three-cols">


                        <?php
                        if ($cat_id_1) {
                            ?>
                            <h2 class="widget-title <?php echo $cat1_class; ?>">
                                <a href="<?php echo esc_url(get_category_link($cat_id_1)); ?>">

                                    <?php echo esc_html(get_cat_name($cat_id_1)); ?>

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
                                        <?php if ($post_date == 1 || $hide_read_time != 1) { ?>
                                            <div class="post-meta">
                                                <?php
                                                if ($post_date == 1) {
                                                    allure_news_posted_on();
                                                }
                                                if ($hide_read_time != 1) {
                                                    allure_news_read_time_words_count(get_the_ID());
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
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                    <?php if ($post_date == 1 || $hide_read_time != 1) { ?>
                                                        <div class="post-meta">
                                                            <?php
                                                            if ($post_date == 1) {
                                                                allure_news_posted_on();
                                                            }
                                                            if ($hide_read_time != 1) {
                                                                allure_news_read_time_words_count(get_the_ID());
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
                                <a href="<?php echo esc_url(get_category_link($cat_id_2)); ?>">
                                    <?php echo esc_html(get_cat_name($cat_id_2)); ?>
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
                                        <?php if ($post_date == 1 || $hide_read_time != 1) { ?>
                                            <div class="post-meta">
                                                <?php
                                                if ($post_date == 1) {
                                                    allure_news_posted_on();
                                                }
                                                if ($hide_read_time != 1) {
                                                    allure_news_read_time_words_count(get_the_ID());
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
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                    <?php if ($post_date == 1 || $hide_read_time != 1) { ?>
                                                        <div class="post-meta">
                                                            <?php
                                                            if ($post_date == 1) {
                                                                allure_news_posted_on();
                                                            }
                                                            if ($hide_read_time != 1) {
                                                                allure_news_read_time_words_count(get_the_ID());
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
                                <a href="<?php echo esc_url(get_category_link($cat_id_3)); ?>">
                                    <?php echo esc_html(get_cat_name($cat_id_3)); ?>
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
                                        <?php if ($post_date == 1 || $hide_read_time != 1) { ?>
                                            <div class="post-meta">
                                                <?php
                                                if ($post_date == 1) {
                                                    allure_news_posted_on();
                                                }
                                                if ($hide_read_time != 1) {
                                                    allure_news_read_time_words_count(get_the_ID());
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
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                    <?php if ($post_date == 1 || $hide_read_time != 1) { ?>
                                                        <div class="post-meta">
                                                            <?php
                                                            if ($post_date == 1) {
                                                                allure_news_posted_on();
                                                            }
                                                            if ($hide_read_time != 1) {
                                                                allure_news_read_time_words_count(get_the_ID());
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
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->

                                        <?php $i++;endwhile;
                                    wp_reset_postdata(); ?>

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                        <?php } ?>
                    </div><!-- Col 3 end -->
                </div><!-- Row end -->
            </div><!-- Block Lifestyle end -->
            <div class="gap-40"></div>

            <?php
            echo $args['after_widget'];
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id_1'] = (isset($new_instance['cat_id_1'])) ? absint($new_instance['cat_id_1']) : '';
            $instance['cat_id_2'] = (isset($new_instance['cat_id_2'])) ? absint($new_instance['cat_id_2']) : '';
            $instance['cat_id_3'] = (isset($new_instance['cat_id_3'])) ? absint($new_instance['cat_id_3']) : '';
            $instance['post_number'] = absint($new_instance['post_number']);
            $instance['post-date'] = absint($new_instance['post-date']);
            $instance['show_category'] = absint($new_instance['show_category']);
            $instance['show-excerpt'] = absint($new_instance['show-excerpt']);
            $instance['excerpt-length'] = absint($new_instance['excerpt-length']);
            return $instance;
        }

        public function form($instance)

        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $cat_id_1 = absint($instance['cat_id_1']);
            $cat_id_2 = absint($instance['cat_id_2']);
            $cat_id_3 = absint($instance['cat_id_3']);
            $post_number = absint($instance['post_number']);
            $post_date = absint($instance['post-date']);
            $show_excerpt = absint($instance['show-excerpt']);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id_1')); ?>">
                    <strong><?php esc_html_e('Select Category for Column One', 'allure-news'); ?></strong>
                </label><br/>
                <?php
                $allure_news_category_col_1_dropown_cat = array(
                    'show_option_all' => esc_html__('Show Recent Posts', 'allure-news'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => absint($instance['cat_id_1']),
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id_1')),
                    'id' => esc_attr($this->get_field_name('cat_id_1')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($allure_news_category_col_1_dropown_cat);
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id_2')); ?>">
                    <strong><?php esc_html_e('Select Category for Column Two', 'allure-news'); ?></strong>
                </label><br/>
                <?php
                $allure_news_category_col_2_dropown_cat = array(
                    'show_option_all' => esc_html__('Show Recent Posts', 'allure-news'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => absint($instance['cat_id_2']),
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id_2')),
                    'id' => esc_attr($this->get_field_name('cat_id_2')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($allure_news_category_col_2_dropown_cat);
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id_3')); ?>">
                    <strong><?php esc_html_e('Select Category for Column Three', 'allure-news'); ?></strong>
                </label><br/>
                <?php
                $allure_news_category_col_3_dropown_cat = array(
                    'show_option_all' => esc_html__('Show Recent Posts', 'allure-news'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => absint($instance['cat_id_3']),
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id_3')),
                    'id' => esc_attr($this->get_field_name('cat_id_3')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($allure_news_category_col_3_dropown_cat);
                ?>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'allure-news'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number"
                       value="<?php echo $post_number; ?>" min="1"/>
            </p>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('post-date')); ?>"><?php esc_html_e('Show Post Date:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('post-date')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post-date')); ?>" type="checkbox"
                       value="<?php echo $post_date; ?>" <?php checked(($instance['post-date'] == 1) ? $instance['post-date'] : 0); ?>/>
            </p>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('show_category')); ?>"><?php esc_html_e('Show Post Category:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show_category')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('show_category')); ?>" type="checkbox"
                       value="<?php echo $show_category; ?>" <?php checked(($instance['show_category'] == 1) ? $instance['show_category'] : 0); ?>/>
            </p>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"><?php esc_html_e('Show Post Excerpt:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('show-excerpt')); ?>" type="checkbox"
                       value="<?php echo $show_excerpt; ?>" <?php checked(($instance['show-excerpt'] == 1) ? $instance['show-excerpt'] : 0); ?>/>
            </p>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('excerpt-length')); ?>"><?php esc_html_e('Number of Words in Excerpt:', 'allure-news'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('excerpt-length')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('excerpt-length')); ?>" type="number"
                       value="<?php echo esc_attr($instance['excerpt-length']); ?>"/>
            </p>

            <?php
        }
    }
}
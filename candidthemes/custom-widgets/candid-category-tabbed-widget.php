<?php

/**
 * Allure News Category Tabbed Widget.
 *
 * @since 1.0.0
 */
if (!class_exists('Allure_News_Category_Tabbed_Widget')) :
    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Allure_News_Category_Tabbed_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'widget_title' => esc_html__('Popular News', 'allure-news'),
                'category_id' => 0,
                'post_number' => 5,
                'show_content' => 1,
                'post-date' => 1,
                'show-category' => 1,
                'show-excerpt' => 0,
                'excerpt-length' => 15,
                'f-excerpt-length' => 15,
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'allure_news_category_tabbed_widget',
                esc_html__('Allure News Category Tabbed', 'allure-news'),
                array('description' => esc_html__('Allure News Category Tabbed Widget for the tabbed of categories.', 'allure-news'))
            );
        }

        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults());

            $post_number = absint($instance['post_number']);
            $widget_title = apply_filters('widget_title', !empty($instance['widget_title']) ? esc_html($instance['widget_title']) : '', $instance, $this->id_base);
            $allure_news_selected_cat = array();

            $show_content = !empty($instance['show_content']) ? $instance['show_content'] : '';
            $post_date = !empty($instance['post-date']) ? $instance['post-date'] : '';
            $show_category = !empty($instance['show-category']) ? $instance['show-category'] : '';
            $show_excerpt = !empty($instance['show-excerpt']) ? $instance['show-excerpt'] : '';
            $excerpt_length = !empty($instance['excerpt-length']) ? $instance['excerpt-length'] : '';
            $f_excerpt_length = !empty($instance['f-excerpt-length']) ? $instance['f-excerpt-length'] : '';
            global $allure_news_theme_options;
            $show_default_image = !empty($allure_news_theme_options['allure-news-extra-hide-default-thumbnails']) ?  $allure_news_theme_options['allure-news-extra-hide-default-thumbnails'] : '';
            $hide_read_time = !empty($allure_news_theme_options['allure-news-extra-hide-read-time']) ? $allure_news_theme_options['allure-news-extra-hide-read-time'] : '';
            if (!empty($instance['category_id'])) {
                $allure_news_selected_cat = allure_news_sanitize_multiple_category($instance['category_id']);
                if (is_array($allure_news_selected_cat[0])) {
                    $allure_news_selected_cat = $allure_news_selected_cat[0];
                }

                echo $args['before_widget'];
?>

                <div class="featured-tab">
                    <?php
                    if (!empty($widget_title)) {
                        echo $args['before_title'] . '<span>' .esc_html($widget_title) .'</span>'. $args['after_title'];
                    }
                    ?>
                    <div class="ct-tabs">
                        <div class="tab-head-wrapper clearfix">
                            <ul class="nav nav-tabs ct-nav-tabs">

                                <?php
                                $i = 1;
                                foreach ($allure_news_selected_cat as $cat) {

                                ?>
                                    <li class="nav-item <?php if ($i == 1) {
                                                            echo "active";
                                                        } ?>">
                                        <a class="nav-link ct-tab-<?php echo $cat; ?>" href="#tab_<?php echo $cat; ?>" data-toggle="tab">
                                            <span class="tab-head">
                                                <span class="tab-text-title">
                                                    <?php echo get_cat_name($cat); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                <?php
                                    $i++;
                                }
                                ?>

                            </ul>
                        </div>

                        <div class="tab-content">
                            <?php
                            $j = 1;
                            foreach ($allure_news_selected_cat as $cat) {
                            ?>
                                <div class="tab-pane fade in <?php if ($j == 1) {
                                                                    echo "active";
                                                                } ?>" id="tab_<?php echo $cat; ?>">

                                    <?php
                                    $query_args = array(
                                        'post_type' => 'post',
                                        'cat' => absint($cat),
                                        'posts_per_page' => 5,
                                        'ignore_sticky_posts' => true
                                    );

                                    $query = new WP_Query($query_args);
                                    $count = $query->post_count;
                                    if ($query->have_posts()) :
                                        $i = 1;

                                    ?>
                                        <div class="ct-grid-post clearfix">
                                            <?php
                                            while ($query->have_posts()) :
                                                $query->the_post();
                                            ?>
                                                <?php

                                                if ($i == 1) {
                                                ?>
                                                    <div class="ct-two-cols ct-first-column">
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
                                                            } elseif ($show_default_image != 1) {
                                                            ?>

                                                                <div class="post-thumb">
                                                                    <?php
                                                                    allure_news_post_formats(get_the_ID());
                                                                    ?>
                                                                    <a href="<?php the_permalink(); ?>">
                                                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel.jpg'); ?>" alt="<?php the_title(); ?>">

                                                                    </a>
                                                                </div>

                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="post-content mt-10">
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
                                                                <?php if ($show_content == 1) { ?>
                                                                    <div class="post-excerpt">
                                                                        <?php echo allure_news_excerpt_words(get_the_ID(), absint($f_excerpt_length)); ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div><!-- Post content end -->
                                                        </section>

                                                    </div>
                                                    <?php
                                                } else {
                                                    if ($i == 2) {
                                                    ?>

                                                        <div class="ct-two-cols">

                                                            <div class="list-post-block">
                                                                <ul class="list-post">
                                                                <?php
                                                            }
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
                                                                            </div>
                                                                        <?php
                                                                        } elseif ($show_default_image != 1) { ?>
                                                                            <div class="post-thumb">
                                                                                <a href="<?php the_permalink(); ?>">
                                                                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-thumb.jpg'); ?>" alt="<?php the_title(); ?>">
                                                                                </a>
                                                                            </div><!-- Post thumb end -->
                                                                        <?php }
                                                                        ?>
                                                                        <div class="post-content">
                                                                            <?php if ($show_category == 1) { ?>
                                                                                <div class="post-meta">
                                                                                    <?php
                                                                                    allure_news_list_category(get_the_ID());
                                                                                    ?>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <div class="featured-post-title">
                                                                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                                </h3>

                                                                            </div>
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
                                                                                    <?php echo allure_news_excerpt_words(get_the_ID(), absint($excerpt_length)); ?>
                                                                                </div>
                                                                            <?php } ?>
                                                                            <?php
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <?php
                                                                if ($i == $count) {
                                                                ?>
                                                                </ul>
                                                            </div> <!-- .list-post-block -->
                                                        </div> <!-- .ct-two-cols -->
                                                <?php
                                                                }
                                                            }
                                                ?>
                                            <?php
                                                $i++;
                                            endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        </div>
                                    <?php
                                    endif;

                                    ?>
                                </div><!-- Tab pane 1 end -->
                            <?php $j++;
                            } ?>
                        </div><!-- tab content -->
                    </div> <!-- .ct-tabs -->
                </div>
            <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['category_id'] = (isset($new_instance['category_id'])) ? allure_news_sanitize_multiple_category($new_instance['category_id']) : array('');
            $instance['widget_title'] = sanitize_text_field($new_instance['widget_title']);
            $instance['post_number'] = absint($new_instance['post_number']);
            $instance['show_content'] = absint($new_instance['show_content']);
            $instance['post-date'] = absint($new_instance['post-date']);
            $instance['show-category'] = absint($new_instance['show-category']);
            $instance['show-excerpt'] = absint($new_instance['show-excerpt']);
            $instance['excerpt-length'] = absint($new_instance['excerpt-length']);
            $instance['f-excerpt-length'] = absint($new_instance['f-excerpt-length']);
            return $instance;
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults());
            $post_number = absint($instance['post_number']);
            $widget_title = esc_attr($instance['widget_title']);
            $allure_news_selected_cat = array();
            if (!empty($instance['category_id'])) {
                $allure_news_selected_cat = allure_news_sanitize_multiple_category($instance['category_id']);
                if (is_array($allure_news_selected_cat[0])) {
                    $allure_news_selected_cat = $allure_news_selected_cat[0];
                }
            }
            $show_content = absint($instance['show_content']);
            $post_date = absint($instance['post-date']);
            $show_category = absint($instance['show-category']);
            $show_excerpt = absint($instance['show-excerpt']);
            $excerpt_length = absint($instance['excerpt-length']);
            $f_excerpt_length = absint($instance['f-excerpt-length']);

            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('widget_title')); ?>"><strong><?php esc_html_e('Title:', 'allure-news'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_title')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_title')); ?>" type="text" value="<?php echo $widget_title; ?>" />
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('category_id')); ?>"><strong><?php esc_html_e('Select Category', 'allure-news'); ?></strong></label>
                <select class="widefat" name="<?php echo $this->get_field_name('category_id'); ?>[]" id="<?php echo esc_attr($this->get_field_id('category_id')); ?>" multiple="multiple">
                    <?php
                    $option = '';
                    $categories = get_categories();
                    if ($categories) {
                        foreach ($categories as $category) {
                            $result = in_array($category->term_id, $allure_news_selected_cat) ? 'selected=selected' : '';
                            $option .= '<option value="' . esc_attr($category->term_id) . '"' . esc_attr($result) . '>';
                            $option .= esc_html($category->cat_name);
                            $option .= esc_html(' (' . $category->category_count . ')');
                            $option .= '</option>';
                        }
                    }
                    echo $option;
                    ?>
                </select>
            </p>
            <hr>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'allure-news'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('f-excerpt-length')); ?>"><?php esc_html_e('Number of Words in Featured Excerpt:', 'allure-news'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('f-excerpt-length')); ?>" name="<?php echo esc_attr($this->get_field_name('f-excerpt-length')); ?>" type="number" value="<?php echo esc_attr($instance['f-excerpt-length']); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('excerpt-length')); ?>"><?php esc_html_e('Number of Words Normal Excerpt:', 'allure-news'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('excerpt-length')); ?>" name="<?php echo esc_attr($this->get_field_name('excerpt-length')); ?>" type="number" value="<?php echo esc_attr($instance['excerpt-length']); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('show_content')); ?>"><?php esc_html_e('Show Featured Post Excerpt:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show_content')); ?>" name="<?php echo esc_attr($this->get_field_name('show_content')); ?>" type="checkbox" value="<?php echo $show_content; ?>" <?php checked(($instance['show_content'] == 1) ? $instance['show_content'] : 0); ?> />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"><?php esc_html_e('Show Normal Post Excerpt:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>" name="<?php echo esc_attr($this->get_field_name('show-excerpt')); ?>" type="checkbox" value="<?php echo $show_excerpt; ?>" <?php checked(($instance['show-excerpt'] == 1) ? $instance['show-excerpt'] : 0); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post-date')); ?>"><?php esc_html_e('Show Post Date:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('post-date')); ?>" name="<?php echo esc_attr($this->get_field_name('post-date')); ?>" type="checkbox" value="<?php echo $post_date; ?>" <?php checked(($instance['post-date'] == 1) ? $instance['post-date'] : 0); ?> />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('show-category')); ?>"><?php esc_html_e('Show Post Category:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-category')); ?>" name="<?php echo esc_attr($this->get_field_name('show-category')); ?>" type="checkbox" value="<?php echo $show_category; ?>" <?php checked(($instance['show-category'] == 1) ? $instance['show-category'] : 0); ?> />
            </p>

<?php
        }
    }
endif;

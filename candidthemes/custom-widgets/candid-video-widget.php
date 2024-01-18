<?php
/**
 * Video Widget
 *
 * @package Allure News
 */
if (!class_exists('Allure_News_Video_Widget')) {
    /**
     * Advertisement widget class.
     *
     * @since Allure News 1.0.0
     */
    class Allure_News_Video_Widget extends WP_Widget
    {
        private function defaults()
            /* Default Value */
        {
            $defaults = array(
                'title' => esc_html__('Videos', 'allure-news'),
                'category_id' => 0,
                'show_category' => 1,
                'post_date' => 1,
                'post_number' => 5
            );
            return $defaults;
        }

        public function __construct()

        {
            parent::__construct(
                'allure-news-video-widget',
                esc_html__('Allure News Video', 'allure-news'),
                array('description' => esc_html__('Enter the video link while making post.', 'allure-news'))
            );
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @param array $args widget setting
         * @param array $instance saved values
         *
         * @return void
         *
         * @since 1.0
         *
         */

        public function widget($args, $instance)
        {

            $instance = wp_parse_args((array )$instance, $this->defaults());

            echo $args['before_widget'];
            $title = apply_filters('title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
            $category_id = absint($instance['category_id']);
            $show_category = absint($instance['show_category']);
            $post_date = absint($instance['post_date']);
            $post_number = absint($instance['post_number']);
            global $allure_news_theme_options;
            $show_default_image = !empty($allure_news_theme_options['allure-news-extra-hide-default-thumbnails']) ? $allure_news_theme_options['allure-news-extra-hide-default-thumbnails'] : '';
            $hide_read_time = !empty($allure_news_theme_options['allure-news-extra-hide-read-time']) ? $allure_news_theme_options['allure-news-extra-hide-read-time'] : '';

            if (!empty($title)) {
                $cat_class = 'cat-' . $category_id;
                ?>
                <div class="title-wrapper <?php echo $cat_class; ?>">
                    <?php
                    echo $args['before_title'];
                    if (!empty($category_id)) {
                        ?>
                        <a href="<?php echo esc_url(get_category_link($category_id)); ?>"> <?php echo esc_html($title); ?> </a>
                        <?php
                    } else {
                        echo esc_html($title);
                    }
                    echo $args['after_title'];
                    ?>
                </div>
                <?php
            }

            $query_args = array(
                'post_type' => 'post',
                'cat' => absint($category_id),
                'posts_per_page' => absint($post_number),
                'ignore_sticky_posts' => true
            );

            $query = new WP_Query($query_args);

            if ($query->have_posts()) :
                ?>
                <div class="ct-video-grid-post clearfix">
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();

                        $video_link = get_post_meta(get_the_ID(), 'allure_news_video', true);
                        ?>
                        <div class="ct-video-list">
                            <section class="ct-grid-post-list">
                                <?php
                                if (has_post_thumbnail()) {
                                    ?>
                                    <div class="post-thumb">
                                        <?php the_post_thumbnail('allure-news-carousel-img'); ?>
                                        <a class="ct-popup popup" href="<?php echo esc_url($video_link); ?>">
                                            <div class="video-icon">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                } elseif ($show_default_image != 1) { ?>
                                    <div class="post-thumb">
                                        <img src="<?php echo get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel.jpg' ?>"
                                             alt="<?php the_title(); ?>">
                                        <a class="ct-popup popup" href="<?php echo esc_url($video_link); ?>">
                                            <div class="video-icon">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </a>
                                    </div><!-- Post thumb end -->
                                <?php }
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
                                            if ($post_date == 1){
                                                allure_news_posted_on();
                                            }
                                            if ($hide_read_time != 1){
                                                allure_news_read_time_words_count(get_the_ID());
                                            }

                                            ?>
                                        </div>
                                    <?php } ?>
                                </div><!-- Post content end -->
                            </section>

                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php
            endif;

            echo $args['after_widget'];
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         *
         * @return array
         *
         * @since 1.0
         *
         */

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['category_id'] = (isset($new_instance['category_id'])) ? absint($new_instance['category_id']) : '';
            $instance['show_category'] = (isset($new_instance['show_category'])) ? absint($new_instance['show_category']) : '';
            $instance['post_date'] = (isset($new_instance['post_date'])) ? absint($new_instance['post_date']) : '';
            $instance['post_number'] = absint($new_instance['post_number']);
            return $instance;
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $category_id = absint($instance['category_id']);
            $show_category = absint($instance['show_category']);
            $post_date = absint($instance['post_date']);
            $post_number = absint($instance['post_number']);
            $title = esc_attr($instance['title']);
            ?>
            <p>

                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'allure-news'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo $title; ?>"/>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('category_id')); ?>">
                    <?php esc_html_e('Select Category For Video Section', 'allure-news'); ?>
                </label><br/>
                <?php
                $allure_news_slider_dropown_cat = array(
                    'show_option_all' => esc_html__('Show Recent Posts', 'allure-news'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $category_id,
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('category_id')),
                    'id' => esc_attr($this->get_field_name('category_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );

                wp_dropdown_categories($allure_news_slider_dropown_cat);

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
                        for="<?php echo esc_attr($this->get_field_id('post_date')); ?>"><?php esc_html_e('Show Post Date:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('post_date')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('post_date')); ?>" type="checkbox"
                       value="<?php echo $post_date; ?>" <?php checked(($instance['post_date'] == 1) ? $instance['post_date'] : 0); ?>/>
            </p>
            <p>
                <label
                        for="<?php echo esc_attr($this->get_field_id('show_category')); ?>"><?php esc_html_e('Show Post Category:', 'allure-news'); ?></label>
                <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show_category')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('show_category')); ?>" type="checkbox"
                       value="<?php echo $show_category; ?>" <?php checked(($instance['show_category'] == 1) ? $instance['show_category'] : 0); ?>/>
            </p>
            <?php
        }
    }
}
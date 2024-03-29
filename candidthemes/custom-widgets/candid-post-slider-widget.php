<?php
/**
 * Allure News Post Slider Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Allure_News_Post_Slider')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Allure_News_Post_Slider extends WP_Widget
    {
       private function defaults()
       {
        $defaults = array(
            'title'    => esc_html__( 'Posts Slider', 'allure-news' ),
            'cat'     => 0,
            'post-number' => 5,
            'post-date'=> 1,
            'show-category'=> 1,
            'show-excerpt'=> 0,
            'excerpt-length'=> 15,
        );
        return $defaults;
    }

    public function __construct()
    {
        $opts = array(
            'classname' => 'allure-news-post-slider',
            'description' => esc_html__('Display post in Slider Form. Suitable on Sidebars.', 'allure-news'),
        );

        parent::__construct('allure-news-post-slider', esc_html__('Allure News Post Slider', 'allure-news'), $opts);
    }


    public function widget($args, $instance)
    {
        $instance = wp_parse_args( (array) $instance, $this->defaults() );
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        echo $args['before_widget'];

        $cat_id = !empty($instance['cat']) ? $instance['cat'] : '';
        $post_date = !empty($instance['post-date']) ? $instance['post-date'] : '';
        $show_category = !empty($instance['show-category']) ? $instance['show-category'] : '';
        $show_excerpt = !empty($instance['show-excerpt']) ? $instance['show-excerpt'] : '';
        $excerpt_length = !empty($instance['excerpt-length']) ? $instance['excerpt-length'] : '';
        $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';
        global $allure_news_theme_options;
        $hide_read_time = !empty( $allure_news_theme_options['allure-news-extra-hide-read-time']) ? $allure_news_theme_options['allure-news-extra-hide-read-time'] : '';

        if (!empty($title)) {
            $cat_class = 'cat-'.$cat_id;
            ?>
            <div class="title-wrapper <?php echo $cat_class; ?>">
                <?php
                echo $args['before_title'];
                if(!empty($cat_id)){
                    ?>
                    <a href="<?php echo esc_url(get_category_link($cat_id)); ?>"> <?php echo  '<span>' .esc_html($title) .'</span>'; ?> </a>
                    <?php
                }else{
                    echo  '<span>' .esc_html($title) .'</span>';
                }
                echo $args['after_title'];
                ?>
            </div>
            <?php
        }

        $allure_news_slider_args = array();
        if(is_rtl()){
            $allure_news_slider_args['rtl']      = true;
        }
        $allure_news_slider_args_encoded = wp_json_encode( $allure_news_slider_args );

        $query_args = array(
            'post_type' => 'post',
            'cat' => absint($cat_id),
            'posts_per_page' => absint($post_number),
            'ignore_sticky_posts' => true
        );

        $query = new WP_Query($query_args); ?>
        
        <div class="allure-news-slider-container">
            <section class="section-slider">
                <div class="header-carousel">
                    <ul class="ct-post-carousel slider"  data-slick='<?php echo $allure_news_slider_args_encoded; ?>'>
                        <?php
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <li>
                                <div class="ct-carousel-inner carousel-thumbnail-block">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('allure-news-carousel-large-img');
                                        }else{
                                            ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri() . '/candidthemes/assets/images/allure-mag-carousel-large.jpg'); ?>"
                                                 alt="<?php the_title(); ?>">
                                            <?php
                                        }
                                        ?>
                                    </a>

                                    <div class="slide-details">
                                        <div class="slider-content-inner">
                                            <div class="slider-content">
                                                <?php if($show_category == 1 ) { ?>
                                                    <div class="post-meta">
                                                        <?php
                                                        allure_news_list_category(get_the_ID());
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                                <h2>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h2>
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
                                                <?php if($show_excerpt == 1){ ?>
                                                    <div class="post-excerpt">
                                                        <?php echo wp_trim_words(get_the_content(),$excerpt_length); ?>
                                                    </div>
                                                <?php  } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- .ct-carousel-inner -->
                                <div class="overly"></div>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                </div> <!-- .header-carousel  -->
            </section> <!-- .section-slider -->
        </div><!-- .allure-news-slider-container -->
        <?php
        echo $args['after_widget']; ?>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['cat'] = absint($new_instance['cat']);
        $instance['post-number'] = absint($new_instance['post-number']);
        $instance['post-date'] = absint($new_instance['post-date']);
        $instance['show-category'] = absint($new_instance['show-category']);
        $instance['show-excerpt'] = absint($new_instance['show-excerpt']);
        $instance['excerpt-length'] = absint($new_instance['excerpt-length']);
        return $instance;

    }

    public function form($instance)
    {
        $instance  = wp_parse_args( (array )$instance, $this->defaults() );

        $title    = esc_attr($instance['title']);
        $post_date    = absint( $instance['post-date'] );
        $show_category    = absint( $instance['show-category'] );
        $post_number    = absint( $instance['post-number'] );
        $show_excerpt    = absint( $instance['show-excerpt'] );
        $excerpt_length   = absint( $instance['excerpt-length'] );
        
        ?>
        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'allure-news'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
            name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
            value="<?php echo esc_attr($instance['title']); ?>"/>
        </p>
        <p class="custom-dropdown-posts">
            <label for="<?php echo esc_attr($this->get_field_name('cat')); ?>">
                <strong><?php esc_html_e('Select Category: ', 'allure-news'); ?></strong>
            </label>
            <?php
            $cat_args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'id' => $this->get_field_id('cat'),
                'name' => $this->get_field_name('cat'),
                'class' => 'widefat',
                'taxonomy' => 'category',
                'selected' => absint($instance['cat']),
                'show_option_all' => esc_html__('Show Recent Posts', 'allure-news')
            );
            wp_dropdown_categories($cat_args);
            ?>
        </p>

        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'allure-news'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
            name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
            value="<?php echo esc_attr($instance['post-number']); ?>"/>
        </p>
        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('post-date')); ?>"><?php esc_html_e('Show Post Date:', 'allure-news'); ?></label>
            <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('post-date')); ?>"
            name="<?php echo esc_attr($this->get_field_name('post-date')); ?>" type="checkbox"  value="<?php echo $post_date; ?>" <?php checked(($instance['post-date'] == 1) ? $instance['post-date'] : 0); ?>/>
        </p>

        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('show-category')); ?>"><?php esc_html_e('Show Post Category:', 'allure-news'); ?></label>
            <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-category')); ?>"
            name="<?php echo esc_attr($this->get_field_name('show-category')); ?>" type="checkbox"  value="<?php echo $show_category; ?>" <?php checked(($instance['show-category'] == 1) ? $instance['show-category'] : 0); ?>/>
        </p>
        <p>
            <label
            for="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"><?php esc_html_e('Show Post Excerpt:', 'allure-news'); ?></label>
            <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"
            name="<?php echo esc_attr($this->get_field_name('show-excerpt')); ?>" type="checkbox"  value="<?php echo $show_excerpt; ?>" <?php checked(($instance['show-excerpt'] == 1) ? $instance['show-excerpt'] : 0); ?>/>
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
endif;
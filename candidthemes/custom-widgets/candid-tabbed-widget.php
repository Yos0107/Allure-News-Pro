<?php
/**
 * Allure News Post Tabbed Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Allure_News_Tabbed_Post')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Allure_News_Tabbed_Post extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'title' => esc_html__('Posts Tabbed', 'allure-news'),
                'popular_title' => esc_html__('Popular Posts', 'allure-news'),
                'recent_title' => esc_html__('Recent Posts', 'allure-news'),
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
                'classname' => 'allure-news-tabbed',
                'description' => esc_html__('Tabbed Widget for multiple content.', 'allure-news'),
            );
            parent::__construct('allure-news-tabbed', esc_html__('Allure News Tabbed', 'allure-news'), $opts);
        }

        public function widget($args, $instance)
        {
            $instance = wp_parse_args( (array) $instance, $this->defaults() );
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];

            if (!empty($title)) {
                echo $args['before_title'] .  ('<span>' .esc_html($title) .'</span>') . $args['after_title'];
            }
            $popular_title = !empty($instance['popular_title']) ? $instance['popular_title'] : '';
            $recent_title = !empty($instance['recent_title']) ? $instance['recent_title'] : '';
            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';
            $post_date = !empty($instance['post-date']) ? $instance['post-date'] : '';
            $show_category = !empty($instance['show-category']) ? $instance['show-category'] : '';
            $show_excerpt = !empty($instance['show-excerpt']) ? $instance['show-excerpt'] : '';
            $excerpt_length = !empty($instance['excerpt-length']) ? $instance['excerpt-length'] : '';
            ?>
            <div class="ct-tabs">
                <ul class="nav nav-tabs ct-nav-tabs">
                    <?php if (!empty($popular_title)) { ?>
                        <li class="ct-title-head active"><a data-toggle="tab"
                          href="#home"><?php esc_html($popular_title); ?></a>
                      </li>
                  <?php } ?>
                  <?php if (!empty($recent_title)) { ?>
                    <li class="ct-title-head"><a data-toggle="tab"
                       href="#menu1"><?php esc_html($recent_title); ?></a>
                   </li>
               <?php } ?>
           </ul>

           <div class="tab-content">
            <?php if (!empty($popular_title)) { ?>
                <div id="home" class="tab-pane fade in active">
                    <section class="featured-posts-block">
                        <?php
                        $p_query_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => absint($post_number),
                            'ignore_sticky_posts' => true,
                            'orderby' => 'comment_count'
                        );
                        $p_query = new WP_Query($p_query_args);
                        if ($p_query->have_posts()) :
                            ?>
                            <div class="list-post-block">
                                <ul class="list-post">
                                    <?php
                                    while ($p_query->have_posts()):
                                        $p_query->the_post();
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
                                                <?php } ?>

                                                <div class="post-content">
                                                    <?php if($show_category == 1 ) { ?>
                                                    <div class="post-meta">
                                                        <?php
                                                        allure_news_list_category(get_the_ID());
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                                    <h3 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                    <?php if($post_date == 1){ ?>
                                                        <div class="post-meta">
                                                            <?php allure_news_posted_on(); ?>
                                                        </div>
                                                    <?php  } ?>
                                                    <?php if($show_excerpt == 1){ ?>
                                                        <div class="post-excerpt">
                                                            <?php echo wp_trim_words(get_the_content(),$excerpt_length); ?>
                                                        </div>
                                                    <?php  } ?>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->

                                    <?php endwhile;
                                    wp_reset_postdata(); ?>

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                            <?php
                        endif;
                        ?>
                    </section>
                </div>
            <?php } ?>
            <?php if (!empty($recent_title)) { ?>
                <div id="menu1" class="tab-pane fade">
                    <section class="featured-posts-block">
                        <?php
                        $query_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => absint($post_number),
                            'ignore_sticky_posts' => true
                        );
                        $query = new WP_Query($query_args);
                        if ($query->have_posts()) :
                            ?>
                            <div class="list-post-block">
                                <ul class="list-post">
                                    <?php
                                    while ($query->have_posts()):
                                        $query->the_post();
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
                                                <?php } ?>

                                                <div class="post-content">
                                                    <?php if($show_category == 1 ) { ?>
                                                    <div class="post-meta">
                                                        <?php
                                                        allure_news_list_category(get_the_ID());
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                                    <h3 class="post-title">
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h3>
                                                    <?php if($post_date == 1){ ?>
                                                        <div class="post-meta">
                                                            <?php allure_news_posted_on(); ?>
                                                        </div>
                                                    <?php  } ?>
                                                    <?php if($show_excerpt == 1){ ?>
                                                        <div class="post-excerpt">
                                                            <?php echo wp_trim_words(get_the_content(),$excerpt_length); ?>
                                                        </div>
                                                    <?php  } ?>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->

                                    <?php endwhile;
                                    wp_reset_postdata(); ?>

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->
                            <?php

                        endif;
                        ?>
                    </section>
                </div>
            <?php } ?>
        </div>
    </div> <!-- .ct-tabs -->

    <?php
    echo $args['after_widget'];
}

public function update($new_instance, $old_instance)
{
    $instance = $old_instance;

    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['popular_title'] = sanitize_text_field($new_instance['popular_title']);
    $instance['recent_title'] = sanitize_text_field($new_instance['recent_title']);
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
    $popular_title    = esc_attr($instance['popular_title']);
    $recent_title    = esc_attr($instance['recent_title']);
    $post_number    = absint( $instance['post-number'] );
    $post_date = absint( $instance['post-date'] );
    $show_category = absint( $instance['show-category'] );
    $show_excerpt = absint( $instance['show-excerpt'] );
    $excerpt_length   = absint( $instance['excerpt-length'] );

    ?>
    <p>
        <label
        for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:', 'allure-news'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
        value="<?php echo esc_attr($instance['title']); ?>"/>
    </p>
    <p>
        <label
        for="<?php echo esc_attr($this->get_field_id('popular_title')); ?>"><?php esc_html_e('Popular Title:', 'allure-news'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('popular_title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('popular_title')); ?>" type="text"
        value="<?php echo esc_attr($instance['popular_title']); ?>"/>
    </p>
    <p>
        <label
        for="<?php echo esc_attr($this->get_field_id('recent_title')); ?>"><?php esc_html_e('Recent Title:', 'allure-news'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('recent_title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('recent_title')); ?>" type="text"
        value="<?php echo esc_attr($instance['recent_title']); ?>"/>
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
        for="<?php echo esc_attr($this->get_field_id('post-date')); ?>"><?php esc_html_e('Show Date:', 'allure-news'); ?></label>
        <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('post-date')); ?>"
        name="<?php echo esc_attr($this->get_field_name('post-date')); ?>" type="checkbox"           value="<?php echo $post_date; ?>" <?php checked(($instance['post-date'] == 1) ? $instance['post-date'] : 0); ?>/>
    </p>
    <p>
        <label
        for="<?php echo esc_attr($this->get_field_id('show-category')); ?>"><?php esc_html_e('Show Category:', 'allure-news'); ?></label>
        <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-category')); ?>"
        name="<?php echo esc_attr($this->get_field_name('show-category')); ?>" type="checkbox"           value="<?php echo $show_category; ?>" <?php checked(($instance['show-category'] == 1) ? $instance['show-category'] : 0); ?>/>
    </p>
    <p>
        <label
        for="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"><?php esc_html_e('Show Excerpt:', 'allure-news'); ?></label>
        <input class="widefat ct-show-hide" id="<?php echo esc_attr($this->get_field_id('show-excerpt')); ?>"
        name="<?php echo esc_attr($this->get_field_name('show-excerpt')); ?>" type="checkbox"           value="<?php echo $show_excerpt; ?>" <?php checked(($instance['show-excerpt'] == 1) ? $instance['show-excerpt'] : 0); ?>/>
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
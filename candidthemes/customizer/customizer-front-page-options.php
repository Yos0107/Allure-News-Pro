<?php
/**
 *  Allure News Front Page Option
 *
 * @since Allure News 1.0.0
 *
 */

/*
* Front Page Options
*/
$wp_customize->add_panel( 'allure_news_front_page_panel', array(
 'priority' => 25,
 'capability' => 'edit_theme_options',
 'title' => __( 'Allure News Front Page', 'allure-news' ),
) );

/*Post Carousel Below Slider*/
$wp_customize->add_section( 'allure_news_post_carousel_below_slider', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Post Carousel Below Slider', 'allure-news' ),
    'panel' 		 => 'allure_news_front_page_panel',
) );
/*Enable Post Carousel Below Slider*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider]', array(
    'label'     => __( 'Enable Post Carousel Below Slider', 'allure-news' ),
    'description' => __('Enable post carousel below Slider.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions you may missed*/
if ( !function_exists('allure_news_post_carousel_enable') ) :
    function allure_news_post_carousel_enable(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $posts_carousel = absint($allure_news_theme_options['allure-news-enable-post-carousel-below-slider']);
        if( 1 == $posts_carousel ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Grid Post section category one*/
$wp_customize->add_setting( 'allure_news_options[allure-news-post-carousel-below-slider-cat]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-post-carousel-below-slider-cat'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new allure_news_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-post-carousel-below-slider-cat]',
    array(
      'label'     => __( 'Select Category For Post Carousel', 'allure-news' ),
      'description' => __('From the dropdown select the category for the first column.', 'allure-news'),
      'section'   => 'allure_news_post_carousel_below_slider',
      'settings'  => 'allure_news_options[allure-news-post-carousel-below-slider-cat]',
      'type'      => 'category_dropdown',
      'priority'  => 15,
      'active_callback'=>'allure_news_post_carousel_enable'
    )
  )
);


/*Post Carousel Title*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider-title]', array(
    'label'     => __( 'Section Title For Carousel Posts Below Slider', 'allure-news' ),
    'description' => __('Enter the title of Post Carousel.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider-title]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_carousel_enable',
) );

/*Number of Posts*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider-number]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider-number'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider-number]', array(
    'label'     => __( 'Number of Posts', 'allure-news' ),
    'description' => __('A slider will be available if you select more than four posts.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider-number]',
    'type'      => 'number',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_carousel_enable',
) );

/*Post Carousel Below Slider category*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider-category]', array(
    'label'     => __( 'Enable Category', 'allure-news' ),
    'description' => __('Show Category in carousel section.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider-category]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_carousel_enable',
) );

/*Post Carousel Below Slider date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider-date]', array(
    'label'     => __( 'Enable Date', 'allure-news' ),
    'description' => __('Show date in carousel section.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider-date]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_carousel_enable',
) );

/*Post Carousel Below Slider author*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider-author]', array(
    'label'     => __( 'Enable Author', 'allure-news' ),
    'description' => __('Show author in carousel section.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider-author]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_carousel_enable',
) );

/*Post Carousel Below Slider read time*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-carousel-below-slider-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-carousel-below-slider-read-time'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-carousel-below-slider-read-time]', array(
    'label'     => __( 'Enable Read Time', 'allure-news' ),
    'description' => __('Show read time in carousel section.', 'allure-news'),
    'section'   => 'allure_news_post_carousel_below_slider',
    'settings'  => 'allure_news_options[allure-news-enable-post-carousel-below-slider-read-time]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_carousel_enable',
) );

/* Post carousel backgroud color */
$wp_customize->add_setting( 'allure_news_options[allure-news-post-carousel-background]',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
        'default'           => $default['allure-news-post-carousel-background'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-post-carousel-background]',
        array(
            'label'       => esc_html__( 'Section Background Color', 'allure-news' ),
            'description' => esc_html__( 'Select the background color for the post carousel section.', 'allure-news' ),
            'section'     => 'allure_news_post_carousel_below_slider',
            'active_callback'=> 'allure_news_post_carousel_enable',
            'priority'       => 20,
        )
    )
);

/* Post carousel Text color */
$wp_customize->add_setting( 'allure_news_options[allure-news-post-carousel-text-color]',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
        'default'           => $default['allure-news-post-carousel-text-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-post-carousel-text-color]',
        array(
            'label'       => esc_html__( 'Text Color', 'allure-news' ),
            'description' => esc_html__( 'Text Color of this section.', 'allure-news' ),
            'section'     => 'allure_news_post_carousel_below_slider',
            'active_callback'=> 'allure_news_post_carousel_enable',
            'priority'       => 20,
        )
    )
);

/*
* Post Grid Section - Three Category Selection
*/
$wp_customize->add_section( 'allure_news_post_grid_three_category', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Post Grid Layout Section', 'allure-news' ),
    'panel'          => 'allure_news_front_page_panel',
) );

/*Post Grid Layout Enable*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-post-grid-layout]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-post-grid-layout'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-post-grid-layout]', array(
    'label'     => __( 'Enable Post Grid Layout Section', 'allure-news' ),
    'description' => __('You will get three category selection options for this part.', 'allure-news'),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-enable-post-grid-layout]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions post grid*/
if ( !function_exists('allure_news_post_grid_three_category') ) :
    function allure_news_post_grid_three_category(){
        global $allure_news_theme_options;
        $posts_grid = absint($allure_news_theme_options['allure-news-enable-post-grid-layout']);
        if( 1 == $posts_grid ){
            return true;
        }
        else{
            return false;
        }
    }
endif;


/*Grid Post section category one*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-select-category-one]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-grid-column-select-category-one'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new allure_news_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-grid-column-select-category-one]',
    array(
      'label'     => __( 'Select Category For First Column', 'allure-news' ),
      'description' => __('From the dropdown select the category for the first column.', 'allure-news'),
      'section'   => 'allure_news_post_grid_three_category',
      'settings'  => 'allure_news_options[allure-news-grid-column-select-category-one]',
      'type'      => 'category_dropdown',
      'priority'  => 15,
      'active_callback'=>'allure_news_post_grid_three_category'
    )
  )
);

/*Grid Post section category two*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-select-category-two]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-grid-column-select-category-two'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new allure_news_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-grid-column-select-category-two]',
    array(
      'label'     => __( 'Select Category For Second Column', 'allure-news' ),
      'description' => __('From the dropdown select the category for the second column.', 'allure-news'),
      'section'   => 'allure_news_post_grid_three_category',
      'settings'  => 'allure_news_options[allure-news-grid-column-select-category-two]',
      'type'      => 'category_dropdown',
      'priority'  => 15,
      'active_callback'=>'allure_news_post_grid_three_category'
    )
  )
);

/*Grid Post section category three*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-select-category-three]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-grid-column-select-category-three'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new allure_news_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-grid-column-select-category-three]',
    array(
      'label'     => __( 'Select Category For Third Column', 'allure-news' ),
      'description' => __('From the dropdown select the category for the third column.', 'allure-news'),
      'section'   => 'allure_news_post_grid_three_category',
      'settings'  => 'allure_news_options[allure-news-grid-column-select-category-three]',
      'type'      => 'category_dropdown',
      'priority'  => 15,
      'active_callback'=>'allure_news_post_grid_three_category'
    )
  )
);

/*grid column number*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-post-number]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-post-number'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-post-number]', array(
    'label'     => __( 'Enter the Number of Posts to Display', 'allure-news' ),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-post-number]',
    'type'      => 'number',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/*grid column show excerpt*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-excerpt]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-excerpt'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-excerpt]', array(
    'label'     => __( 'Enable Excerpt', 'allure-news' ),
    'description'     => __( 'A short paragraph appear there in the post. This option hide it.', 'allure-news' ),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-excerpt]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/*grid column excerpt length*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-excerpt-length]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-excerpt-length'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-excerpt-length]', array(
    'label'     => __( 'Excerpt Length', 'allure-news' ),
    'description'     => __( 'A short paragraph appear there in the post. Enter the number for required words.', 'allure-news' ),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-excerpt-length]',
    'type'      => 'number',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/*grid column date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-date]', array(
    'label'     => __( 'Enable Date', 'allure-news' ),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-date]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/*grid column category*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-category]', array(
    'label'     => __( 'Enable Category', 'allure-news' ),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-category]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/*grid column author*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-author]', array(
    'label'     => __( 'Enable Author', 'allure-news' ),
    'description' => __('Checked to enable author on you may missed this section above footer..', 'allure-news'),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-author]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/*grid column read time*/
$wp_customize->add_setting( 'allure_news_options[allure-news-grid-column-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-grid-column-read-time'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-grid-column-read-time]', array(
    'label'     => __( 'Enable Read Time', 'allure-news' ),
     'description' => __('Checked to enable read time on you may missed this section above footer..', 'allure-news'),
    'section'   => 'allure_news_post_grid_three_category',
    'settings'  => 'allure_news_options[allure-news-grid-column-read-time]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_post_grid_three_category',
) );

/* Post grid backgroud color */
$wp_customize->add_setting( 'allure_news_options[allure-news-post-grid-background]',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
        'default'           => $default['allure-news-post-grid-background'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-post-grid-background]',
        array(
            'label'       => esc_html__( 'Section Background Color', 'allure-news' ),
            'description' => esc_html__( 'Select the background color for grid section.', 'allure-news' ),
            'section'     => 'allure_news_post_grid_three_category',
            'active_callback'=> 'allure_news_post_grid_three_category',
            'priority'       => 20,
        )
    )
);

/* Post grid text color */
$wp_customize->add_setting( 'allure_news_options[allure-news-post-grid-text-color]',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
        'default'           => $default['allure-news-post-grid-text-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-post-grid-text-color]',
        array(
            'label'       => esc_html__( 'Text Color', 'allure-news' ),
            'description' => esc_html__( 'Text color for this section.', 'allure-news' ),
            'section'     => 'allure_news_post_grid_three_category',
            'active_callback'=> 'allure_news_post_grid_three_category',
            'priority'       => 20,
        )
    )
);

/*
* You may missed this section
*/
$wp_customize->add_section( 'allure_news_you_may_missed_before_footer', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'You May Have Missed This', 'allure-news' ),
    'panel'          => 'allure_news_front_page_panel',
) );

/*You may missed this*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed]', array(
    'label'     => __( 'Enable You May Missed', 'allure-news' ),
    'description' => __('Checked to enable you may missed this section above footer.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions you may missed*/
if ( !function_exists('allure_news_footer_you_may_missed_section') ) :
    function allure_news_footer_you_may_missed_section(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $related_posts = absint($allure_news_theme_options['allure-news-footer-you-may-missed']);
        if( 1 == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*You may have missed Title*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed-title]', array(
    'label'     => __( 'You May Have Missed Section Title', 'allure-news' ),
    'description' => __('Enter the title for you may have missed this section.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed-title]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=> 'allure_news_footer_you_may_missed_section',
) );

/*yoy may missed Category Selection*/
$wp_customize->add_setting( 'allure_news_options[allure-news-you-missed-select-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-you-missed-select-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new allure_news_Customize_Category_Dropdown_Control(
    $wp_customize,
    'allure_news_options[allure-news-you-missed-select-category]',
    array(
      'label'     => __( 'Select Category For You may missed', 'allure-news' ),
      'description' => __('From the dropdown select the category for you may missed section.', 'allure-news'),
      'section'   => 'allure_news_you_may_missed_before_footer',
      'settings'  => 'allure_news_options[allure-news-you-missed-select-category]',
      'type'      => 'category_dropdown',
      'priority'  => 15,
      'active_callback'=>'allure_news_footer_you_may_missed_section'
    )
  )
);

/*You may have missed column*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed-column]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed-column'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed-column]', array(
    'label'     => __( 'Select the Number of Column', 'allure-news' ),
    'description' => __('You can select number of column from 2-5.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed-column]',
    'type'      => 'select',
    'choices' => array(
        '2'    => __('Column 2','allure-news'),
        '3'    => __('Column 3','allure-news'),
        '4'    => __('Column 4','allure-news'),
        '5'    => __('Column 5','allure-news'),
    ),
    'priority'  => 15,
    'active_callback'=> 'allure_news_footer_you_may_missed_section',
) );

/*You may missed this date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed-date]', array(
    'label'     => __( 'Enable Date', 'allure-news' ),
    'description' => __('Checked to enable date on you may missed this section above footer.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed-date]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_footer_you_may_missed_section',
) );

/*You may missed this category*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed-category]', array(
    'label'     => __( 'Enable Category', 'allure-news' ),
    'description' => __('Checked to enable category on you may missed this section above footer.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed-category]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_footer_you_may_missed_section',
) );

/*You may missed this author*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed-author]', array(
    'label'     => __( 'Enable Author', 'allure-news' ),
    'description' => __('Checked to enable author on you may missed this section above footer.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed-author]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_footer_you_may_missed_section',
) );

/*You may missed this read time*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-you-may-missed-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-you-may-missed-read-time'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-you-may-missed-read-time]', array(
    'label'     => __( 'Enable Read Time', 'allure-news' ),
    'description' => __('Checked to enable read time on you may missed this section above footer.', 'allure-news'),
    'section'   => 'allure_news_you_may_missed_before_footer',
    'settings'  => 'allure_news_options[allure-news-footer-you-may-missed-read-time]',
    'type'      => 'checkbox',
    'priority'  => 15,
    'active_callback'=> 'allure_news_footer_you_may_missed_section',
) );

/* You may missed background color */
$wp_customize->add_setting( 'allure_news_options[allure-news-missed-this-background]',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
        'default'           => $default['allure-news-missed-this-background'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-missed-this-background]',
        array(
            'label'       => esc_html__( 'Section Background Color', 'allure-news' ),
            'description' => esc_html__( 'Select the background color for you may missed section.', 'allure-news' ),
            'section'     => 'allure_news_you_may_missed_before_footer',
            'active_callback'=> 'allure_news_footer_you_may_missed_section',
            'priority'       => 20,
        )
    )
);

/* You may missed text color */
$wp_customize->add_setting( 'allure_news_options[allure-news-missed-this-text-color]',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
        'default'           => $default['allure-news-missed-this-text-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-missed-this-text-color]',
        array(
            'label'       => esc_html__( 'Text Color', 'allure-news' ),
            'description' => esc_html__( 'Text Color for this section can be changed from here.', 'allure-news' ),
            'section'     => 'allure_news_you_may_missed_before_footer',
            'active_callback'=> 'allure_news_footer_you_may_missed_section',
            'priority'       => 20,
        )
    )
);

/*
* Sidebar Option for the Front Page
*/
$wp_customize->add_section( 'allure_news_front_page_sidebar_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Sidebar Layout Option', 'allure-news' ),
    'panel'          => 'allure_news_front_page_panel',
) );

/*Front Page Sidebar Layout*/
$wp_customize->add_setting( 'allure_news_options[allure-news-sidebar-front-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-sidebar-front-page'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-sidebar-front-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','allure-news'),
    'left-sidebar'    => __('Left Sidebar','allure-news'),
    'no-sidebar'      => __('No Sidebar','allure-news'),
    'middle-column'   => __('Middle Column','allure-news')
),
   'label'     => __( 'Front Page Sidebar', 'allure-news' ),
   'description' => __('This sidebar will work for Front Page', 'allure-news'),
   'section'   => 'allure_news_front_page_sidebar_section',
   'settings'  => 'allure_news_options[allure-news-sidebar-front-page]',
   'type'      => 'select',
   'priority'  => 10,
) );


/*
* Instagram Feed Shortcodes section
*/
$wp_customize->add_section( 'allure_news_instagram_feed_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Instagram Section In Footer', 'allure-news' ),
    'panel'          => 'allure_news_front_page_panel',
) );

/*Instagram Feed Shortcodes*/
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-instagram-feed]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-footer-instagram-feed'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-footer-instagram-feed]', array(
    'label'     => __( 'Enter Your Instagram Feed Shortcode', 'allure-news' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Install and Customize', 'allure-news' ),
        esc_url('https://wordpress.org/plugins/instagram-feed/'),
        __('Instagram Feed Plugin' , 'allure-news'),
        __('and paste shortcodes here.' ,'allure-news')
    ),
    'section'   => 'allure_news_instagram_feed_section',
    'settings'  => 'allure_news_options[allure-news-footer-instagram-feed]',
    'type'      => 'text',
    'priority'  => 15,
) );

/*
* miscellaneous setting home page
*/
$wp_customize->add_section( 'allure_news_miscellaneous_settings_home', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Miscellaneous Home Page Settings', 'allure-news' ),
    'panel'          => 'allure_news_front_page_panel',
) );

/*Home Page Content*/
$wp_customize->add_setting( 'allure_news_options[allure-news-front-page-content]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-front-page-content'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-front-page-content]', array(
    'label'     => __( 'Hide Front Page Content', 'allure-news' ),
    'description' => __( 'Checked to hide the front page content from front page.', 'allure-news' ),
    'section'   => 'allure_news_miscellaneous_settings_home',
    'settings'  => 'allure_news_options[allure-news-front-page-content]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
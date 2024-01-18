<?php 
/**
 *  Allure News Additional Settings Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'allure_news_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Extra Options', 'allure-news' ),
    'panel'          => 'allure_news_panel',
) );

/*Preloader Enable*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-preloader]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-preloader'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-preloader]', array(
    'label'     => __( 'Enable Preloader', 'allure-news' ),
    'description' => __( 'It will enable the preloader on the website.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-preloader]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Preloader Image*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-preloader-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['allure-news-extra-preloader-image'],
    'sanitize_callback' => 'allure_news_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'allure_news_options[allure-news-extra-preloader-image]',
        array(
            'label'   => __( 'Preloader Image', 'allure-news' ),
            'section'   => 'allure_news_extra_options',
            'settings'  => 'allure_news_options[allure-news-extra-preloader-image]',
            'type'      => 'image',
            'priority'  => 15,
            'description' => __( 'This is the preloader image, it will load before the site loads.', 'allure-news' )
        )
    )
);


/*Hide Default Images*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-hide-default-thumbnails]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-hide-default-thumbnails'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-hide-default-thumbnails]', array(
    'label'     => __( 'Hide Default Thumbnail From Widgets', 'allure-news' ),
    'description' => __( 'You can hide the thumbnail from here or replace by adding featured image on each posts. Edit the post and check the thumbnail is missing.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-hide-default-thumbnails]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Hide Post Format Icons*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-post-formats-icons]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-post-formats-icons'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-post-formats-icons]', array(
    'label'     => __( 'Hide Post Formats Icons', 'allure-news' ),
    'description' => __( 'Icons like camera, photo, video, audio will hide.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-post-formats-icons]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );


/*Hide Read More Time*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-hide-read-time]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-hide-read-time'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-hide-read-time]', array(
    'label'     => __( 'Hide Reading Time', 'allure-news' ),
    'description' => __( 'You can hide the reading time in whole site.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-hide-read-time]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/* Read More Number Words*/
$wp_customize->add_setting( 'allure_news_options[allure-news-extra-hide-read-time-words]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-extra-hide-read-time-words'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-extra-hide-read-time-words]', array(
    'label'     => __( 'Reading Time Words per Minute', 'allure-news' ),
    'description' => __( 'Enter the number of Words users can read per minute.', 'allure-news' ),
    'section'   => 'allure_news_extra_options',
    'settings'  => 'allure_news_options[allure-news-extra-hide-read-time-words]',
    'type'      => 'number',
    'priority'  => 15,
) );

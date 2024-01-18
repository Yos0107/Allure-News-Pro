<?php
/**
 *  Allure News Header Types Option
 *
 * @since Allure News 1.0.0
 *
 */
/* Header Types Options*/
$wp_customize->add_section( 'allure_news_header_types_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Types Options', 'allure-news' ),
    'panel' 		 => 'allure_news_panel',
) );
/*Blog Page column number*/
$wp_customize->add_setting( 'allure_news_options[allure-news-header-types]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-header-types'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-header-types]', array(
    'choices' => array(
        'default-header'    => __('Left Logo and Right Ads','allure-news'),
        'header-one'       => __('Menu Above Logo','allure-news'),
        'header-two'       => __('Left Logo and Right Menu','allure-news')
    ),
    'label'     => __( 'Select Preferred Header Layout', 'allure-news' ),
    'description' => __('You can change the blog page and archive page layouts', 'allure-news'),
    'section'   => 'allure_news_header_types_section',
    'settings'  => 'allure_news_options[allure-news-header-types]',
    'type'      => 'select',
    'priority'  => 20,
) );
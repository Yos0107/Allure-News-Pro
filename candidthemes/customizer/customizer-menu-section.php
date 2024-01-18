<?php
/**
 *  Allure News Menu Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Menu Options*/
$wp_customize->add_section( 'allure_news_primary_menu_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Menu Section Options', 'allure-news' ),
   'panel'     => 'allure_news_panel',
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-sticky-primary-menu]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-sticky-primary-menu'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-sticky-primary-menu]', array(
   'label'     => __( 'Enable Primary Menu Sticky', 'allure-news' ),
   'description' => __('The main primary menu will be sticky.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-enable-sticky-primary-menu]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-menu-section-search]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-menu-section-search'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-menu-section-search]', array(
   'label'     => __( 'Enable Search Icons', 'allure-news' ),
   'description' => __('You can show the search field in header.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-enable-menu-section-search]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Home Icons In Menu*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-menu-home-icon]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-menu-home-icon'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-menu-home-icon]', array(
   'label'     => __( 'Enable Home Icons', 'allure-news' ),
   'description' => __('Home Icon will displayed in menu.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-enable-menu-home-icon]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Disable menu description*/
$wp_customize->add_setting( 'allure_news_options[allure-news-disable-menu-description]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-disable-menu-description'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-disable-menu-description]', array(
   'label'     => __( 'Disable Menu Item Description', 'allure-news' ),
   'description' => __('If you have menu description and want to hide, you can use this option. Menu description can be add from Appearance > Menus and select the menu item and add the description. You need to enable Description field from Screen options in menu page at the top.', 'allure-news'),
   'section'   => 'allure_news_primary_menu_section',
   'settings'  => 'allure_news_options[allure-news-disable-menu-description]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Change Menu Position*/
$wp_customize->add_setting( 'allure_news_options[allure-news-change-primary-menu-position]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-change-primary-menu-position'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-change-primary-menu-position]', array(
    'label'     => __( 'Menu Alignment of Primary Menu', 'allure-news' ),
    'description' => __('Change the position of Primary Menu.', 'allure-news'),
    'section'   => 'allure_news_primary_menu_section',
    'settings'  => 'allure_news_options[allure-news-change-primary-menu-position]',
    'choices' => array(
        'default-menu-position'    => __('Center Align','allure-news'),
        'left-menu-position'       => __('Left Align','allure-news'),
    ),
    'type'      => 'select',
    'priority'  => 5,
) );
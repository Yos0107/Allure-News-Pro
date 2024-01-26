<?php
/**
 *  Allure News Typography Option
 *
 * @since Allure News 1.0.0
 *
 */
$wp_customize->add_panel( 'allure_news_typography', array(
    'priority' => 30,
    'capability' => 'edit_theme_options',
    'title' => __( 'Fonts Options', 'allure-news' ),
) );

/*
* Site Title Fonts Options
* Site Title Font Option Section
* Allure News 1.0.0
*/
/*Heading H6 Fonts*/
$wp_customize->add_section( 'allure_news_site_title_font_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Site Title Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-site-title-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-site-title-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-site-title-family-url]', array(
    'label'     => __( 'URL of Site Title Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'   => $choices,
    'section'   => 'allure_news_site_title_font_options',
    'settings'  => 'allure_news_options[allure-news-font-site-title-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Heading Font Size*/
$wp_customize->add_setting('allure_news_options[allure-news-site-title-font-size]', array(
    'default'     => $default['allure-news-site-title-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-site-title-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-site-title-font-size]', array(
    'label' => __('H6 Font Size', 'allure-news'),
    'section' => 'allure_news_site_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '24',
        'max' => '54',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-site-title-font-line-height]', array(
    'default'     => $default['allure-news-site-title-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-site-title-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-site-title-font-line-height]', array(
    'label' => __('H6 Line Height', 'allure-news'),
    'section' => 'allure_news_site_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-site-title-letter-spacing]', array(
    'default' => $default['allure-news-site-title-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-site-title-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-site-title-letter-spacing]', array(
    'label'   => __('H6 Letter Space', 'allure-news'),
    'section' => 'allure_news_site_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-2',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));

/*
* Font and Typography Options
* Paragraph Option Section
* Allure News 1.0.0
*/
$wp_customize->add_section( 'allure_news_font_options', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Paragraph Font', 'allure-news' ),
   'panel' 		 => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-family-url]', array(
    'label'     => __( 'Body Paragraph Font Family', 'allure-news' ),
    'description' =>__( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_font_options',
    'settings'  => 'allure_news_options[allure-news-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );
/*Paragraph font Size*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-paragraph-font-size]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-paragraph-font-size'],
    'sanitize_callback' => 'allure_news_sanitize_number_range'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-font-paragraph-font-size]', array(
    'label'     => __( 'Paragraph Font Size', 'allure-news' ),
    'description' => __('Size apply only for paragraphs, not headings. Font size between 12px to 20px.', 'allure-news'),
    'section'   => 'allure_news_font_options',
    'settings'  => 'allure_news_options[allure-news-font-paragraph-font-size]',
    'type'      => 'number',
    'priority'  => 15,
    'input_attrs' => array(
     'min' => 12,
     'max' => 20,
     'step' => 1,
 ),
) );
/*Paragraph Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-font-line-height]', array(
    'default'     => $default['allure-news-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-font-line-height]', array(
    'label' => __('Line Height', 'allure-news'),
    'section' => 'allure_news_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 15,
));
/*Paragraph letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-letter-spacing]', array(
    'default' => $default['allure-news-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-letter-spacing]', array(
    'label'   => __('Letter Space', 'allure-news'),
    'section' => 'allure_news_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 15,
));

/*
* Menu Font Options
* Menu Font Option Section
* Allure News 1.0.0
*/

/*Menu Font Options*/
$wp_customize->add_section( 'allure_news_menu_font_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Menu Font', 'allure-news' ),
    'panel' 		 => 'allure_news_typography',
) );
/* Menu Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-menu-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-menu-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-menu-font-family-url]', array(
    'label'     => __( 'URL of Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_menu_font_options',
    'settings'  => 'allure_news_options[allure-news-menu-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );
/* Menu Paragraph font Size*/
$wp_customize->add_setting( 'allure_news_options[allure-news-menu-font-size]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-menu-font-size'],
    'sanitize_callback' => 'allure_news_sanitize_number_range'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-menu-font-size]', array(
    'label'     => __( 'Paragraph Font Size', 'allure-news' ),
    'description' => __('Size apply only for paragraphs, not headings. Font size between 12px to 20px.', 'allure-news'),
    'section'   => 'allure_news_menu_font_options',
    'settings'  => 'allure_news_options[allure-news-menu-font-size]',
    'type'      => 'number',
    'priority'  => 15,
    'input_attrs' => array(
        'min' => 12,
        'max' => 20,
        'step' => 1,
    ),
) );
/*Menu Paragraph Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-menu-font-line-height]', array(
    'default'     => $default['allure-news-menu-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-menu-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-menu-font-line-height]', array(
    'label' => __('Line Height', 'allure-news'),
    'section' => 'allure_news_menu_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 15,
));
/*Menu Paragraph letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-menu-letter-spacing]', array(
    'default' => $default['allure-news-menu-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-menu-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-menu-letter-spacing]', array(
    'label'   => __('Letter Space', 'allure-news'),
    'section' => 'allure_news_menu_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 15,
));


/*
* Blog List Post Title Fonts Options
* Blog List Post Title Font Option Section
* Allure News 1.0.0
*/

/*Blog Title Fonts*/
$wp_customize->add_section( 'allure_news_blog_title_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Blog Post Title Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-blog-title-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-blog-title-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-blog-title-family-url]', array(
    'label'     => __( 'URL of Blog Post Title Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_blog_title_font_options',
    'settings'  => 'allure_news_options[allure-news-font-blog-title-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Blog Title Font Size height*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-title-font-size]', array(
    'default'     => $default['allure-news-blog-title-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-blog-title-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-blog-title-font-size]', array(
    'label' => __('Blog List Title Font Size', 'allure-news'),
    'section' => 'allure_news_blog_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '20',
        'max' => '50',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Blog Title Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-title-font-line-height]', array(
    'default'     => $default['allure-news-blog-title-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-blog-title-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-blog-title-font-line-height]', array(
    'label' => __('Blog Title Line Height', 'allure-news'),
    'section' => 'allure_news_blog_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Blog Title letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-title-letter-spacing]', array(
    'default' => $default['allure-news-blog-title-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-blog-title-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-blog-title-letter-spacing]', array(
    'label'   => __('Blog Title Letter Space', 'allure-news'),
    'section' => 'allure_news_blog_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));


/*
* Blog Single Post Title Fonts Options
* Blog Single Post Title Font Option Section
* Allure News 1.0.0
*/

/*Blog Title Fonts*/
$wp_customize->add_section( 'allure_news_blog_single_title_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Blog Single Title Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-blog-single-title-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-blog-single-title-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-blog-single-title-family-url]', array(
    'label'     => __( 'URL of Blog Single Title Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_blog_single_title_font_options',
    'settings'  => 'allure_news_options[allure-news-font-blog-single-title-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Blog Title Font Size height*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-single-title-font-size]', array(
    'default'     => $default['allure-news-blog-single-title-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-blog-single-title-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-blog-single-title-font-size]', array(
    'label' => __('Blog Single Title Font Size', 'allure-news'),
    'section' => 'allure_news_blog_single_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '20',
        'max' => '50',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Blog Title Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-single-title-font-line-height]', array(
    'default'     => $default['allure-news-blog-single-title-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-blog-single-title-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-blog-single-title-font-line-height]', array(
    'label' => __('Blog Single Title Line Height', 'allure-news'),
    'section' => 'allure_news_blog_single_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Blog Title letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-single-title-letter-spacing]', array(
    'default' => $default['allure-news-blog-single-title-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-blog-single-title-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-blog-single-title-letter-spacing]', array(
    'label'   => __('Blog Single Title Letter Space', 'allure-news'),
    'section' => 'allure_news_blog_single_title_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));

/*
* Widget Title Font Options
* Widget Title Font Option Section
* Allure News 1.0.0
*/
/*Widget Title Font Options*/
$wp_customize->add_section( 'allure_news_widget_font_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Widget Title Font', 'allure-news' ),
    'panel'          => 'allure_news_typography',
) );
/* Widget title Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-widget-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-widget-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-widget-font-family-url]', array(
    'label'     => __( 'URL of Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_widget_font_options',
    'settings'  => 'allure_news_options[allure-news-widget-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );
/* Widget title Paragraph font Size*/
$wp_customize->add_setting( 'allure_news_options[allure-news-widget-font-size]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-widget-font-size'],
    'sanitize_callback' => 'allure_news_sanitize_number_range'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-widget-font-size]', array(
    'label'     => __( 'Paragraph Font Size', 'allure-news' ),
    'description' => __('Size apply only for paragraphs, not headings. Font size between 12px to 20px.', 'allure-news'),
    'section'   => 'allure_news_widget_font_options',
    'settings'  => 'allure_news_options[allure-news-widget-font-size]',
    'type'      => 'number',
    'priority'  => 15,
    'input_attrs' => array(
        'min' => 12,
        'max' => 20,
        'step' => 1,
    ),
) );
/*Widget title Paragraph Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-widget-font-line-height]', array(
    'default'     => $default['allure-news-widget-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-widget-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-widget-font-line-height]', array(
    'label' => __('Line Height', 'allure-news'),
    'section' => 'allure_news_widget_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 15,
));
/*Widget title Paragraph letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-widget-letter-spacing]', array(
    'default' => $default['allure-news-widget-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-widget-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-widget-letter-spacing]', array(
    'label'   => __('Letter Space', 'allure-news'),
    'section' => 'allure_news_widget_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 15,
));

/*
* Heading H1 Fonts Options
* Heading H1 Font Option Section
* Allure News 1.0.0
*/

/*Heading H1 Fonts*/
$wp_customize->add_section( 'allure_news_h1_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading H1 Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-heading-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-heading-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-heading-family-url]', array(
    'label'     => __( 'URL of H1 Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_h1_font_options',
    'settings'  => 'allure_news_options[allure-news-font-heading-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Heading Font Size height*/
$wp_customize->add_setting('allure_news_options[allure-news-h1-font-size]', array(
    'default'     => $default['allure-news-h1-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-h1-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-h1-font-size]', array(
    'label' => __('H1 Font Size', 'allure-news'),
    'section' => 'allure_news_h1_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '20',
        'max' => '50',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-h1-font-line-height]', array(
    'default'     => $default['allure-news-h1-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-h1-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-h1-font-line-height]', array(
    'label' => __('H1 Line Height', 'allure-news'),
    'section' => 'allure_news_h1_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-h1-letter-spacing]', array(
    'default' => $default['allure-news-h1-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-h1-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-h1-letter-spacing]', array(
    'label'   => __('H1 Letter Space', 'allure-news'),
    'section' => 'allure_news_h1_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));

/*
* Heading H2 Fonts Options
* Heading H2 Font Option Section
* Allure News 1.0.0
*/

/*Heading H2 Fonts*/
$wp_customize->add_section( 'allure_news_h2_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading H2 Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-h2-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-h2-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-h2-family-url]', array(
    'label'     => __( 'URL of H2 Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_h2_font_options',
    'settings'  => 'allure_news_options[allure-news-font-h2-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );

/*Heading Font Size */
$wp_customize->add_setting('allure_news_options[allure-news-h2-font-size]', array(
    'default'     => $default['allure-news-h2-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-h2-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-h2-font-size]', array(
    'label' => __('H2 Font Size', 'allure-news'),
    'section' => 'allure_news_h2_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '20',
        'max' => '45',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-h2-font-line-height]', array(
    'default'     => $default['allure-news-h2-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-h2-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-h2-font-line-height]', array(
    'label' => __('H2 Line Height', 'allure-news'),
    'section' => 'allure_news_h2_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-h2-letter-spacing]', array(
    'default' => $default['allure-news-h2-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-h2-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-h2-letter-spacing]', array(
    'label'   => __('H2 Letter Space', 'allure-news'),
    'section' => 'allure_news_h2_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));


/*
* Heading H3 Fonts Options
* Heading H3 Font Option Section
* Allure News 1.0.0
*/
/*Heading H3 Fonts*/
$wp_customize->add_section( 'allure_news_h3_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading H3 Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-h3-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-h3-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-h3-family-url]', array(
    'label'     => __( 'URL of H3 Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_h3_font_options',
    'settings'  => 'allure_news_options[allure-news-font-h3-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Heading Font Size*/
$wp_customize->add_setting('allure_news_options[allure-news-h3-font-size]', array(
    'default'     => $default['allure-news-h3-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-h3-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-h3-font-size]', array(
    'label' => __('H3 Font Size', 'allure-news'),
    'section' => 'allure_news_h3_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '16',
        'max' => '40',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-h3-font-line-height]', array(
    'default'     => $default['allure-news-h3-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-h3-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-h3-font-line-height]', array(
    'label' => __('H3 Line Height', 'allure-news'),
    'section' => 'allure_news_h3_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-h3-letter-spacing]', array(
    'default' => $default['allure-news-h3-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-h3-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-h3-letter-spacing]', array(
    'label'   => __('H3 Letter Space', 'allure-news'),
    'section' => 'allure_news_h3_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));


/*
* Heading H4 Fonts Options
* Heading H4 Font Option Section
* Allure News 1.0.0
*/
/*Heading H4 Fonts*/
$wp_customize->add_section( 'allure_news_h4_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading H4 Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-h4-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-h4-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-h4-family-url]', array(
    'label'     => __( 'URL of H4 Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_h4_font_options',
    'settings'  => 'allure_news_options[allure-news-font-h4-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Heading Font Size */
$wp_customize->add_setting('allure_news_options[allure-news-h4-font-size]', array(
    'default'     => $default['allure-news-h4-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-h4-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-h4-font-size]', array(
    'label' => __('H4 Font Size', 'allure-news'),
    'section' => 'allure_news_h4_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '16',
        'max' => '35',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-h4-font-line-height]', array(
    'default'     => $default['allure-news-h4-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-h4-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-h4-font-line-height]', array(
    'label' => __('H4 Line Height', 'allure-news'),
    'section' => 'allure_news_h4_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-h4-letter-spacing]', array(
    'default' => $default['allure-news-h4-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-h4-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-h4-letter-spacing]', array(
    'label'   => __('H4 Letter Space', 'allure-news'),
    'section' => 'allure_news_h4_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));

/*
* Heading H5 Fonts Options
* Heading H5 Font Option Section
* Allure News 1.0.0
*/
/*Heading H5 Fonts*/
$wp_customize->add_section( 'allure_news_h5_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading H5 Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-h5-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-h5-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-h5-family-url]', array(
    'label'     => __( 'URL of H5 Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_h5_font_options',
    'settings'  => 'allure_news_options[allure-news-font-h5-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Heading Font Size */
$wp_customize->add_setting('allure_news_options[allure-news-h5-font-size]', array(
    'default'     => $default['allure-news-h5-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-h5-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-h5-font-size]', array(
    'label' => __('H5 Font Size', 'allure-news'),
    'section' => 'allure_news_h5_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '14',
        'max' => '30',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-h5-font-line-height]', array(
    'default'     => $default['allure-news-h5-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-h5-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-h5-font-line-height]', array(
    'label' => __('H5 Line Height', 'allure-news'),
    'section' => 'allure_news_h5_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-h5-letter-spacing]', array(
    'default' => $default['allure-news-h5-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-h5-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-h5-letter-spacing]', array(
    'label'   => __('H5 Letter Space', 'allure-news'),
    'section' => 'allure_news_h5_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));

/*
* Heading H6 Fonts Options
* Heading H6 Font Option Section
* Allure News 1.0.0
*/
/*Heading H6 Fonts*/
$wp_customize->add_section( 'allure_news_h6_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading H6 Font', 'allure-news' ),
    'panel'         => 'allure_news_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'allure_news_options[allure-news-font-h6-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-font-h6-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = allure_news_google_fonts();
$wp_customize->add_control( 'allure_news_options[allure-news-font-h6-family-url]', array(
    'label'     => __( 'URL of H6 Font Family', 'allure-news' ),
    'description' => __( 'Select the required font from the dropdown.', 'allure-news' ),
    'choices'  	=> $choices,
    'section'   => 'allure_news_h6_font_options',
    'settings'  => 'allure_news_options[allure-news-font-h6-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );
/*Heading Font Size*/
$wp_customize->add_setting('allure_news_options[allure-news-h6-font-size]', array(
    'default'     => $default['allure-news-h6-font-size'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range',
    'settings'=>'allure_news_options[allure-news-h6-font-size]'
));

$wp_customize->add_control('allure_news_options[allure-news-h6-font-size]', array(
    'label' => __('H6 Font Size', 'allure-news'),
    'section' => 'allure_news_h6_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Font Size.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '10',
        'max' => '24',
        'step' => '1',
    ),
    'priority'  => 10,
));
/*Heading Line height*/
$wp_customize->add_setting('allure_news_options[allure-news-h6-font-line-height]', array(
    'default'     => $default['allure-news-h6-font-line-height'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number_range_decimal',
    'settings'=>'allure_news_options[allure-news-h6-font-line-height]'
));

$wp_customize->add_control('allure_news_options[allure-news-h6-font-line-height]', array(
    'label' => __('H6 Line Height', 'allure-news'),
    'section' => 'allure_news_h6_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Line Height.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '0',
        'max' => '4',
        'step' => '0.1',
    ),
    'priority'  => 10,
));
/*Heading letter spacing*/
$wp_customize->add_setting('allure_news_options[allure-news-h6-letter-spacing]', array(
    'default' => $default['allure-news-h6-letter-spacing'],
    'transport'   => 'refresh',
    'sanitize_callback' => 'allure_news_sanitize_number',
    'settings'=>'allure_news_options[allure-news-h6-letter-spacing]',
));

$wp_customize->add_control('allure_news_options[allure-news-h6-letter-spacing]', array(
    'label'   => __('H6 Letter Space', 'allure-news'),
    'section' => 'allure_news_h6_font_options',
    'type'    => 'number',
    'description' => __( 'Increase/Decrease Letter Space.', 'allure-news' ),
    'input_attrs' => array(
        'min' => '-20',
        'max' => '4',
        'step' => '1',
    ),
    'priority'  => 10,
));
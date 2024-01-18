<?php
/**
 *  Allure News Color Option
 *
 * @since Allure News 1.0.0
 *
 */

$wp_customize->add_panel(
    'colors',
    [
        'title'    => __( 'Color Options', 'allure-news' ),
        'priority' => 30, // Before Additional CSS.
    ]
);
$wp_customize->add_section(
    'colors',
    array(
        'title' => __( 'General Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Site Title hover color */
$wp_customize->add_setting( 'allure_news_options[allure-news-site-title-hover]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-site-title-hover]',
        array(
            'label'       => esc_html__( 'Site Title Hover Color', 'allure-news' ),
            'description' => esc_html__( 'It will change the color of site title in hover.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/* Site tagline color */
$wp_customize->add_setting( 'allure_news_options[allure-news-site-tagline]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-site-tagline]',
        array(
            'label'       => esc_html__( 'Site Tagline Color', 'allure-news' ),
            'description' => esc_html__( 'It will change the color of site tagline color.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-primary-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-primary-color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'allure-news' ),
            'description' => esc_html__( 'Applied to main color of site.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);
/* Boxed Layout background Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-boxed-back-ground-color]',
    array(
        'default'           => $default['allure-news-boxed-back-ground-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-boxed-back-ground-color]',
        array(
            'label'       => esc_html__( 'Boxed Layout Background Color', 'allure-news' ),
            'description' => esc_html__( 'When you select the boxed layout, you can use this color as background.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/* Sidebars background Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-sidebar-background-color]',
    array(
        'default'           => $default['allure-news-sidebar-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-sidebar-background-color]',
        array(
            'label'       => esc_html__( 'Sidebar Background Color', 'allure-news' ),
            'description' => esc_html__( 'Select the preferred color for the background.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/* Body text Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-body-text-color]',
    array(
        'default'           => $default['allure-news-body-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-body-text-color]',
        array(
            'label'       => esc_html__( 'Body Text Color', 'allure-news' ),
            'description' => esc_html__( 'Select the preferred color for the body text.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);
/* Body link Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-body-link-color]',
    array(
        'default'           => $default['allure-news-body-link-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-body-link-color]',
        array(
            'label'       => esc_html__( 'Body Link Color', 'allure-news' ),
            'description' => esc_html__( 'Select the preferred color for the body text link.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);
/* Link Hover Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-body-link-hover-color]',
    array(
        'default'           => $default['allure-news-body-link-hover-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-body-link-hover-color]',
        array(
            'label'       => esc_html__( 'Body Link Hover Color', 'allure-news' ),
            'description' => esc_html__( 'Select the color of the link hover.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/* Link visted Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-body-link-visited-color]',
    array(
        'default'           => $default['allure-news-body-link-visited-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-body-link-visited-color]',
        array(
            'label'       => esc_html__( 'Body Link Visited Color', 'allure-news' ),
            'description' => esc_html__( 'Select the color of the visited link.', 'allure-news' ),
            'section'     => 'colors',
        )
    )
);

/*callback functions for underline color. Underline need to be enabled first to get this option in customizer*/
if ( !function_exists('allure_news_enable_underline_link') ) :
    function allure_news_enable_underline_link(){
        global $allure_news_theme_options;
        $underline_link = absint($allure_news_theme_options['allure-news-enable-underline-link']);
        if( 1 == $underline_link ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/* Link underline Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-body-link-underline-color]',
    array(
        'default'           => $default['allure-news-body-link-underline-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-body-link-underline-color]',
        array(
            'label'       => esc_html__( 'Body Link Underline Color', 'allure-news' ),
            'description' => esc_html__( 'Select the color for the underline of the text which has link. You can easily enable this from Single Post Options sections.', 'allure-news' ),
            'section'     => 'colors',
            'active_callback'=>'allure_news_enable_underline_link',
        )
    )
);

/*
 * Add section of colors settings,
 */
$wp_customize->add_section(
    'top-header',
    array(
        'title' => __( 'Top Header Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Top Header Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-top-header-background-color]',
    array(
        'default'           => $default['allure-news-top-header-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-top-header-background-color]',
        array(
            'label'       => esc_html__( 'Background Color', 'allure-news' ),
            'description' => esc_html__( 'Top Header background color for whole section.', 'allure-news' ),
            'section'     => 'top-header',
        )
    )
);
/* Top Header Trending News Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-top-header-trending-background-color]',
    array(
        'default'           => $default['allure-news-top-header-trending-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-top-header-trending-background-color]',
        array(
            'label'       => esc_html__( 'Trending Background Color', 'allure-news' ),
            'description' => esc_html__( 'Top trending background color.', 'allure-news' ),
            'section'     => 'top-header',
        )
    )
);

/* Top Header Trending News Text Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-top-header-trending-text-color]',
    array(
        'default'           => $default['allure-news-top-header-trending-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-top-header-trending-text-color]',
        array(
            'label'       => esc_html__( 'Trending News Text Color', 'allure-news' ),
            'description' => esc_html__( 'Top trending text color.', 'allure-news' ),
            'section'     => 'top-header',
        )
    )
);

/* Top Header Text Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-top-header-text-color]',
    array(
        'default'           => $default['allure-news-top-header-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-top-header-text-color]',
        array(
            'label'       => esc_html__( 'Text Color', 'allure-news' ),
            'description' => esc_html__( 'Top header text color.', 'allure-news' ),
            'section'     => 'top-header',
        )
    )
);
/* Top Header Menu Text Color Hover */
$wp_customize->add_setting( 'allure_news_options[allure-news-top-header-text-hover]',
    array(
        'default'           => $default['allure-news-top-header-text-hover'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-top-header-text-hover]',
        array(
            'label'       => esc_html__( 'Text Color Hover', 'allure-news' ),
            'description' => esc_html__( 'Top header text color on hover.', 'allure-news' ),
            'section'     => 'top-header',
        )
    )
);

/* Logo Section Colors */

$wp_customize->add_section(
    'logo_colors',
    array(
        'title' => __( 'Logo Section Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Colors background the logo */
$wp_customize->add_setting( 'allure_news_options[allure-news-logo-section-background]',
    array(
        'default'           => $default['allure-news-logo-section-background'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-logo-section-background]',
        array(
            'label'       => esc_html__( 'Background Color', 'allure-news' ),
            'description' => esc_html__( 'Will change the color of background logo.', 'allure-news' ),
            'section'     => 'logo_colors',
        )
    )
);

/*
 * Add section of colors settings, primary menu part
 */
$wp_customize->add_section(
    'menu-colors',
    array(
        'title' => __( 'Menu Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Menu Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-menu-background-color]',
    array(
        'default'           => $default['allure-news-menu-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-menu-background-color]',
        array(
            'label'       => esc_html__( 'Menu Background Color', 'allure-news' ),
            'description' => esc_html__( 'Menu background color for whole section.', 'allure-news' ),
            'section'     => 'menu-colors',
        )
    )
);

/* Sub Menu Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-sub-menu-background-color]',
    array(
        'default'           => $default['allure-news-sub-menu-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-sub-menu-background-color]',
        array(
            'label'       => esc_html__( 'Sub Menu Background Color', 'allure-news' ),
            'description' => esc_html__( 'Sub Menu background color Option.', 'allure-news' ),
            'section'     => 'menu-colors',
        )
    )
);
/* Menu Text Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-menu-text-color]',
    array(
        'default'           => $default['allure-news-menu-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-menu-text-color]',
        array(
            'label'       => esc_html__( 'Menu Text Color', 'allure-news' ),
            'description' => esc_html__( 'Select the color for the menu text.', 'allure-news' ),
            'section'     => 'menu-colors',
        )
    )
);
/* Menu Hover Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-menu-hover-color]',
    array(
        'default'           => $default['allure-news-menu-hover-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-menu-hover-color]',
        array(
            'label'       => esc_html__( 'Menu Text Hover Color', 'allure-news' ),
            'description' => esc_html__( 'Select the hover color for the menu text.', 'allure-news' ),
            'section'     => 'menu-colors',
        )
    )
);

/* Active Menu Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-menu-active-color]',
    array(
        'default'           => $default['allure-news-menu-active-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-menu-active-color]',
        array(
            'label'       => esc_html__( 'Menu Text Active Color', 'allure-news' ),
            'description' => esc_html__( 'Select the active color for the menu text.', 'allure-news' ),
            'section'     => 'menu-colors',
        )
    )
);

/*
 * Add section of colors settings, featured section part
 */
$wp_customize->add_section(
    'featured-colors',
    array(
        'title' => __( 'Featured Section Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Featured Text Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-featured-text-color]',
    array(
        'default'           => $default['allure-news-featured-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-featured-text-color]',
        array(
            'label'       => esc_html__( 'Text Color', 'allure-news' ),
            'description' => esc_html__( 'Text color for title of featured posts section.', 'allure-news' ),
            'section'     => 'featured-colors',
        )
    )
);

/* Featured Text Hover Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-featured-text-hover-color]',
    array(
        'default'           => $default['allure-news-featured-text-hover-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-featured-text-hover-color]',
        array(
            'label'       => esc_html__( 'Hover Color', 'allure-news' ),
            'description' => esc_html__( 'Hover color for title of featured posts section.', 'allure-news' ),
            'section'     => 'featured-colors',
        )
    )
);

/*
 * Add section of colors settings, footer section part
 */
$wp_customize->add_section(
    'footer-colors',
    array(
        'title' => __( 'Footer Section Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Footer Widget Area Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-background-color]',
    array(
        'default'           => $default['allure-news-footer-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-background-color]',
        array(
            'label'       => esc_html__( 'Footer Background Color', 'allure-news' ),
            'description' => esc_html__( 'Color Option for footer widget area.', 'allure-news' ),
            'section'     => 'footer-colors',
        )
    )
);
/* Footer Widget Area Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-text-color]',
    array(
        'default'           => $default['allure-news-footer-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-text-color]',
        array(
            'label'       => esc_html__( 'Footer Text Color', 'allure-news' ),
            'description' => esc_html__( 'Color Option for footer text widgets.', 'allure-news' ),
            'section'     => 'footer-colors',
        )
    )
);

/* Footer Widget Area Link Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-link-color]',
    array(
        'default'           => $default['allure-news-footer-link-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-link-color]',
        array(
            'label'       => esc_html__( 'Footer Link Color', 'allure-news' ),
            'description' => esc_html__( 'Color Option for footer Link widgets.', 'allure-news' ),
            'section'     => 'footer-colors',
        )
    )
);


/* Footer Widget Area Link hover Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-link-hover-color]',
    array(
        'default'           => $default['allure-news-footer-link-hover-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-link-hover-color]',
        array(
            'label'       => esc_html__( 'Footer Link Hover Color', 'allure-news' ),
            'description' => esc_html__( 'Color Option for footer Link hover widgets.', 'allure-news' ),
            'section'     => 'footer-colors',
        )
    )
);

/*
 * Add section of colors settings, copyright footer section part
 */
$wp_customize->add_section(
    'cr-footer-colors',
    array(
        'title' => __( 'Copyright Section Colors', 'allure-news' ),
        'panel' => 'colors',
    )
);

/* Copyright Area Background Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-cr-background-color]',
    array(
        'default'           => $default['allure-news-footer-cr-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-cr-background-color]',
        array(
            'label'       => esc_html__( 'Copyright Section Background Color', 'allure-news' ),
            'description' => esc_html__( 'Color Option copyright and powered by text area.', 'allure-news' ),
            'section'     => 'cr-footer-colors',
        )
    )
);
/* Copyright Area Text Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-cr-text-color]',
    array(
        'default'           => $default['allure-news-footer-cr-text-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-cr-text-color]',
        array(
            'label'       => esc_html__( 'Copyright Section Text Color', 'allure-news' ),
            'description' => esc_html__( 'Color Option copyright and powered by text area.', 'allure-news' ),
            'section'     => 'cr-footer-colors',
        )
    )
);

/* Copyright Area Link Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-cr-link-color]',
    array(
        'default'           => $default['allure-news-footer-cr-link-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-cr-link-color]',
        array(
            'label'       => esc_html__( 'Copyright Section Link Color', 'allure-news' ),
            'description' => esc_html__( 'Link Color Option copyright and powered by text area.', 'allure-news' ),
            'section'     => 'cr-footer-colors',
        )
    )
);
/* Copyright Area Link Hover Color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-cr-link-hover-color]',
    array(
        'default'           => $default['allure-news-footer-cr-link-hover-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-cr-link-hover-color]',
        array(
            'label'       => esc_html__( 'Copyright Section Link Hover Color', 'allure-news' ),
            'description' => esc_html__( 'Link Hover Color Option copyright and powered by text area.', 'allure-news' ),
            'section'     => 'cr-footer-colors',
        )
    )
);

/* Go to top background color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-cr-to-top-background-color]',
    array(
        'default'           => $default['allure-news-footer-cr-to-top-background-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-cr-to-top-background-color]',
        array(
            'label'       => esc_html__( 'Go to the top Background Color', 'allure-news' ),
            'description' => esc_html__( 'Select the background color for the go to top.', 'allure-news' ),
            'section'     => 'cr-footer-colors',
        )
    )
);

/* Go to top arrow color */
$wp_customize->add_setting( 'allure_news_options[allure-news-footer-cr-to-top-arrow-color]',
    array(
        'default'           => $default['allure-news-footer-cr-to-top-arrow-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-footer-cr-to-top-arrow-color]',
        array(
            'label'       => esc_html__( 'Go to the top Arrow Color', 'allure-news' ),
            'description' => esc_html__( 'Select the arrow color for the go to top.', 'allure-news' ),
            'section'     => 'cr-footer-colors',
        )
    )
);

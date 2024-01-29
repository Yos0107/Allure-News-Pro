<?php
/**
 *  Allure News Header Option
 *
 * @since Allure News 1.0.0
 *
 */

/*Top Header Options*/
$wp_customize->add_section( 'allure_news_header_ads_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Header Ads Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );


/*callback functions header section*/
if ( !function_exists('allure_news_ads_header_active_callback') ) :
  function allure_news_ads_header_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_ads_header = absint($allure_news_theme_options['allure-news-enable-ads-header']);
      if( 1 == $enable_ads_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Header Ads Section*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-ads-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['allure-news-enable-ads-header'],
   'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-ads-header]', array(
   'label'     => __( 'Show Header Advertisement', 'allure-news' ),
   'description' => __('Checked to Enable the header ads. Select either image or google adsense.', 'allure-news'),
   'section'   => 'allure_news_header_ads_section',
   'settings'  => 'allure_news_options[allure-news-enable-ads-header]',
   'type'      => 'checkbox',
   'priority'  => 10,
) );

/*Show Header Ads Type*/
$wp_customize->add_setting( 'allure_news_options[allure-news-header-ads-selection]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-header-ads-selection'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-header-ads-selection]', array(
    'choices' => array(
        'image'    => __('Select Image Ads','allure-news'),
        'code'       => __('Select Adsense Code','allure-news'),
        'widget-area'       => __('Select Widget Area','allure-news'),
    ),
    'label'     => __( 'Select Preferred option for Header Ads', 'allure-news' ),
    'description' => __('Check and select the required type for the advertisement. If you select the Widget area, then please go to Appearance > Widgets > Header Advertisement Area and add the text widget and add the code you have.', 'allure-news'),
    'section'   => 'allure_news_header_ads_section',
    'settings'  => 'allure_news_options[allure-news-header-ads-selection]',
    'type'      => 'select',
    'active_callback' => 'allure_news_ads_header_active_callback',
    'priority'  => 10,
) );

/*callback functions header section*/
if ( !function_exists('allure_news_ads_selection_active_callback') ) :
    function allure_news_ads_selection_active_callback(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $enable_ads_header = absint($allure_news_theme_options['allure-news-enable-ads-header']);
        $ads_selection = esc_attr($allure_news_theme_options['allure-news-header-ads-selection']);
        if( 1 == $enable_ads_header && 'image' == $ads_selection ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Header Ads Image*/
$wp_customize->add_setting( 'allure_news_options[allure-news-header-ads-image]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['allure-news-header-ads-image'],
    'sanitize_callback' => 'allure_news_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'allure_news_options[allure-news-header-ads-image]',
        array(
            'label'   => __( 'Header Ad Image', 'allure-news' ),
            'section'   => 'allure_news_header_ads_section',
            'settings'  => 'allure_news_options[allure-news-header-ads-image]',
            'type'      => 'image',
            'priority'  => 10,
            'active_callback' => 'allure_news_ads_selection_active_callback',
            'description' => __( 'Recommended image size of 728*90', 'allure-news' )
        )
    )
);

/*Ads Image Link*/
$wp_customize->add_setting( 'allure_news_options[allure-news-header-ads-image-link]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['allure-news-header-ads-image-link'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'allure_news_options[allure-news-header-ads-image-link]', array(
    'label'   => __( 'Header Ads Image Link', 'allure-news' ),
    'section'   => 'allure_news_header_ads_section',
    'settings'  => 'allure_news_options[allure-news-header-ads-image-link]',
    'type'      => 'url',
    'active_callback' => 'allure_news_ads_selection_active_callback',
    'priority'  => 10
) );

/*callback functions header adsense*/
if ( !function_exists('allure_news_ads_selection_code_active_callback') ) :
    function allure_news_ads_selection_code_active_callback(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $enable_ads_header = absint($allure_news_theme_options['allure-news-enable-ads-header']);
        $ads_code = esc_attr($allure_news_theme_options['allure-news-header-ads-selection']);
        if( 1 == $enable_ads_header && 'code' == $ads_code ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Ads code */
$wp_customize->add_setting( 'allure_news_options[allure-news-header-ads-code]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['allure-news-header-ads-code'],
    'sanitize_callback' => 'allure_news_sanitize_script',
) );
$wp_customize->add_control( 'allure_news_options[allure-news-header-ads-code]', array(
    'label'   => __( 'Enter Google Adsense Code', 'allure-news' ),
    'section'   => 'allure_news_header_ads_section',
    'settings'  => 'allure_news_options[allure-news-header-ads-code]',
    'type'      => 'textarea',
    'active_callback' => 'allure_news_ads_selection_code_active_callback',
    'priority'  => 10
) );
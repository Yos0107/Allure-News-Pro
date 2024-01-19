<?php
/**
 *  Allure News Preloader Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Preloader Options*/
$wp_customize->add_section( 'allure_news_preloader_options', array(
  'priority'       => 20,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => __( 'Preloader Options', 'allure-news' ),
  'panel'          => 'allure_news_panel',
) );

/*Preloader Enable*/
$wp_customize->add_setting( 'allure_news_options[allure-news-preloader]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-preloader'],
  'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-preloader]', array(
  'label'     => __( 'Enable Preloader', 'allure-news' ),
  'description' => __( 'It will enable the preloader on the website.', 'allure-news' ),
  'section'   => 'allure_news_preloader_options',
  'settings'  => 'allure_news_options[allure-news-preloader]',
  'type'      => 'checkbox',
  'priority'  => 10,
) );

// /*callback functions enable preloader*/
if ( !function_exists('allure_news_enable_preloader_active_callback') ) :
  function allure_news_enable_preloader_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_preloader = absint($allure_news_theme_options['allure-news-preloader']);
      if( 1 == $enable_preloader ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Preloader type*/
$wp_customize->add_setting( 'allure_news_options[allure-news-preloader-type]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['allure-news-preloader-type'],
  'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-preloader-type]', array(
 'choices' => array(
  'spinning'    => __('Spinning Icon','allure-news'),
  'text'    => __('Text Loading','allure-news'),
  'dots'    => __('Dots Loading','allure-news'),
  'image'    => __('Image','allure-news')
),
'label'     => __( 'Preloader Type', 'allure-news' ),
'description' => __('Select the preloader type.', 'allure-news'),
'section'   => 'allure_news_preloader_options',
'settings'  => 'allure_news_options[allure-news-preloader-type]',
'type'      => 'select',
'priority'  => 15,
'active_callback'=>'allure_news_enable_preloader_active_callback'

) );

// /*callback functions header section*/
if ( !function_exists('allure_news_preloader_color_type_active_callback') ) :
  function allure_news_preloader_color_type_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_preloader = absint($allure_news_theme_options['allure-news-preloader']);
      $preloader_type_color = esc_attr($allure_news_theme_options['allure-news-preloader-type']);
      if( 1 == $enable_preloader  && $preloader_type_color == 'spinning' ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/* Spinnig First Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-spinning-first-color]',
    array(
        'default'           => $default['allure-news-spinning-first-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-spinning-first-color]',
        array(
            'label'       => esc_html__( 'Spinning First Color', 'allure-news' ),
            'description' => esc_html__( 'Select the first color of spinning animation.', 'allure-news' ),
            'section'     => 'allure_news_preloader_options',
            'setting'     => 'allure_news_options[allure-news-spinning-first-color]',
            'priority'  => 15,
            'active_callback'=>'allure_news_preloader_color_type_active_callback'
        )
    )
);
/* Spinnig Second Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-spinning-second-color]',
    array(
        'default'           => $default['allure-news-spinning-second-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-spinning-second-color]',
        array(
            'label'       => esc_html__( 'Spinning Second Color', 'allure-news' ),
            'description' => esc_html__( 'Select the second color of spinning animation.', 'allure-news' ),
            'section'     => 'allure_news_preloader_options',
            'setting'     => 'allure_news_options[allure-news-spinning-second-color]',
            'priority'  => 20,
            'active_callback'=>'allure_news_preloader_color_type_active_callback'
        )
    )
);
/* Spinnig Third Color Option */
$wp_customize->add_setting( 'allure_news_options[allure-news-spinning-third-color]',
    array(
        'default'           => $default['allure-news-spinning-third-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'allure_news_options[allure-news-spinning-third-color]',
        array(
            'label'       => esc_html__( 'Spinning Third Color', 'allure-news' ),
            'description' => esc_html__( 'Select the third color of spinning animation.', 'allure-news' ),
            'section'     => 'allure_news_preloader_options',
            'setting'     => 'allure_news_options[allure-news-spinning-third-color]',
            'priority'  => 25,
            'active_callback'=>'allure_news_preloader_color_type_active_callback'
        )
    )
);

// /*callback functions header section*/
if ( !function_exists('allure_news_preloader_image_type_active_callback') ) :
  function allure_news_preloader_image_type_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_preloader = absint($allure_news_theme_options['allure-news-preloader']);
      $preloader_type_image = esc_attr($allure_news_theme_options['allure-news-preloader-type']);
      if( 1 == $enable_preloader  && $preloader_type_image == 'image' ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Preloader Image*/
$wp_customize->add_setting( 'allure_news_options[allure-news-preloader-image]', array(
  'capability'    => 'edit_theme_options',
  'default'     => $default['allure-news-preloader-image'],
  'sanitize_callback' => 'allure_news_sanitize_image'
) );
$wp_customize->add_control(
  new WP_Customize_Image_Control(
      $wp_customize,
      'allure_news_options[allure-news-preloader-image]',
      array(
          'label'   => __( 'Preloader Image', 'allure-news' ),
          'section'   => 'allure_news_preloader_options',
          'settings'  => 'allure_news_options[allure-news-preloader-image]',
          'type'      => 'image',
          'priority'  => 15,
          'description' => __( 'This is the preloader image, it will load before the site loads.', 'allure-news' ),
          'active_callback'=>'allure_news_preloader_image_type_active_callback'
      )
  )
);

// /*callback functions header section*/
if ( !function_exists('allure_news_preloader_text_type_active_callback') ) :
  function allure_news_preloader_text_type_active_callback(){
      global $allure_news_theme_options;
      $allure_news_theme_options = allure_news_get_options_value();
      $enable_preloader = absint($allure_news_theme_options['allure-news-preloader']);
      $preloader_type_text = esc_attr($allure_news_theme_options['allure-news-preloader-type']);
      if( 1 == $enable_preloader  && $preloader_type_text == 'text' ){
          return true;
      }
      else{
        return false;
      }
  }
endif;

/*Preloader Text*/
$wp_customize->add_setting( 'allure_news_options[allure-news-preloader-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-preloader-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-preloader-text]', array(
    'label'     => __( 'Preloader Text', 'allure-news' ),
    'description' => __('Write your own text in place of Preloader.', 'allure-news'),
    'section'   => 'allure_news_preloader_options',
    'settings'  => 'allure_news_options[allure-news-preloader-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=>'allure_news_preloader_text_type_active_callback'
) );
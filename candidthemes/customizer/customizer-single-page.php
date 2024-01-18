<?php
/**
 *  Allure News Single Page Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'allure_news_single_page_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'allure-news' ),
   'panel' 		 => 'allure_news_panel',
) );

/*Title position of Single post*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-title-position]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-title-position'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-title-position]', array(
    'label'     => __( 'Title and Meta Position', 'allure-news' ),
    'description' => __('Change the position of title and meta on single post.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-title-position]',
    'type'      => 'select',
    'choices' => array(
        'left-title'    => __('Title and Meta Left','allure-news'),
        'center-title'   => __('Title and Meta Center','allure-news'),
    ),
    'priority'  => 15,
) );


/*Featured Image Option*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-featured-image'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'allure-news' ),
    'description' => __('You can hide or show featured image on single page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Enable Category*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-category]', array(
    'label'     => __( 'Enable Category', 'allure-news' ),
    'description' => __('Checked to Enable Category In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-category]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-date]', array(
    'label'     => __( 'Enable Date', 'allure-news' ),
    'description' => __('Checked to Enable Date In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-date]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*Enable Author*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-author]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-author]', array(
    'label'     => __( 'Enable Author', 'allure-news' ),
    'description' => __('Checked to Enable Author In Single post and page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-author]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Comment Area*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-comments-form]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-comments-form'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-comments-form]', array(
    'label'     => __( 'Enable Comment Form', 'allure-news' ),
    'description' => __('Do you want to hide the comment form on the single page? You can manage form here.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-comments-form]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Move Comment Area*/
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-single-comments-form-move]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-single-comments-form-move'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-single-comments-form-move]', array(
    'label'     => __( 'Move Comment Form Above Comments', 'allure-news' ),
    'description' => __('Please select the option from the dropdown to move the comment form above the comments.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-single-comments-form-move]',
    'type'      => 'select',
    'choices' => array(
        'default'    => __('Default Location Below Comments','allure-news'),
        'move-top'   => __('Move Top Before Comments','allure-news'),
    ),
    'priority'  => 20,
) );

/*Enable Underline in single post link place */
$wp_customize->add_setting( 'allure_news_options[allure-news-enable-underline-link]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-enable-underline-link'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-enable-underline-link]', array(
    'label'     => __( 'Enable Underline on Link', 'allure-news' ),
    'description' => __('If you enabled this, you will see the underline in the links. You can change it color from the general section of colors.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-enable-underline-link]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Show hide author information box*/
$wp_customize->add_setting( 'allure_news_options[allure-news-show-hide-author-box]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-show-hide-author-box'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-show-hide-author-box]', array(
    'label'     => __( 'Show/Hide Author Box', 'allure-news' ),
    'description' => __('Author Information can be managed from this section.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-show-hide-author-box]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'allure-news' ),
    'description' => __('3 Post from similar category will display at the end of the page.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('allure_news_related_post_callback') ) :
    function allure_news_related_post_callback(){
        global $allure_news_theme_options;
        $allure_news_theme_options = allure_news_get_options_value();
        $related_posts = absint($allure_news_theme_options['allure-news-single-page-related-posts']);
        if( 1 == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'allure-news' ),
    'description' => __('Give the appropriate title for related posts', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'allure_news_related_post_callback'
) );

/*Related Post Selection types*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-selection-types]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-selection-types'],
    'sanitize_callback' => 'allure_news_sanitize_select'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-selection-types]', array(
    'label'     => __( 'Related Posts Selection', 'allure-news' ),
    'description' => __('You can show the related post from Category or Tags', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-selection-types]',
    'type'      => 'select',
    'choices' => array(
        'category'    => __('Related Post from Category','allure-news'),
        'tags'   => __('Related Post from Tags','allure-news'),
    ),
    'priority'  => 20,
    'active_callback'=>'allure_news_related_post_callback'
) );

/*Related Post Number*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts-number]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts-number'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts-number]', array(
    'label'     => __( 'Related Posts Number', 'allure-news' ),
    'description' => __('Enter the number for the required related posts', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts-number]',
    'type'      => 'number',
    'priority'  => 20,
    'active_callback'=>'allure_news_related_post_callback'
) );
/*Related Post Image*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts-image'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts-image]', array(
    'label'     => __( 'Show Image on Related Posts', 'allure-news' ),
    'description' => __('You can show or hide the related post featured image.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts-image]',
    'type'      => 'checkbox',
    'priority'  => 20,
    'active_callback'=>'allure_news_related_post_callback'
) );

/*Related Post Date*/
$wp_customize->add_setting( 'allure_news_options[allure-news-single-page-related-posts-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['allure-news-single-page-related-posts-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
) );
$wp_customize->add_control( 'allure_news_options[allure-news-single-page-related-posts-date]', array(
    'label'     => __( 'Show Date on Related Posts', 'allure-news' ),
    'description' => __('You can show or hide the related post date.', 'allure-news'),
    'section'   => 'allure_news_single_page_section',
    'settings'  => 'allure_news_options[allure-news-single-page-related-posts-date]',
    'type'      => 'checkbox',
    'priority'  => 20,
    'active_callback'=>'allure_news_related_post_callback'
) );
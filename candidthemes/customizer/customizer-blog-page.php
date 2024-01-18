<?php
/**
 *  Allure News Blog Page Option
 *
 * @since Allure News 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section('allure_news_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Section Options', 'allure-news'),
    'panel' => 'allure_news_panel',
));
/*Blog Page column number*/
$wp_customize->add_setting('allure_news_options[allure-news-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-column-blog-page'],
    'sanitize_callback' => 'allure_news_sanitize_select'
));
$wp_customize->add_control('allure_news_options[allure-news-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Column', 'allure-news'),
        'two-columns' => __('Two Column', 'allure-news'),
        'three-columns' => __('Three Column', 'allure-news'),
    ),
    'label' => __('Blog Layout Column', 'allure-news'),
    'description' => __('You can change the blog page and archive page layouts', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-column-blog-page]',
    'type' => 'select',
    'priority' => 10,
));
/*Blog Page Layout*/
$wp_customize->add_setting('allure_news_options[allure-news-blog-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-blog-layout'],
    'sanitize_callback' => 'allure_news_sanitize_select'
));
$wp_customize->add_control('allure_news_options[allure-news-blog-layout]', array(
    'choices' => array(
        'normal' => __('Normal Layout', 'allure-news'),
        'masonry' => __('Masonry Layout', 'allure-news'),
    ),
    'label' => __('Blog Layout', 'allure-news'),
    'description' => __('You can change the layout on blog page and archive page', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-blog-layout]',
    'type' => 'select',
    'priority' => 10,
));
/*Blog Page Title*/
$wp_customize->add_setting('allure_news_options[allure-news-title-position-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-title-position-blog-page'],
    'sanitize_callback' => 'allure_news_sanitize_select'
));
$wp_customize->add_control('allure_news_options[allure-news-title-position-blog-page]', array(
    'choices' => array(
        'left-title' => __('Blog Title Meta Left', 'allure-news'),
        'center-title' => __('Blog Title Meta Center', 'allure-news'),
    ),
    'label' => __('Title of Blog and Archive Page', 'allure-news'),
    'description' => __('The title of the blog and archive page can be center and left.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-title-position-blog-page]',
    'type' => 'select',
    'priority' => 10,
));
/*Blog Page Show content from*/
$wp_customize->add_setting('allure_news_options[allure-news-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-content-show-from'],
    'sanitize_callback' => 'allure_news_sanitize_select'
));
$wp_customize->add_control('allure_news_options[allure-news-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Excerpt', 'allure-news'),
        'content' => __('Content', 'allure-news')
    ),
    'label' => __('Select Content Display Option', 'allure-news'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-content-show-from]',
    'type' => 'select',
    'priority' => 10,
));
/*Blog Page excerpt length*/
$wp_customize->add_setting('allure_news_options[allure-news-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-excerpt-length'],
    'sanitize_callback' => 'absint'
));
$wp_customize->add_control('allure_news_options[allure-news-excerpt-length]', array(
    'label' => __('Size of Excerpt Content', 'allure-news'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-excerpt-length]',
    'type' => 'number',
    'priority' => 10,
));
/*Blog Page Pagination Options*/
$wp_customize->add_setting('allure_news_options[allure-news-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-pagination-options'],
    'sanitize_callback' => 'allure_news_sanitize_select'
));
$wp_customize->add_control('allure_news_options[allure-news-pagination-options]', array(
    'choices' => array(
        'default' => __('Default', 'allure-news'),
        'numeric' => __('Numeric', 'allure-news'),
        'load-more' => __('Ajax Pagination', 'allure-news'),
        'infinite' => __('Auto Loading', 'allure-news'),
    ),
    'label' => __('Pagination Types', 'allure-news'),
    'description' => __('Select the Required Pagination Type', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-pagination-options]',
    'type' => 'select',
    'priority' => 10,
));
/*Blog Page read more text*/
$wp_customize->add_setting('allure_news_options[allure-news-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('allure_news_options[allure-news-read-more-text]', array(
    'label' => __('Enter Read More Text', 'allure-news'),
    'description' => __('Read more text for blog and archive page.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-read-more-text]',
    'type' => 'text',
    'priority' => 10,
));

/*Blog Page author*/
$wp_customize->add_setting('allure_news_options[allure-news-enable-blog-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-enable-blog-author'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
));
$wp_customize->add_control('allure_news_options[allure-news-enable-blog-author]', array(
    'label' => __('Show Author', 'allure-news'),
    'description' => __('Checked to show the author.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-enable-blog-author]',
    'type' => 'checkbox',
    'priority' => 10,
));
/*Blog Page category*/
$wp_customize->add_setting('allure_news_options[allure-news-enable-blog-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-enable-blog-category'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
));
$wp_customize->add_control('allure_news_options[allure-news-enable-blog-category]', array(
    'label' => __('Show Category', 'allure-news'),
    'description' => __('Checked to show the category.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-enable-blog-category]',
    'type' => 'checkbox',
    'priority' => 10,
));
/*Blog Page date*/
$wp_customize->add_setting('allure_news_options[allure-news-enable-blog-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-enable-blog-date'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
));
$wp_customize->add_control('allure_news_options[allure-news-enable-blog-date]', array(
    'label' => __('Show Date', 'allure-news'),
    'description' => __('Checked to show the Date.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-enable-blog-date]',
    'type' => 'checkbox',
    'priority' => 10,
));
/*Blog Page comment*/
$wp_customize->add_setting('allure_news_options[allure-news-enable-blog-comment]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['allure-news-enable-blog-comment'],
    'sanitize_callback' => 'allure_news_sanitize_checkbox'
));
$wp_customize->add_control('allure_news_options[allure-news-enable-blog-comment]', array(
    'label' => __('Show Comment', 'allure-news'),
    'description' => __('Checked to show the Comment.', 'allure-news'),
    'section' => 'allure_news_blog_page_section',
    'settings' => 'allure_news_options[allure-news-enable-blog-comment]',
    'type' => 'checkbox',
    'priority' => 10,
));
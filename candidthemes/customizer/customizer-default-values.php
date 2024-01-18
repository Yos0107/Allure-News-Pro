<?php
/**
 * Allure News Theme Customizer default values
 *
 * @package Allure News
 */
if ( !function_exists('allure_news_default_theme_options_values') ) :
    function allure_news_default_theme_options_values() {
        $default_theme_options = array(

             /*General Colors*/
            'allure-news-primary-color' => '#525CEB',
            'allure-news-boxed-back-ground-color'=> '',
            'allure-news-sidebar-background-color'=> '',
            'allure-news-body-text-color'=>'',
            'allure-news-body-link-color'=>'',
            'allure-news-body-link-hover-color'=> '',
            'allure-news-body-link-visited-color'=> '',
            'allure-news-body-link-underline-color'=> '',
            'allure-news-site-title-hover'=> '',
            'allure-news-site-tagline'=> '',
            
            /*Top Header Colors*/
            'allure-news-top-header-background-color'=> '',
            'allure-news-top-header-trending-background-color'=> '',
            'allure-news-top-header-trending-text-color'=> '',
            'allure-news-top-header-text-color'=>'',
            'allure-news-top-header-text-hover'=>'#fff',

            /*Logo Section Colors*/
            'allure-news-logo-section-background' => '',
            
            /*Menu Colors*/
            'allure-news-menu-background-color'=> '',
            'allure-news-sub-menu-background-color'=> '',
            'allure-news-menu-text-color'=> '',
            'allure-news-menu-hover-color'=> '',
            'allure-news-menu-active-color'=> '',
            
            /*Featured Text Color*/
            'allure-news-featured-text-color'=> '',
            'allure-news-featured-text-hover-color'=> '',
            
            /*Footer Widget Area*/
            'allure-news-footer-background-color' => '',
            'allure-news-footer-text-color'=> '',
            'allure-news-footer-link-color'=> '',
            'allure-news-footer-link-hover-color'=> '',
            
            /*Footer Copyright Area*/
            'allure-news-footer-cr-background-color'=>'',
            'allure-news-footer-cr-text-color'=> '',
            'allure-news-footer-cr-link-color'=>'',
            'allure-news-footer-cr-link-hover-color'=> '',
            'allure-news-footer-cr-to-top-background-color'=> '',
            'allure-news-footer-cr-to-top-arrow-color'=> '',

            /*logo position*/
            'allure-news-custom-logo-position'=> 'center',

            /*Site Layout Options*/
            'allure-news-site-layout-options'=>'boxed',
            'allure-news-site-dark-light-layout-options'=>'default-light',
            'allure-news-boxed-width-options'=> 1500,

            /*Top Header Section Default Value*/
            'allure-news-enable-top-header'=> true,
            'allure-news-enable-top-header-social'=> true,
            'allure-news-enable-top-header-menu'=> true,
            'allure-news-enable-top-header-date' => true,
            'allure-news-top-header-date-format'=>'default-date',
            
            /*Treding News*/
            'allure-news-enable-trending-news' => true,
            'allure-news-enable-trending-news-text'=> esc_html__('Trending News','allure-news'),
            'allure-news-trending-news-category'=> 0,
            'allure-news-enable-trending-news-position'=> 'default-position',
            'allure-news-enable-trending-image'  => true,
            'allure-news-enable-trending-news-selection'=> 'recent-post-news',

            /*Menu Section*/
            'allure-news-enable-menu-section-search'=> true,
            'allure-news-enable-sticky-primary-menu'=> true,
            'allure-news-change-primary-menu-position'=>'default-menu-position', 
            'allure-news-enable-menu-home-icon' => true,
            'allure-news-disable-menu-description'=> true,
            
            /*Header Types*/
            'allure-news-header-types' =>'default-header',

            /*Header Ads Default Value*/
            'allure-news-enable-ads-header'=> false,
            'allure-news-header-ads-image'=> '',
            'allure-news-header-ads-image-link'=> 'https://www.candidthemes.com/themes/allure-news/',
            'allure-news-header-ads-selection'=>'image',
            'allure-news-header-ads-code'=> '',

            /*Slider Section Default Value*/
            'allure-news-enable-slider' => true,
            'allure-news-select-category'=> 0,
            'allure-news-select-category-featured-right' => 0,
            'allure-news-slider-slide-prev-next'=> true,
            'allure-news-slider-post-date'=> true,
            'allure-news-slider-post-author'=> false,
            'allure-news-slider-post-types'=> 'featured-one',
            'allure-news-slider-prev-next'=> 'hover-prev-next',
            'allure-news-slider-post-category'=> true,
            'allure-news-slider-post-read-time'=> true,
            

            /*Sidebars Default Value*/
            'allure-news-sidebar-blog-page'=>'right-sidebar',
            'allure-news-sidebar-front-page' => 'right-sidebar',
            'allure-news-sidebar-archive-page'=> 'right-sidebar',

            /*Blog Page Default Value*/
            'allure-news-column-blog-page'=> 'one-column',
            'allure-news-blog-layout'=> 'normal',
            'allure-news-content-show-from'=>'excerpt',
            'allure-news-excerpt-length'=>25,
            'allure-news-pagination-options'=>'numeric',
            'allure-news-read-more-text'=> esc_html__('Read More','allure-news'),
            'allure-news-enable-blog-author'=> false,
            'allure-news-enable-blog-category'=> true,
            'allure-news-enable-blog-date'=> true,
            'allure-news-enable-blog-comment'=> false,
            'allure-news-title-position-blog-page'=> 'center-title',

            /*Single Page Default Value*/
            'allure-news-enable-single-title-position' => 'left-title',
            'allure-news-single-page-featured-image'=> true,
            'allure-news-single-page-related-posts'=> true,
            'allure-news-single-page-related-posts-title'=> esc_html__('Related Posts','allure-news'),
            'allure-news-enable-single-category' => true,
            'allure-news-enable-single-date' => true,
            'allure-news-enable-single-author' => true,
            'allure-news-enable-single-comments-form'=> true,
            'allure-news-enable-single-comments-form-move'=>'default',
            'allure-news-enable-underline-link' => false,
            'allure-news-single-page-related-posts-number' => 3,
            'allure-news-single-page-related-posts-image' => true,
            'allure-news-single-page-related-posts-date' => true,
            'allure-news-show-hide-author-box'  => true,
            'allure-news-single-page-related-selection-types'=> 'category',
            

            /*Sticky Sidebar Options*/
            'allure-news-enable-sticky-sidebar'=> true,

            /*Social Share Options*/
            'allure-news-enable-single-sharing'=> true,
            'allure-news-enable-blog-sharing'=> false,
            'allure-news-enable-static-page-sharing' => false,
            'allure-news-social-share-layout-options'=>'icons-only',

            /*Footer Section*/
            'allure-news-footer-copyright' =>  esc_html__('All Rights Reserved 2023.','allure-news'),
            'allure-news-go-to-top'=> true,
            'allure-news-footer-social-icons' => false,
            'allure-news-footer-powered-text' =>  sprintf( esc_html__('Proudly powered by %1$s %2$s Theme: %3$s by %4$s.','allure-news') , '<a href="https://wordpress.org/" target="_blank">WordPress</a>', ' <span class="sep"> | </span>', 'Allure News Pro', '<a href="https://www.candidthemes.com/" target="_blank">Candid Themes</a>' ),
            'allure-news-footer-you-may-missed' => true,
            'allure-news-footer-you-may-missed-title' =>  esc_html__('You May Have Missed','allure-news'),
            'allure-news-you-missed-select-category' => 0,
            'allure-news-footer-you-may-missed-column' => 4,
            'allure-news-footer-you-may-missed-date' => true,
            'allure-news-footer-you-may-missed-category' => true,
            'allure-news-footer-you-may-missed-read-time' => false,
            'allure-news-footer-you-may-missed-author'=> false,
            'allure-news-missed-this-background' =>'#fafafa',
            'allure-news-missed-this-text-color'=> '#000',
            'allure-news-footer-instagram-feed' => '[instagram-feed num=8 cols=8 showheader=false showbutton=false imagepadding=0]',

            /*Site Title Font Options*/
            'allure-news-font-site-title-family-url'=> 'Oswald:400,300,700',
            'allure-news-site-title-font-size'=> 54,
            'allure-news-site-title-font-line-height'=> 1.6,
            'allure-news-site-title-letter-spacing'=> 4,

            /*Paragraph Font Options*/
            'allure-news-font-family-url'=> 'Muli:400,300italic,300',
            'allure-news-font-paragraph-font-size'=> 16,
            'allure-news-font-line-height'=> 1.5,
            'allure-news-letter-spacing'=> 0,
    
            /*Menu Font Options*/
            'allure-news-menu-font-family-url'=> 'Muli:400,300italic,300',
            'allure-news-menu-font-size'=> 16,
            'allure-news-menu-font-line-height'=> 1.7,
            'allure-news-menu-letter-spacing'=> 0,

            /*Blog Title Font Options*/
            'allure-news-font-blog-title-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-blog-title-font-size'=> 36,
            'allure-news-blog-title-font-line-height'=> 1.2,
            'allure-news-blog-title-letter-spacing'=> 0,

            /*Blog Single Title Font Options*/
            'allure-news-font-blog-single-title-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-blog-single-title-font-size'=> 36,
            'allure-news-blog-single-title-font-line-height'=> 1.2,
            'allure-news-blog-single-title-letter-spacing'=> 0,
    
            /*Widget Font Options*/
            'allure-news-widget-font-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-widget-font-size'=> 18,
            'allure-news-widget-font-line-height'=> 1,
            'allure-news-widget-letter-spacing'=> 0,
    
            /*H1 Font Options*/
            'allure-news-font-heading-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-h1-font-size'=> 36,
            'allure-news-h1-font-line-height'=> 1.5,
            'allure-news-h1-letter-spacing'=> 0,
    
            /*H2 Font Options*/
            'allure-news-font-h2-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-h2-font-size'=> 32,
            'allure-news-h2-font-line-height'=> 1.5,
            'allure-news-h2-letter-spacing'=> 0,
    
            /*H3 Font Options*/
            'allure-news-font-h3-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-h3-font-size'=> 26,
            'allure-news-h3-font-line-height'=> 1.5,
            'allure-news-h3-letter-spacing'=> 0,
    
            /*H4 Font Options*/
            'allure-news-font-h4-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-h4-font-size'=> 22,
            'allure-news-h4-font-line-height'=> 1.5,
            'allure-news-h4-letter-spacing'=> 0,
    
            /*H5 Font Options*/
            'allure-news-font-h5-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-h5-font-size'=> 18,
            'allure-news-h5-font-line-height'=> 1.5,
            'allure-news-h5-letter-spacing'=> 0,
    
            /*H6 Font Options*/
            'allure-news-font-h6-family-url'=> 'Roboto:400,500,300,700,400italic',
            'allure-news-h6-font-size'=> 14,
            'allure-news-h6-font-line-height'=> 1.5,
            'allure-news-h6-letter-spacing'=> 0,

            /*Front Page Options*/
            'allure-news-enable-post-carousel-below-slider'=> true,
            'allure-news-post-carousel-below-slider-cat'=> 0,
            'allure-news-enable-post-carousel-below-slider-title'=> esc_html__('Featured Posts Carousel','allure-news'),
            'allure-news-enable-post-carousel-below-slider-number'=> 4,
            'allure-news-enable-post-carousel-below-slider-category'=> true,
            'allure-news-enable-post-carousel-below-slider-read-time'=> false,
            'allure-news-enable-post-carousel-below-slider-author'=> false,
            'allure-news-enable-post-carousel-below-slider-date'=> true,
            'allure-news-post-carousel-background'=> '#fff',
            'allure-news-post-carousel-text-color' => '#000',
            'allure-news-enable-post-grid-layout' => true,
            'allure-news-grid-column-excerpt-length'=> 15,
            'allure-news-grid-column-excerpt' => 0,
            'allure-news-grid-column-post-number'=> 5,
            'allure-news-grid-column-select-category-one'=> 0,
            'allure-news-grid-column-select-category-two'=> 0,
            'allure-news-grid-column-select-category-three'=>0,
            'allure-news-grid-column-date' => true,
            'allure-news-grid-column-category' => true,
            'allure-news-grid-column-read-time'=> false,
            'allure-news-grid-column-author'=> false,
            'allure-news-post-grid-background' => '#fafafa',
            'allure-news-post-grid-text-color'=> '#000',

            /*Breadcrumb Options*/
            'allure-news-breadcrumb-display-from-option'=> 'theme-default',
            'allure-news-extra-breadcrumb'=> true,
            'allure-news-breadcrumb-text'=>  esc_html__('You are Here','allure-news'),
            'allure-news-breadcrumb-display-from-plugins'=>'yoast',
            
            /*Extra Options*/
            'allure-news-extra-preloader'=> true,
            'allure-news-extra-preloader-image'=> '',
            'allure-news-extra-hide-default-thumbnails' => false,
            'allure-news-extra-post-formats-icons'=> true,
            'allure-news-extra-hide-read-time' => false,
            'allure-news-extra-hide-read-time-words'=> 200,
            
            /*Home Page Content Hide*/
            'allure-news-front-page-content' => false,

            /*Category Color*/
            'allure-news-enable-category-color' => false,

        );
        return apply_filters( 'allure_news_default_theme_options_values', $default_theme_options );
    }
endif;

/**
 *  Allure News Theme Options and Settings
 *
 * @since Allure News 1.0.0
 *
 * @param null
 * @return array allure_news_get_options_value
 *
 */
if ( !function_exists('allure_news_get_options_value') ) :
    function allure_news_get_options_value() {
        $allure_news_default_theme_options_values = allure_news_default_theme_options_values();
        $allure_news_get_options_value = get_theme_mod( 'allure_news_options');
        if( is_array( $allure_news_get_options_value )){
            return array_merge( $allure_news_default_theme_options_values, $allure_news_get_options_value );
        }
        else{
            return $allure_news_default_theme_options_values;
        }
    }
endif;

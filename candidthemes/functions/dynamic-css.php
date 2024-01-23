<?php
/**
 * Dynamic CSS elements.
 *
 * @package Allure News
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('allure_news_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function allure_news_dynamic_css()
    {

        global $allure_news_theme_options;
    
        /* Paragraph Font Options */
        $allure_news_google_fonts = allure_news_google_fonts();
        $allure_news_body_fonts = !empty($allure_news_theme_options['allure-news-font-family-url']) ? $allure_news_theme_options['allure-news-font-family-url'] : '';
        
        $allure_news_font_family = !empty($allure_news_google_fonts[$allure_news_body_fonts]) ? esc_attr($allure_news_google_fonts[$allure_news_body_fonts] ) : '';
        $allure_news_font_size = !empty($allure_news_theme_options['allure-news-font-paragraph-font-size']) ? absint( $allure_news_theme_options['allure-news-font-paragraph-font-size'] ) : 16;
        $allure_news_line_height = !empty($allure_news_theme_options['allure-news-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-font-line-height'] ) : 1.5;
        $allure_news_letter_spacing = !empty($allure_news_theme_options['allure-news-letter-spacing']) ? esc_attr( $allure_news_theme_options['allure-news-letter-spacing'] ) : 0;

        $allure_news_primary_color = !empty($allure_news_theme_options['allure-news-primary-color']) ?  esc_attr( $allure_news_theme_options['allure-news-primary-color'] ) : '#525CEB';
    
    
        /* Menu Font Options */
        $allure_news_menu_fonts = !empty($allure_news_theme_options['allure-news-menu-font-family-url']) ? esc_attr($allure_news_theme_options['allure-news-menu-font-family-url'] ) : '';
        $allure_news_menu_font_family = !empty($allure_news_google_fonts[$allure_news_menu_fonts]) ? $allure_news_google_fonts[$allure_news_menu_fonts] : '';
        $allure_news_menu_font_size = !empty($allure_news_theme_options['allure-news-menu-font-size']) ? absint( $allure_news_theme_options['allure-news-menu-font-size'] ) : 16;

        $allure_news_menu_line_height = !empty( $allure_news_theme_options['allure-news-menu-font-line-height'] ) ? esc_attr( $allure_news_theme_options['allure-news-menu-font-line-height'] ) : 1.7;
        $allure_news_menu_letter_spacing = !empty($allure_news_theme_options['allure-news-menu-letter-spacing']) ? esc_attr( $allure_news_theme_options['allure-news-menu-letter-spacing'] ) : 0;
        
        
        //widget
        $allure_news_widget_fonts = !empty($allure_news_theme_options['allure-news-widget-font-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-widget-font-family-url'] ): '';
        $allure_news_widget_font_family = !empty($allure_news_google_fonts[$allure_news_widget_fonts]) ? $allure_news_google_fonts[$allure_news_widget_fonts] : '';


        $allure_news_widget_font_size = !empty($allure_news_theme_options['allure-news-widget-font-size']) ? absint( $allure_news_theme_options['allure-news-widget-font-size'] ) : 18;
        $allure_news_widget_title_line_height = !empty( $allure_news_theme_options['allure-news-widget-font-line-height'] ) ? esc_attr( $allure_news_theme_options['allure-news-widget-font-line-height'] ) : 1;
        $allure_news_widget_title_letter_spacing = !empty( $allure_news_theme_options['allure-news-widget-letter-spacing'] ) ? esc_attr( $allure_news_theme_options['allure-news-widget-letter-spacing'] ) : 0;
    
        /* Heading H1 Font Option */
        $allure_news_h1_fonts = !empty($allure_news_theme_options['allure-news-font-heading-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-heading-family-url'] ) : '';
        $allure_news_h1_font_family = !empty($allure_news_google_fonts[$allure_news_h1_fonts]) ? $allure_news_google_fonts[$allure_news_h1_fonts] : '';
    
        /* Heading H2 Font Option */
        $allure_news_h2_fonts = !empty($allure_news_theme_options['allure-news-font-h2-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-h2-family-url'] ): '';
        $allure_news_h2_font_family = !empty($allure_news_google_fonts[$allure_news_h2_fonts]) ? $allure_news_google_fonts[$allure_news_h2_fonts] : '';
    
        /* Heading H3 Font Option */
        $allure_news_h3_fonts = !empty($allure_news_theme_options['allure-news-font-h3-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-h3-family-url'] ) : '';
        $allure_news_h3_font_family = !empty($allure_news_google_fonts[$allure_news_h3_fonts]) ? $allure_news_google_fonts[$allure_news_h3_fonts] : '';
        
        /* Heading H4 Font Option */
        $allure_news_h4_fonts = !empty($allure_news_theme_options['allure-news-font-h4-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-h4-family-url'] ) : '';
        $allure_news_h4_font_family = !empty($allure_news_google_fonts[$allure_news_h4_fonts]) ? $allure_news_google_fonts[$allure_news_h4_fonts] : '';
    
        /* Heading H5 Font Option */
        $allure_news_h5_fonts = !empty($allure_news_theme_options['allure-news-font-h5-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-h5-family-url'] ) : '';
        $allure_news_h5_font_family = !empty($allure_news_google_fonts[$allure_news_h5_fonts]) ?  $allure_news_google_fonts[$allure_news_h5_fonts] : '';
    
        /* Heading H6 Font Option */
        $allure_news_h6_fonts = !empty($allure_news_theme_options['allure-news-font-h6-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-h6-family-url'] ): '';
        $allure_news_h6_font_family = !empty($allure_news_google_fonts[$allure_news_h6_fonts]) ? $allure_news_google_fonts[$allure_news_h6_fonts] : '';

        /* Heading H6 Font Option */
        $allure_news_site_title_fonts = !empty($allure_news_theme_options['allure-news-font-site-title-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-site-title-family-url'] ) : '';
        $allure_news_site_title_font_family = !empty($allure_news_google_fonts[$allure_news_site_title_fonts]) ? $allure_news_google_fonts[$allure_news_site_title_fonts] : '';

        $allure_news_h1_font_size = !empty($allure_news_theme_options['allure-news-h1-font-size']) ? absint( $allure_news_theme_options['allure-news-h1-font-size'] ) : 36;
        $allure_news_h2_font_size = !empty($allure_news_theme_options['allure-news-h2-font-size']) ? absint( $allure_news_theme_options['allure-news-h2-font-size'] ) : 32;
        $allure_news_h3_font_size = !empty($allure_news_theme_options['allure-news-h3-font-size']) ? absint( $allure_news_theme_options['allure-news-h3-font-size'] ) : 26;
        $allure_news_h4_font_size = !empty($allure_news_theme_options['allure-news-h4-font-size']) ? absint( $allure_news_theme_options['allure-news-h4-font-size'] ) : 22;
        $allure_news_h5_font_size = !empty($allure_news_theme_options['allure-news-h5-font-size']) ? absint( $allure_news_theme_options['allure-news-h5-font-size'] ) : 18;
        $allure_news_h6_font_size = !empty($allure_news_theme_options['allure-news-h6-font-size']) ? absint( $allure_news_theme_options['allure-news-h6-font-size'] ) : 14;

        $allure_news_site_title_font_size = !empty($allure_news_theme_options['allure-news-site-title-font-size']) ? absint( $allure_news_theme_options['allure-news-site-title-font-size'] ) : 36;

        $allure_news_h1_line_height = !empty($allure_news_theme_options['allure-news-h1-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-h1-font-line-height'] ) : 1.5;
        $allure_news_h2_line_height = !empty($allure_news_theme_options['allure-news-h2-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-h2-font-line-height'] ) : 1.5;
        $allure_news_h3_line_height = !empty($allure_news_theme_options['allure-news-h3-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-h3-font-line-height'] ) : 1.5;
        $allure_news_h4_line_height = !empty($allure_news_theme_options['allure-news-h4-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-h4-font-line-height'] ) : 1.5;
        $allure_news_h5_line_height = !empty($allure_news_theme_options['allure-news-h5-font-line-height'] ) ? esc_attr( $allure_news_theme_options['allure-news-h5-font-line-height'] ) : 1.5;
        $allure_news_h6_line_height = !empty($allure_news_theme_options['allure-news-h6-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-h6-font-line-height'] ) : 1.5;
        $allure_news_site_title_line_height = !empty($allure_news_theme_options['allure-news-site-title-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-site-title-font-line-height'] ) : 1.2;

        $allure_news_h1_letter_spacing = !empty($allure_news_theme_options['allure-news-h1-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-h1-letter-spacing'] ) : 0;
        $allure_news_h2_letter_spacing = !empty($allure_news_theme_options['allure-news-h2-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-h2-letter-spacing'] ) : 0;
        $allure_news_h3_letter_spacing = !empty($allure_news_theme_options['allure-news-h3-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-h3-letter-spacing'] ) : 0;
        $allure_news_h4_letter_spacing = !empty($allure_news_theme_options['allure-news-h4-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-h4-letter-spacing'] ) : 0;
        $allure_news_h5_letter_spacing = !empty($allure_news_theme_options['allure-news-h5-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-h5-letter-spacing'] ) : 0;
        $allure_news_h6_letter_spacing = !empty($allure_news_theme_options['allure-news-h6-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-h6-letter-spacing'] ) : 0;
        $allure_news_site_title_letter_spacing = !empty($allure_news_theme_options['allure-news-site-title-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-site-title-letter-spacing'] ) : 0;



        $allure_news_header_color = get_header_textcolor();
        $allure_news_custom_css = '';

        if (!empty($allure_news_header_color)) {
            $allure_news_custom_css .= ".site-branding h1, .site-branding p.site-title,.ct-dark-mode .site-title a, .site-title, .site-title a { color: #{$allure_news_header_color}; }";
        }

        if (!empty($allure_news_theme_options['allure-news-site-title-hover'])) {
            $allure_news_site_title_hover_color = esc_attr( $allure_news_theme_options['allure-news-site-title-hover'] );
            $allure_news_custom_css .= ".ct-dark-mode .site-title a:hover,.site-title a:hover, .site-title a:visited:hover, .ct-dark-mode .site-title a:visited:hover { color: {$allure_news_site_title_hover_color}; }";
        }

        if (!empty($allure_news_theme_options['allure-news-site-tagline'])) {
            $allure_news_site_desc_color = esc_attr( $allure_news_theme_options['allure-news-site-tagline'] );
            $allure_news_custom_css .= ".ct-dark-mode .site-branding  .site-description, .site-branding  .site-description { color: {$allure_news_site_desc_color}; }";
        }

        /* Typography Section */
        //Paragraph
        if (!empty($allure_news_font_family)) {
            $allure_news_custom_css .= "body { font-family: '{$allure_news_font_family}'; }";
        }
        
        //Menu
        if (!empty($allure_news_widget_font_family)) {
            $allure_news_custom_css .= ".widget-title, .allure-news-tabbed .ct-title-head,
.about-author-box .container-title  { font-family: '{$allure_news_widget_font_family}'; }";
        }
    
        //Widget
        if (!empty($allure_news_menu_font_family)) {
            $allure_news_custom_css .= ".main-navigation a { font-family: '{$allure_news_menu_font_family}'; }";
        }
    
        //h1
        if (!empty($allure_news_h1_font_family)) {
            $allure_news_custom_css .= "h1:not(.entry-title):not(.site-title) { font-family: '{$allure_news_h1_font_family}'; }";
        }
        //h2
        if (!empty($allure_news_h2_font_family)) {
            $allure_news_custom_css .= "h2 { font-family: '{$allure_news_h2_font_family}'; }";
        }
        //h3
        if (!empty($allure_news_h3_font_family)) {
            $allure_news_custom_css .= "h3 { font-family: '{$allure_news_h3_font_family}'; }";
        }
        //h4
        if (!empty($allure_news_h4_font_family)) {
            $allure_news_custom_css .= "h4 { font-family: '{$allure_news_h4_font_family}'; }";
        }
        //h5
        if (!empty($allure_news_h5_font_family)) {
            $allure_news_custom_css .= "h5 { font-family: '{$allure_news_h5_font_family}'; }";
        }
        //h6
        if (!empty($allure_news_h6_font_family)) {
            $allure_news_custom_css .= "h6 { font-family: '{$allure_news_h6_font_family}'; }";
        }

        if (!empty($allure_news_site_title_font_family)) {
            $allure_news_custom_css .= ".site-title { font-family: '{$allure_news_site_title_font_family}'; }";
        }

        if (!empty($allure_news_font_size)) {
            $allure_news_custom_css .= "body { font-size: {$allure_news_font_size}px; }";
        }

        /* Primary Color Section */
        if (!empty($allure_news_primary_color)) {
            //font-color
            $allure_news_custom_css .= ".entry-content a, .entry-title a:hover, .related-title a:hover, .posts-navigation .nav-previous a:hover, .post-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .post-navigation .nav-next a:hover, #comments .comment-content a:hover, #comments .comment-author a:hover, .offcanvas-menu nav ul.top-menu li a:hover, .offcanvas-menu nav ul.top-menu li.current-menu-item > a, .error-404-title, #allure-news-breadcrumbs a:hover, .entry-content a.read-more-text:hover, a:hover, a:visited:hover, .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a  { color : {$allure_news_primary_color}; }";

            //background-color
            $allure_news_custom_css .= ".candid-allure-post-format, .allure-news-featured-block .allure-news-col-2 .candid-allure-post-format, .trending-title, .search-form input[type=submit], input[type=\"submit\"], ::selection, .breadcrumbs span.breadcrumb, article.sticky .allure-news-content-container, .candid-pagination .page-numbers.current, .candid-pagination .page-numbers:hover, .ct-title-head, .widget-title:before,
.about-author-box .container-title:before, .widget ul.ct-nav-tabs:before, .widget ul.ct-nav-tabs li.ct-title-head:hover, .widget ul.ct-nav-tabs li.ct-title-head.ui-tabs-active { background-color : {$allure_news_primary_color}; }";

            //border-color
            $allure_news_custom_css .= ".candid-allure-post-format, .allure-news-featured-block .allure-news-col-2 .candid-allure-post-format, blockquote, .search-form input[type=\"submit\"], input[type=\"submit\"], .candid-pagination .page-numbers { border-color : {$allure_news_primary_color}; }";
        }

        if(!empty($allure_news_widget_font_family)){
            $allure_news_custom_css .= ".widget-title, .widget-title .ct-title-head,
.about-author-box .container-title, .trending-title { font-family : '{$allure_news_widget_font_family}'; }";
        }

        if(!empty($allure_news_widget_font_size)){
            $allure_news_custom_css .= ".widget-title .ct-title-head,
.about-author-box .container-title  { font-size : {$allure_news_widget_font_size}px; }";
        }

        if(!empty($allure_news_h1_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h1:not(.entry-title)  { font-size : {$allure_news_h1_font_size}px; }";
        }

        if(!empty($allure_news_h2_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h2  { font-size : {$allure_news_h2_font_size}px; }";
        }

        if(!empty($allure_news_h3_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h3  { font-size : {$allure_news_h3_font_size}px; }";
        }

        if(!empty($allure_news_h4_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h4  { font-size : {$allure_news_h4_font_size}px; }";
        }

        if(!empty($allure_news_h5_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h5  { font-size : {$allure_news_h5_font_size}px; }";
        }

        if(!empty($allure_news_h6_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h6  { font-size : {$allure_news_h6_font_size}px; }";
        }

        if(!empty($allure_news_site_title_font_size)){
            $allure_news_custom_css .= ".site-title  { font-size : {$allure_news_site_title_font_size}px; }";
        }

        if(!empty($allure_news_menu_font_size)){
            $allure_news_custom_css .= "#primary-menu a  { font-size : {$allure_news_menu_font_size}px; }";
        }

        if(!empty($allure_news_h1_line_height)){
            $allure_news_custom_css .= ".allure-news-content-area h1:not(.entry-title)  { line-height : {$allure_news_h1_line_height}; }";
        }

        if(!empty($allure_news_h2_line_height)){
            $allure_news_custom_css .= ".allure-news-content-area .entry-content h2  { line-height : {$allure_news_h2_line_height}; }";
        }

        if(!empty($allure_news_h3_line_height)){
            $allure_news_custom_css .= ".allure-news-content-area h3  { line-height : {$allure_news_h3_line_height}; }";
        }

        if(!empty($allure_news_h4_line_height)){
            $allure_news_custom_css .= ".allure-news-content-area h4  { line-height : {$allure_news_h4_line_height}; }";
        }

        if(!empty($allure_news_h5_line_height)){
            $allure_news_custom_css .= ".allure-news-content-area h5  { line-height : {$allure_news_h5_line_height}; }";
        }

        if(!empty($allure_news_h6_line_height)){
            $allure_news_custom_css .= ".allure-news-content-area h6  { line-height : {$allure_news_h6_line_height}; }";
        }

        if(!empty($allure_news_site_title_line_height)){
            $allure_news_custom_css .= ".site-title a, .site-title h1 { line-height : {$allure_news_site_title_line_height}; }";
        }

        if(!empty($allure_news_h1_letter_spacing)){
            $allure_news_custom_css .= ".allure-news-content-area h1:not(.entry-title)  { letter-spacing : {$allure_news_h1_letter_spacing}px; }";
        }

        if(!empty($allure_news_h2_letter_spacing)){
            $allure_news_custom_css .= ".allure-news-content-area h2  { letter-spacing : {$allure_news_h2_letter_spacing}px; }";
        }

        if(!empty($allure_news_h3_letter_spacing)){
            $allure_news_custom_css .= ".allure-news-content-area h3  { letter-spacing : {$allure_news_h3_letter_spacing}px; }";
        }

        if(!empty($allure_news_h4_letter_spacing)){
            $allure_news_custom_css .= ".allure-news-content-area h4  { letter-spacing : {$allure_news_h4_letter_spacing}px; }";
        }

        if(!empty($allure_news_h5_letter_spacing)){
            $allure_news_custom_css .= ".allure-news-content-area h5  { letter-spacing : {$allure_news_h5_letter_spacing}px; }";
        }

        if(!empty($allure_news_h6_letter_spacing)){
            $allure_news_custom_css .= ".allure-news-content-area h6  { letter-spacing : {$allure_news_h6_letter_spacing}px; }";
        }
        if(!empty($allure_news_site_title_letter_spacing)){
            $allure_news_custom_css .= ".site-title  { letter-spacing : {$allure_news_site_title_letter_spacing}px; }";
        }



        if(!empty($allure_news_line_height)){
            $allure_news_custom_css .= ".widget ul li, .allure-news-grid-post, .allure-news-featured-post, body { line-height : {$allure_news_line_height}; }";
        }

        if(!empty($allure_news_menu_line_height)){
            $allure_news_custom_css .= "#primary-menu li a { line-height : {$allure_news_menu_line_height}; }";
        }

        if(!empty($allure_news_widget_title_line_height)){
            $allure_news_custom_css .= ".widget-title .ct-title-head  { line-height : {$allure_news_widget_title_line_height}; }";
        }

        if(!empty($allure_news_letter_spacing)){
            $allure_news_custom_css .= ".widget ul li, .allure-news-grid-post, .allure-news-featured-post, body  { letter-spacing : {$allure_news_letter_spacing}px; }";
        }

        if(!empty($allure_news_menu_letter_spacing)){
            $allure_news_custom_css .= "#primary-menu li a  { letter-spacing : {$allure_news_menu_letter_spacing}px; }";
        }

        if(!empty($allure_news_widget_title_letter_spacing)){
            $allure_news_custom_css .= ".widget-title .ct-title-head  { letter-spacing : {$allure_news_widget_title_letter_spacing}px; }";
        }

        if(!empty($allure_news_theme_options['allure-news-enable-category-color']) && $allure_news_theme_options['allure-news-enable-category-color'] == 1){
            $enable_category_color = $allure_news_theme_options['allure-news-enable-category-color'];
            $args = array(
                'orderby' => 'id',
                'hide_empty' => 0
            );
            $categories = get_categories( $args );
            $wp_category_list = array();
            $i = 1;
            foreach ($categories as $category_list ) {
                $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

                $cat_color = 'cat-'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) );



                if(array_key_exists($cat_color, $allure_news_theme_options)) {
                    $cat_color_code = $allure_news_theme_options[$cat_color];
                    $allure_news_custom_css .= "
                    .cat-{$category_list->cat_ID} .ct-title-head,
                    .cat-{$category_list->cat_ID}.widget-title:before,
                     .cat-{$category_list->cat_ID} .widget-title:before,
                      .ct-cat-item-{$category_list->cat_ID}{
                    background: {$cat_color_code}!important;
                    }
                    ";
                     $allure_news_custom_css .= "
                    .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a.ct-tab-{$category_list->cat_ID} {
                    color: {$cat_color_code}!important;
                    }
                    ";
                }



                $i++;
            }
        }
        /*
        *Preloader Color Options
        */
        if(!empty($allure_news_theme_options['allure-news-spinning-first-color'])){
            $spininning_first_color = $allure_news_theme_options['allure-news-spinning-first-color'];
            $allure_news_custom_css .= "#loader {  border-top-color : {$spininning_first_color}; }";
        }
        if(!empty($allure_news_theme_options['allure-news-spinning-second-color'])){
            $spininning_second_color = $allure_news_theme_options['allure-news-spinning-second-color'];
            $allure_news_custom_css .= "#loader:before {  border-top-color : {$spininning_second_color}; }";
        }
        if(!empty($allure_news_theme_options['allure-news-spinning-third-color'])){
            $spininning_third_color = $allure_news_theme_options['allure-news-spinning-third-color'];
            $allure_news_custom_css .= "#loader:after {  border-top-color : {$spininning_third_color}; }";
        }

        /*
         *  Pro Color Options
         */
        //General Color
        if(!empty($allure_news_theme_options['allure-news-boxed-back-ground-color'])){
            $boxed_layout_bg = $allure_news_theme_options['allure-news-boxed-back-ground-color'];
            $allure_news_custom_css .= ".ct-boxed #page, .ct-boxed .site-header { background-color : {$boxed_layout_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-sidebar-background-color'])){
            $sidebar_bg = $allure_news_theme_options['allure-news-sidebar-background-color'];
            $allure_news_custom_css .= "#secondary { background-color : {$sidebar_bg}; padding: 20px; }";
        }


        if(!empty($allure_news_theme_options['allure-news-body-text-color'])){
            $body_text_color = $allure_news_theme_options['allure-news-body-text-color'];
            $allure_news_custom_css .= "body,.widget a, .widget a:visited, .slide-details a, .slide-details, .slide-details a:visited, .slide-details:hover a, #allure-news-breadcrumbs a, #allure-news-breadcrumbs a:visited, .entry-meta a, .entry-footer a, .entry-meta a:visited, .entry-footer a:visited, .entry-title, .entry-title a, .entry-title a:visited, a, a:visited, .related-post-entries .entry-meta, .related-post-entries, .related-post-entries a, .related-post-entries a:visited, .entry-content a.read-more-text{ color : {$body_text_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-body-link-color'])){
            $body_link_color = $allure_news_theme_options['allure-news-body-link-color'];
            $allure_news_custom_css .= ".entry-content a , .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a{ color : {$body_link_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-body-link-hover-color'])){
            $body_link_hover_color = $allure_news_theme_options['allure-news-body-link-hover-color'];
            $allure_news_custom_css .= ".entry-content a:hover, .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a:hover, .widget_allure_news_category_tabbed_widget.widget ul.ct-nav-tabs li a.active { color : {$body_link_hover_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-body-link-visited-color'])){
            $body_link_visited_color = $allure_news_theme_options['allure-news-body-link-visited-color'];
            $allure_news_custom_css .= ".entry-content a:visited { color : {$body_link_visited_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-enable-underline-link']) && $allure_news_theme_options['allure-news-enable-underline-link'] == true){
            $allure_news_custom_css .= ".entry-content a {  border-style: solid; border-width: 0 0 2px 0; } .entry-content a.read-more-text { border-style: none; } ";
        }
        if(!empty($allure_news_theme_options['allure-news-body-link-underline-color'])){
            $body_link_underline_color = $allure_news_theme_options['allure-news-body-link-underline-color'];
            $allure_news_custom_css .= ".entry-content a { border-color : {$body_link_underline_color}; }";
        }
        //Top Header Color
        if(!empty($allure_news_theme_options['allure-news-top-header-background-color'])){
            $top_header_bg = $allure_news_theme_options['allure-news-top-header-background-color'];
            $allure_news_custom_css .= ".top-bar { background-color : {$top_header_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-top-header-trending-background-color'])){
            $top_header_trending_bg = $allure_news_theme_options['allure-news-top-header-trending-background-color'];
            $allure_news_custom_css .= ".trending-title{ background-color : {$top_header_trending_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-top-header-trending-text-color'])){
            $top_header_trending_color = $allure_news_theme_options['allure-news-top-header-trending-text-color'];
            $allure_news_custom_css .= ".trending-title{ color : {$top_header_trending_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-top-header-text-color'])){
            $top_header_color = $allure_news_theme_options['allure-news-top-header-text-color'];
            $allure_news_custom_css .= ".top-bar, .top-bar a, .top-bar .allure-news-social-top .allure-news-menu-social li a:before{ color : {$top_header_color}; }";
        }
        if(!empty($allure_news_theme_options['allure-news-top-header-text-hover'])){
            $top_header_hover_color = $allure_news_theme_options['allure-news-top-header-text-hover'];
            $allure_news_custom_css .= ".top-bar .top-menu a:hover, .top-bar .top-menu a:visited:hover{ color : {$top_header_hover_color}; }";
        }

        //Menu Color
        if(!empty($allure_news_theme_options['allure-news-menu-background-color'])){
            $main_menu_bg = $allure_news_theme_options['allure-news-menu-background-color'];
            $allure_news_custom_css .= ".allure-news-menu-container{ background-color : {$main_menu_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-sub-menu-background-color'])){
            $main_submenu_bg = $allure_news_theme_options['allure-news-sub-menu-background-color'];
            $allure_news_custom_css .= ".main-navigation ul ul{ background-color : {$main_submenu_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-menu-text-color'])){
            $main_menu_color = $allure_news_theme_options['allure-news-menu-text-color'];
            $allure_news_custom_css .= ".main-navigation ul li a, .main-navigation ul li a:visited, .ct-menu-search .search-icon-box{ color : {$main_menu_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-menu-hover-color'])){
            $main_menu_hover_color = $allure_news_theme_options['allure-news-menu-hover-color'];
            $allure_news_custom_css .= ".main-navigation ul li a:hover, .main-navigation ul li a:visited:hover{ color : {$main_menu_hover_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-menu-active-color'])){
            $main_menu_active_color = $allure_news_theme_options['allure-news-menu-active-color'];
            $allure_news_custom_css .= ".main-navigation ul li.current-menu-item > a{ color : {$main_menu_active_color}; }";
        }

        //Featured Section Color
        if(!empty($allure_news_theme_options['allure-news-featured-text-color'])){
            $featured_title_color = $allure_news_theme_options['allure-news-featured-text-color'];
            $allure_news_custom_css .= ".allure-news-featured-block .ct-post-overlay .post-content .post-title a{ color : {$featured_title_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-featured-text-hover-color'])){
            $featured_title_hover = $allure_news_theme_options['allure-news-featured-text-hover-color'];
            $allure_news_custom_css .= ".allure-news-featured-block .ct-post-overlay .post-content .post-title a:hover{ color : {$featured_title_hover}; }";
        }

        //Footer Section Color
        if(!empty($allure_news_theme_options['allure-news-footer-background-color'])){
            $footer_section_bg = $allure_news_theme_options['allure-news-footer-background-color'];
            $allure_news_custom_css .= ".top-footer{ background-color : {$footer_section_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-text-color'])){
            $footer_section_color = $allure_news_theme_options['allure-news-footer-text-color'];
            $allure_news_custom_css .= ".site-footer{ color : {$footer_section_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-link-color'])){
            $footer_section_link_color = $allure_news_theme_options['allure-news-footer-link-color'];
            $allure_news_custom_css .= ".site-footer .top-footer a, .site-footer .top-footer a:visited{ color : {$footer_section_link_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-link-hover-color'])){
            $footer_section_hover_color = $allure_news_theme_options['allure-news-footer-link-hover-color'];
            $allure_news_custom_css .= ".site-footer .top-footer a:hover, .site-footer .top-footer a:visited:hover{ color : {$footer_section_hover_color}; }";
        }

        //Copyright Section Color
        if(!empty($allure_news_theme_options['allure-news-footer-cr-background-color'])){
            $copy_section_bg = $allure_news_theme_options['allure-news-footer-cr-background-color'];
            $allure_news_custom_css .= ".site-footer .site-info{ background-color : {$copy_section_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-cr-text-color'])){
            $copy_section_color = $allure_news_theme_options['allure-news-footer-cr-text-color'];
            $allure_news_custom_css .= ".site-footer .site-info{ color : {$copy_section_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-cr-link-color'])){
            $copy_section_link_color = $allure_news_theme_options['allure-news-footer-cr-link-color'];
            $allure_news_custom_css .= ".site-footer .site-info a, .site-footer .site-info a:visited{ color : {$copy_section_link_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-cr-link-hover-color'])){
            $copy_section_hover_color = $allure_news_theme_options['allure-news-footer-cr-link-hover-color'];
            $allure_news_custom_css .= ".site-footer .site-info a:hover, .site-footer .site-info a:visited:hover{ color : {$copy_section_hover_color}; }";
        }

        //Go to Top
        if(!empty($allure_news_theme_options['allure-news-footer-cr-to-top-background-color'])){
            $gototop_bg = $allure_news_theme_options['allure-news-footer-cr-to-top-background-color'];
            $allure_news_custom_css .= "#toTop{ background-color : {$gototop_bg}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-footer-cr-to-top-arrow-color'])){
            $gototop_color = $allure_news_theme_options['allure-news-footer-cr-to-top-arrow-color'];
            $allure_news_custom_css .= "#toTop{ color : {$gototop_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-logo-section-background'])){
            $logo_section_color = $allure_news_theme_options['allure-news-logo-section-background'];
            $allure_news_custom_css .= ".logo-wrapper-block{background-color : {$logo_section_color}; }";
        }

        if(!empty($allure_news_theme_options['allure-news-boxed-width-options'])){
            $box_width = absint($allure_news_theme_options['allure-news-boxed-width-options']);
            $allure_news_custom_css .= "@media (min-width: 1600px){.ct-boxed #page{max-width : {$box_width}px; }}";
            if($box_width < 1370){
                $allure_news_custom_css .= "@media (min-width: 1450px){.ct-boxed #page{max-width : {$box_width}px; }}";
            }
        }

        /* Blog TitleFont Option */
        $allure_news_blog_title_fonts = !empty($allure_news_theme_options['allure-news-font-blog-title-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-blog-title-family-url'] ) : '';
        $allure_news_blog_title_font_family = !empty($allure_news_google_fonts[$allure_news_blog_title_fonts] ) ? $allure_news_google_fonts[$allure_news_blog_title_fonts] : '';


        $allure_news_blog_title_font_size = !empty($allure_news_theme_options['allure-news-blog-title-font-size']) ? absint( $allure_news_theme_options['allure-news-blog-title-font-size'] ) : 36;

        $allure_news_blog_title_line_height = !empty($allure_news_theme_options['allure-news-blog-title-font-line-height']) ? esc_attr( $allure_news_theme_options['allure-news-blog-title-font-line-height'] ) : 1.5;
        $allure_news_blog_title_letter_spacing = !empty($allure_news_theme_options['allure-news-blog-title-letter-spacing']) ? absint( $allure_news_theme_options['allure-news-blog-title-letter-spacing'] ) : 0;


        if (!empty($allure_news_blog_title_font_family)) {
            $allure_news_custom_css .= " .allure-news-content-area .entry-title { font-family: '{$allure_news_blog_title_font_family}'; }";
        }

        if(!empty($allure_news_blog_title_font_size)){
            $allure_news_custom_css .= " .allure-news-content-area .entry-title  { font-size : {$allure_news_blog_title_font_size}px; }";
        }
        if(!empty($allure_news_blog_title_line_height)){
            $allure_news_custom_css .= " .allure-news-content-area .entry-title  { line-height : {$allure_news_blog_title_line_height}; }";
        }

        if(!empty($allure_news_blog_title_letter_spacing)){
            $allure_news_custom_css .= " .allure-news-content-area .entry-title  { letter-spacing : {$allure_news_blog_title_letter_spacing}px; }";
        }

        /* Blog Single Title Option */
        $allure_news_blog_single_title_fonts = !empty($allure_news_theme_options['allure-news-font-blog-single-title-family-url']) ? esc_attr( $allure_news_theme_options['allure-news-font-blog-single-title-family-url'] ) : '';
        $allure_news_blog_single_title_font_family = !empty($allure_news_google_fonts[$allure_news_blog_single_title_fonts]) ? $allure_news_google_fonts[$allure_news_blog_single_title_fonts] : '';


        $allure_news_blog_single_title_font_size = !empty($allure_news_theme_options['allure-news-blog-single-title-font-size']) ? absint( $allure_news_theme_options['allure-news-blog-single-title-font-size'] ) : 36;

        $allure_news_blog_single_title_line_height = !empty($allure_news_theme_options['allure-news-blog-single-title-font-line-height'] ) ? esc_attr( $allure_news_theme_options['allure-news-blog-single-title-font-line-height'] ) : 1.5;
        $allure_news_blog_single_title_letter_spacing = !empty($allure_news_theme_options['allure-news-blog-single-title-letter-spacing'] ) ? absint( $allure_news_theme_options['allure-news-blog-single-title-letter-spacing'] ) : 0;


        if (!empty($allure_news_blog_single_title_font_family)) {
            $allure_news_custom_css .= ".allure-news-content-area h1.entry-title { font-family: '{$allure_news_blog_single_title_font_family}'; }";
        }

        if(!empty($allure_news_blog_single_title_font_size)){
            $allure_news_custom_css .= ".allure-news-content-area h1.entry-title  { font-size : {$allure_news_blog_single_title_font_size}px; }";
        }
        if(!empty($allure_news_blog_single_title_line_height)){
            $allure_news_custom_css .= " .allure-news-content-area h1.entry-title { line-height : {$allure_news_blog_single_title_line_height}; }";
        }

        if(!empty($allure_news_blog_single_title_letter_spacing)){
            $allure_news_custom_css .= " .allure-news-content-area h1.entry-title  { letter-spacing : {$allure_news_blog_single_title_letter_spacing}px; }";
        }





        wp_add_inline_style('allure-news-style', $allure_news_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'allure_news_dynamic_css', 99);
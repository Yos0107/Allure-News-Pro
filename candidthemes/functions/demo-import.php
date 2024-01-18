<?php
/**
 * Demo Data of Allure News Pro.
 *
 * @package Allure News Pro
 */
/*Disable PT branding.*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
/**
 * Demo Data files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */
function allure_news_pro_import_files() {
    return array(
    array(
        'import_file_name'=> __('Default Demo','allure-news'),
        'categories'      =>  array( 'Pro Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ). 'candidthemes/dummy/default/default-pro.xml',
        'local_import_widget_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/default/default-pro.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/default/default-pro.dat',
        'import_preview_image_url'   => 'https://raw.githubusercontent.com/candidtheme/allure-news-demos/master/default-pro.jpg',
        'import_notice'              => __( 'Import the demo and check the options inside Appearance > Customize.', 'allure-news' ),
        'preview_url'                => 'https://allure.candidthemes.com/default-pro/',
    ),
    array(
        'import_file_name'=> __('Dark Demo','allure-news'),
        'categories'      =>  array( 'Pro Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ). 'candidthemes/dummy/dark/dark-pro.xml',
        'local_import_widget_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/dark/dark-pro.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/dark/dark-pro.dat',
        'import_preview_image_url'   => 'https://raw.githubusercontent.com/candidtheme/allure-news-demos/master/dark-pro.jpg',
        'import_notice'              => __( 'Import the demo and check the options inside Appearance > Customize.', 'allure-news' ),
        'preview_url'                => 'https://allure.candidthemes.com/dark-pro/',
    ),
    array(
        'import_file_name'=> __('Blog Demo','allure-news'),
        'categories'      =>  array( 'Pro Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ). 'candidthemes/dummy/blog/blog-pro.xml',
        'local_import_widget_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/blog/blog-pro.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/blog/blog-pro.dat',
        'import_preview_image_url'   => 'https://raw.githubusercontent.com/candidtheme/allure-news-demos/master/blog-pro.jpg',
        'import_notice'              => __( 'Import the demo and check the options inside Appearance > Customize.', 'allure-news' ),
        'preview_url'                => 'https://allure.candidthemes.com/blog-pro/',
    ),
    array(
        'import_file_name'=> __('Fashion Demo','allure-news'),
        'categories'      =>  array( 'Pro Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ). 'candidthemes/dummy/fashion/fashion-pro.xml',
        'local_import_widget_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/fashion/fashion-pro.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/fashion/fashion-pro.dat',
        'import_preview_image_url'   => 'https://raw.githubusercontent.com/candidtheme/allure-news-demos/master/fashion-pro.jpg',
        'import_notice'              => __( 'Import the demo and check the options inside Appearance > Customize.', 'allure-news' ),
        'preview_url'                => 'https://allure.candidthemes.com/fashion-pro/',
    ),
    array(
        'import_file_name'=> __('Full Width Demo','allure-news'),
        'categories'      =>  array( 'Pro Demo' ),
        'local_import_file'=> trailingslashit( get_template_directory() ). 'candidthemes/dummy/full-width/full-width-pro.xml',
        'local_import_widget_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/full-width/full-width-pro.wie',
        'local_import_customizer_file' =>  trailingslashit( get_template_directory() ) . 'candidthemes/dummy/full-width/full-width-pro.dat',
        'import_preview_image_url'   => 'https://raw.githubusercontent.com/candidtheme/allure-news-demos/master/full-width-pro.jpg',
        'import_notice'              => __( 'Import the demo and check the options inside Appearance > Customize.', 'allure-news' ),
        'preview_url'                => 'https://allure.candidthemes.com/full-width-pro/',
    ),
);

}
add_filter( 'pt-ocdi/import_files', 'allure_news_pro_import_files' );


/**
 * Demo Data after import.
 *
 * @since 1.0.0
 */

function candid_advanced_pro_toolset_after_import_setup() { 

    $primary_menu   = get_term_by('name', 'Primary', 'nav_menu');
    $header_menu    = get_term_by('name', 'Top', 'nav_menu');
    $social_menu    = get_term_by('name', 'Social', 'nav_menu');

        set_theme_mod(
            'nav_menu_locations',
            array(
                    'menu-1'     => $primary_menu->term_id,
                    'top-menu'  => $header_menu->term_id,
                    'social-menu' => $social_menu->term_id,
            )
        );
    
    }
add_action( 'pt-ocdi/after_import', 'candid_advanced_pro_toolset_after_import_setup' );
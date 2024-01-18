<?php
/**
 * Recommended plugins
 *
 * @package Allure News
 */

if ( ! function_exists( 'allure_news_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function allure_news_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'allure-news' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'allure_news_recommended_plugins' );

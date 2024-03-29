<?php
    /*
     * Customizer default value loaded here.
     */
    $default = allure_news_default_theme_options_values();
    /**
     * Load Typography Panel
     *
     * Manage Fonts
     */
    require get_template_directory() . '/candidthemes/customizer/customizer-typography.php';

    /**
         * Load Customizer Color
         *
         * Color Setting
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-colors.php';

    /**
     * Load Front page
     *
     * Manage Fonts
     */
    require get_template_directory() . '/candidthemes/customizer/customizer-front-page-options.php';

    /*
    * Theme Options Panel
    */
    $wp_customize->add_panel( 'allure_news_panel', array(
     'priority' => 27,
     'capability' => 'edit_theme_options',
     'title' => __( 'Allure News Settings', 'allure-news' ),
    ) );
        /**
         * Load Customizer Header Top setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-top-header.php';

        /**
         * Load Customizer Trending News setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-trending-news.php';

        /**
         * Load Customizer Trending News setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-menu-section.php';

        /**
        * Load Customizer Header Types setting
        *
        * Header Types section need to manage from here
        */
         require get_template_directory() . '/candidthemes/customizer/customizer-header-types.php';

         /**
         * Load Customizer Slider Setting
         *
         * Manage Carousel Slider from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-slider.php';


        /**
         * Load Customizer Logo setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-logo-options.php';

        /**
         * Load site layout setting
         *
         * site layout section can be managed from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-site-layout.php';

        /**
         * Load Customizer Header setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-header.php';

        /**
         * Load Customizer Sidebar setting
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-sidebar.php';

        /**
         * Load Customizer Category Color
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-category-color.php';

        /**
         * Load Customizer Blog Page Setting
         *
         * Manage Blog page
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-blog-page.php';

        /**
         * Load Customizer Single Page Setting
         *
         * Manage Single page
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-single-page.php';
        
        /**
         * Load Customizer Sticky Sidebar
         *
         * Manage Sticky Sidebar
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-sticky-sidebar.php';

         /**
         * Load Customizer Social Share
         *
         * Manage Social Share
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-social-share.php';


        /**
         * Load Customizer Footer
         *
         * Manage Footer
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-footer.php';

        /**
         * Load breadcrumb Settings
         *
         * Manage Breadcrumb
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-breadcrumb.php';


        /**
         * Load Preloader Settings
         *
         * Manage Extras
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-preloader.php';

        /**
         * Load Additonal Settings
         *
         * Manage Extras
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-additional.php';
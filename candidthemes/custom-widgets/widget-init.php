<?php

if ( ! function_exists( 'allure_news_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function allure_news_load_widgets() {

        // Highlight Post.
        register_widget( 'Allure_News_Featured_Post' );

        // Author Widget.
        register_widget( 'Allure_News_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Allure_News_Social_Widget' );

        // Post Slider Widget.
        register_widget( 'Allure_News_Post_Slider' );

        // Tabbed Widget.
        register_widget( 'Allure_News_Tabbed_Post' );

        // Three Category Column Widget.
        register_widget( 'Allure_News_Category_Column' );
    
        // Two Category Column Widget.
        register_widget( 'Allure_News_Category_Three_Column' );

        // Grid Layout Widget.
        register_widget( 'Allure_News_Grid_Post' );
    
        // Video Widget.
        register_widget( 'Allure_News_Video_Widget' );
        
        //Post Two Column
        register_widget( 'Allure_News_Posts_Two_Column' );
    
        //Category Tabbed Widget
        register_widget( 'Allure_News_Category_Tabbed_Widget' );

        //Category Tabbed Widget
        register_widget( 'Allure_News_Category_Tabbed_Post' );

        // Thumbnail Widget.
        register_widget( 'Allure_News_Thumb_Posts' );

        //Recent post widget
        register_widget('Allure_News_Recent_Post');

    }

endif;
add_action( 'widgets_init', 'allure_news_load_widgets' );
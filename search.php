<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Allure News
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

        /**
         * allure_news_before_main_content hook.
         *
         * @since 0.1
         */
        do_action( 'allure_news_before_main_content' );


        /**
         * allure_news_breadcrumb hook.
         *
         * @since 1.0
         * @hooked allure_news_construct_breadcrumb -  10
         *
         */
        do_action( 'allure_news_breadcrumb' );

        if ( have_posts() ) :
            ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'allure-news' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

            /**
             * allure_news_action_navigation hook
             * @since Allure News 1.0.0
             *
             * @hooked allure_news_posts_navigation -  10
             */
            do_action( 'allure_news_action_navigation');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

        /**
         * allure_news_after_main_content hook.
         *
         * @since 0.1
         */
        do_action( 'allure_news_after_main_content' );
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
/**
 * allure_news_sidebar hook
 * @since Allure News 1.0.0
 *
 * @hooked allure_news_sidebar -  10
 */
do_action( 'allure_news_sidebar');

get_footer();

<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Allure News
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses allure_news_header_style()
 */
function allure_news_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'allure_news_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'width'                  => 1990,
		'height'                 => 450,
		'flex-height'            => true,
		'wp-head-callback'       => 'allure_news_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'allure_news_custom_header_setup' );

if ( ! function_exists( 'allure_news_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see allure_news_custom_header_setup().
	 */
	function allure_news_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
        <?php endif; ?>
			.site-title a, .site-title{
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		</style>
		<?php
	}
endif;

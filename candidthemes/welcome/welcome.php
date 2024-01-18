<?php
/**
 * Allure News Pro 
*/

/**
 * Add a new page under Appearance
 */
function allure_news_menu() {
	add_theme_page( __( 'About Allure News Pro', 'allure-news' ), __( 'About Allure News Pro', 'allure-news' ), 'edit_theme_options', 'welcome-page', 'allure_news_page' );
}
add_action( 'admin_menu', 'allure_news_menu' );

/**
 * Enqueue styles for the help page.
 */
function allure_news_admin_scripts( $hook ) {
	if ( 'appearance_page_allure_news' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'allure-news-admin-style', get_template_directory_uri() . '/candidthemes/welcome/welcome.css', array(), '' );
}
add_action( 'admin_enqueue_scripts', 'allure_news_admin_scripts' );

/**
 * Add the theme page
 */
function allure_news_page() {
	?>
	<div class="candid-about-wrap">
		<div class="allure-news-setting">
			<p>
			<?php esc_html_e( 'A clean and minimal WordPress premium magazine theme.', 'allure-news' ); ?></p>
			<a class="button button-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options and Settings', 'allure-news' ); ?></a>
		</div>

		<div class="allure-news-panel">
			<div class="allure-news-docs">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Theme Documentation with Video', 'allure-news' ); ?></h3>
				</div>
				<a href="http://docs.candidthemes.com/allure-news-pro" target="_blank" class="button button-secondary"><?php esc_html_e( 'Video Documentation', 'allure-news' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}

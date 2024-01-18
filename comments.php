<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure News
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
global $allure_news_theme_options;
$show_comment_form =  $allure_news_theme_options['allure-news-enable-single-comments-form'];
$comment_form_location = $allure_news_theme_options['allure-news-enable-single-comments-form-move'];
?>

<div id="comments" class="comments-area">

	<?php
    if(($show_comment_form == true) && ($comment_form_location == 'move-top')){
        ?>
        <div class="allure-news-comment-form">
            <?php comment_form(); ?>
        </div>
    <?php
    }
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$allure_news_comment_count = get_comments_number();
			if ( '1' === $allure_news_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'allure-news' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $allure_news_comment_count, 'comments title', 'allure-news' ) ),
					number_format_i18n( $allure_news_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
                'callback' => 'allure_news_commment_list'
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'allure-news' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

    if(($show_comment_form == true) && ($comment_form_location == 'default')) {
        comment_form();
    }
	?>
</div><!-- #comments -->
<?php
/**
 * Metabox for video
 *
 * @package Allure News
 */
if( !class_exists( 'Allure_News_Video_Url_Metabox') ){
    /**
     * Metabox for video on single page.
     *
     * @since Allure News 1.0.0
     */
    class Allure_News_Video_Url_Metabox {
        
        public function __construct()
        {
            
            add_action( 'add_meta_boxes', array( $this, 'allure_news_video_metabox') );
            
            add_action( 'save_post', array( $this, 'allure_news_save_video_value') );
        }
        
        
        public function allure_news_video_metabox()
        {
            
            add_meta_box(
                'allure_news_video',
                esc_html__('Youtube/Vimeo Video Link', 'allure-news'),
                array(
                    $this, 'allure_news_generate_video'),
                'post',
                'normal',
                'high'
            );
        }
        
        public function allure_news_generate_video($post)
        {
            $values = get_post_meta( $post->ID, 'allure_news_video', true );
            wp_nonce_field( basename(__FILE__), 'allure_news_fontawesome_fields_nonce');
            ?>
            
            <input type="text" class="widefat" name="video" value="<?php echo esc_html($values) ?>" />
            <?php
        }
        
        public function allure_news_save_video_value($post_id)
        {
            
            /*
                * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
                *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
                * */
            if (
                !isset($_POST['allure_news_fontawesome_fields_nonce']) ||
                !wp_verify_nonce($_POST['allure_news_fontawesome_fields_nonce'], basename(__FILE__)) || /*Protecting against unwanted requests*/
                (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || /*Dealing with autosaves*/
                !current_user_can('edit_post', $post_id)/*Verifying access rights*/
            ) {
                return;
            }
            
            //Execute this saving function
            if (isset($_POST['video']) && !empty($_POST['video'])) {
                $fontawesomeclass = sanitize_text_field( $_POST['video'] );
                update_post_meta($post_id, 'allure_news_video', $fontawesomeclass);
            }
        }
    }
}
$Url_Metabox = new Allure_News_Video_Url_Metabox;
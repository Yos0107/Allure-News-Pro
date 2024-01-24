<?php

/**
 * Front page hook for all WordPress Conditions
 *
 * @param null
 * @return null
 *
 * @since Allure News 1.1.0
 *
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('allure_news_front_page')) :

    function allure_news_front_page()
    {

        if (is_active_sidebar('allure-news-home-widget-area')) {
            dynamic_sidebar('allure-news-home-widget-area');
        }
        global $allure_news_theme_options;
        $allure_news_front_page_content = !empty($allure_news_theme_options['allure-news-front-page-content']) ? $allure_news_theme_options['allure-news-front-page-content'] : '';

        if (false == $allure_news_front_page_content) {
            if ('posts' == get_option('show_on_front')) {
                if (have_posts()) :
                    /* Start the Loop */

                    $blog_layout = !empty($allure_news_theme_options['allure-news-blog-layout']) ? $allure_news_theme_options['allure-news-blog-layout'] : '';
                    $blog_column_layout = !empty($allure_news_theme_options['allure-news-column-blog-page']) ? $allure_news_theme_options['allure-news-column-blog-page'] : '';
                    if (($blog_layout == 'masonry') && ($blog_column_layout != 'one-column')) {
                        $blog_layout_class = 'ct-masonry';
                    } else {
                        $blog_layout_class = '';
                    }
                    echo "<div class='allure-news-article-wrapper allure-front-loop-block clearfix " . $blog_layout_class . "'>";
                    while (have_posts()) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                    endwhile;
                    echo '</div>';
                    /**
                     * allure_news_post_navigation hook
                     * @since Allure News 1.0.0
                     *
                     * @hooked allure_news_posts_navigation -  10
                     */
                    do_action('allure_news_action_navigation');

                else :
                    get_template_part('template-parts/content', 'none');
                endif;
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                endwhile; // End of the loop.
            }
        }
    }

endif;
add_action('allure_news_action_front_page', 'allure_news_front_page', 10);

/**
 * Function to list categories of a post
 *
 * @param int $post_id
 * @return void Lists of categories with its link
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_list_category')) :
    function allure_news_list_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            if (isset($post->ID)) {
                $post_id = $post->ID;
            }
        }
        if (0 == $post_id) {
            return null;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if ($categories) {
            $output .= '<span class="cat-name"><i class="fa fa-folder-open"></i>';
            foreach ($categories as $category) {
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;
            }
            $output .= '</span>';
            echo trim($output, $separator);
        }
    }
endif;


/**
 * Function to modify tag clouds font size
 *
 * @param none
 * @return array $args
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_tag_cloud_widget')) :
    function allure_news_tag_cloud_widget($args)
    {
        $args['largest'] = 12; //largest tag
        $args['smallest'] = 12; //smallest tag
        $args['unit'] = 'px'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'allure_news_tag_cloud_widget');


/**
 * Callback functions for comments
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_commment_list')) :

    function allure_news_commment_list($comment, $args, $depth)
    {
        $args['avatar_size'] = apply_filters('allure_news_comment_avatar_size', 50);

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
  <div class="comment-body">
    <?php _e('Pingback:', 'allure-news'); // WPCS: XSS OK. 
                    ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'allure-news'), '<span class="edit-link">', '</span>'); ?>
  </div>

  <?php else : ?>

<li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
  <article id="div-comment-<?php comment_ID(); ?>" class="comment-body"
    <?php allure_news_do_microdata('comment-body'); ?>>
    <footer class="comment-meta">
      <?php
                        if (0 != $args['avatar_size']) {
                            echo get_avatar($comment, $args['avatar_size']);
                        }
                        ?>
      <div class="comment-author-info">
        <div class="comment-author vcard" <?php allure_news_do_microdata('comment-author'); ?>>
          <?php printf('<span itemprop="name" class="fn"><strong>%s</strong></span>', get_comment_author_link()); ?>
        </div><!-- .comment-author -->

        <div class="entry-meta comment-metadata">
          <span><i class="fa fa-calendar"></i><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
              <time datetime="<?php comment_time('c'); ?>" itemprop="datePublished">
                <?php printf( // WPCS: XSS OK.
                                                /* translators: 1: date, 2: time */
                                                _x('%1$s at %2$s', '1: date, 2: time', 'allure-news'),
                                                get_comment_date(),
                                                get_comment_time()
                                            ); ?>s
              </time>
            </a></span>
          <?php edit_comment_link(__('Edit', 'allure-news'), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>'); ?>
          <?php
                                comment_reply_link(array_merge($args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<span class="reply"><i class="fa fa-comment-o"></i> ',
                                    'after' => '</span>',
                                )));
                                ?>
        </div><!-- .comment-metadata -->
      </div><!-- .comment-author-info -->

      <?php if ('0' == $comment->comment_approved) : ?>
      <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'allure-news'); // WPCS: XSS OK. 
                                                                    ?></p>
      <?php endif; ?>
    </footer><!-- .comment-meta -->

    <div class="comment-content" itemprop="text">
      <?php comment_text(); ?>
    </div><!-- .comment-content -->
  </article><!-- .comment-body -->
  <?php
        endif;
    }
endif;

/**
 * Add sidebar class in body
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_custom_body_class')) :
    function allure_news_custom_body_class($classes)
    {
        global $allure_news_theme_options;
        $allure_news_sidebar = !empty($allure_news_theme_options['allure-news-sidebar-archive-page']) ?  $allure_news_theme_options['allure-news-sidebar-archive-page'] : '';
        if (is_singular()) {
            $allure_news_sidebar = !empty($allure_news_theme_options['allure-news-sidebar-blog-page']) ? $allure_news_theme_options['allure-news-sidebar-blog-page'] : '';
            global $post;
            $single_sidebar = get_post_meta($post->ID, 'allure_news_sidebar_layout', true);
            if (('default-sidebar' != $single_sidebar) && (!empty($single_sidebar))) {
                $allure_news_sidebar = $single_sidebar;
            }
        }
        if (is_front_page()) {
            $allure_news_sidebar = !empty($allure_news_theme_options['allure-news-sidebar-front-page']) ? $allure_news_theme_options['allure-news-sidebar-front-page'] : '';
        }
        $allure_news_sticky_sidebar = !empty($allure_news_theme_options['allure-news-enable-sticky-sidebar']) ? $allure_news_theme_options['allure-news-enable-sticky-sidebar'] : '';
        $allure_news_site_color_mode = !empty($allure_news_theme_options['allure-news-site-dark-light-layout-options']) ? $allure_news_theme_options['allure-news-site-dark-light-layout-options'] : '';
        $allure_news_site_layout = !empty($allure_news_theme_options['allure-news-site-layout-options']) ? $allure_news_theme_options['allure-news-site-layout-options'] : '';
        $body_background = esc_attr(get_background_color());
        if ($body_background != 'fff' && $body_background != 'ffffff') {
            $classes[] = 'ct-bg';
        }
        if ($allure_news_site_layout == 'boxed') {
            $classes[] = 'ct-boxed';
        } else {
            $classes[] = 'ct-full-layout';
        }
        if ($allure_news_site_color_mode == 'dark-layout') {
            $classes[] = 'ct-dark-mode';
        }
        if ($allure_news_sticky_sidebar == 1) {
            $classes[] = 'ct-sticky-sidebar';
        }
        if ($allure_news_sidebar == 'no-sidebar') {
            $classes[] = 'no-sidebar';
        } elseif ($allure_news_sidebar == 'left-sidebar') {
            $classes[] = 'left-sidebar';
        } elseif ($allure_news_sidebar == 'middle-column') {
            $classes[] = 'middle-column';
        } else {
            $classes[] = 'right-sidebar';
        }
        if (!empty($allure_news_theme_options['allure-news-font-awesome-version-loading'])) {
            $classes[] = 'allure-news-fontawesome-' . $allure_news_theme_options['allure-news-font-awesome-version-loading'];
        }
        return $classes;
    }
endif;

add_filter('body_class', 'allure_news_custom_body_class');

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 *
 */
if (!function_exists('allure_news_excerpt_more')) :
    function allure_news_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'allure_news_excerpt_more');


/**
 * Add class in post list
 *
 * @since 1.0.0
 *
 */
add_filter('post_class', 'allure_news_post_column_class');
function allure_news_post_column_class($classes)
{
    global $allure_news_theme_options;
    if (!is_singular()) {
        $classes[] = esc_attr($allure_news_theme_options['allure-news-column-blog-page']);
    }
    return $classes;
}

/**
 * Google Fonts
 *
 * @param null
 * @return array
 *
 * @since Allure News 1.0.0
 *
 */
if (!function_exists('allure_news_google_fonts')) :
    function allure_news_google_fonts()
    {
        $allure_news_google_fonts = array(
            'ABeeZee:400,400italic' => 'ABeeZee',
            'Abel' => 'Abel',
            'Abril+Fatface' => 'Abril Fatface',
            'Aldrich' => 'Aldrich',
            'Alegreya:400,400italic,700,900' => 'Alegreya',
            'Alex+Brush' => 'Alex Brush',
            'Alfa+Slab+One' => 'Alfa Slab One',
            'Amaranth:400,400italic,700' => 'Amaranth',
            'Andada' => 'Andada',
            'Anton' => 'Anton',
            'Archivo+Black' => 'Archivo Black',
            'Archivo+Narrow:400,400italic,700' => 'Archivo Narrow',
            'Arimo:400,400italic,700' => 'Arimo',
            'Arvo:400,400italic,700' => 'Arvo',
            'Asap:400,400italic,700' => 'Asap',
            'Bangers' => 'Bangers',
            'BenchNine:400,700' => 'BenchNine',
            'Bevan' => 'Bevan',
            'Bitter:400,400italic,700' => 'Bitter',
            'Bree+Serif' => 'Bree Serif',
            'Cabin:400,400italic,500,600,700' => 'Cabin',
            'Cabin+Condensed:400,500,600,700' => 'Cabin Condensed',
            'Cantarell:400,400italic,700' => 'Cantarell',
            'Carme' => 'Carme',
            'Cherry+Cream+Soda' => 'Cherry Cream Soda',
            'Cinzel:400,700,900' => 'Cinzel',
            'Comfortaa:400,300,700' => 'Comfortaa',
            'Cookie' => 'Cookie',
            'Covered+By+Your+Grace' => 'Covered By Your Grace',
            'Crete+Round:400,400italic' => 'Crete Round',
            'Crimson+Text:400,400italic,600,700' => 'Crimson Text',
            'Cuprum:400,400italic' => 'Cuprum',
            'Dancing+Script:400,700' => 'Dancing Script',
            'Didact+Gothic' => 'Didact Gothic',
            'Droid+Sans:400,700' => 'Droid Sans',
            'Domine' => 'Domine',
            'Dosis:400,300,600,800' => 'Dosis',
            'Droid+Serif:400,400italic,700' => 'Droid Serif',
            'Economica:400,700,400italic' => 'Economica',
            'EB+Garamond' => 'EB Garamond',
            'Exo:400,300,400italic,600,800' => 'Exo',
            'Exo +2:400,300,400italic,600,700,900' => 'Exo 2',
            'Fira+Sans:400,500' => 'Fira Sans',
            'Fjalla+One' => 'Fjalla One',
            'Francois+One' => 'Francois One',
            'Fredericka+the+Great' => 'Fredericka the Great',
            'Fredoka+One' => 'Fredoka One',
            'Fugaz+One' => 'Fugaz One',
            'Great+Vibes' => 'Great Vibes',
            'Handlee' => 'Handlee',
            'Hammersmith+One' => 'Hammersmith One',
            'Hind:400,300,600,700' => 'Hind',
            'Inconsolata:400,700' => 'Inconsolata',
            'Indie+Flower' => 'Indie Flower',
            'Istok+Web:400,400italic,700' => 'Istok Web',
            'Josefin+Sans:400,600,700,400italic' => 'Josefin Sans',
            'Josefin+Slab:400,400italic,700,600' => 'Josefin Slab',
            'Jura:400,300,500,600' => 'Jura',
            'Karla:400,400italic,700' => 'Karla',
            'Kaushan+Script' => 'Kaushan Script',
            'Kreon:400,300,700' => 'Kreon',
            'Lateef' => 'Lateef',
            'Lato:400,300,400italic,900,700' => 'Lato',
            'Libre+Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Limelight' => 'Limelight',
            'Lobster' => 'Lobster',
            'Lobster+Two:400,700,700italic' => 'Lobster Two',
            'Lora:400,400i' => 'Lora',
            'Maven+Pro:400,500,700,900' => 'Maven Pro',
            'Merriweather:400,400italic,300,900,700' => 'Merriweather',
            'Merriweather+Sans:400,400italic,700,800' => 'Merriweather Sans',
            'Monda:400,700' => 'Monda',
            'Montserrat:400,700' => 'Montserrat',
            'Muli:400,300italic,300' => 'Muli',
            'News+Cycle:400,700' => 'News Cycle',
            'Noticia+Text:400,400italic,700' => 'Noticia Text',
            'Noto +Sans:400,400italic,700' => 'Noto Sans',
            'Noto +Serif:400,400italic,700' => 'Noto Serif',
            'Nunito:400,300,700' => 'Nunito',
            'Old+Standard +TT:400,400italic,700' => 'Old Standard TT',
            'Open+Sans:400,400italic,600,700' => 'Open Sans',
            'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed',
            'Oswald:400,300,700' => 'Oswald',
            'Oxygen:400,300,700' => 'Oxygen',
            'Pacifico' => 'Pacifico',
            'Passion+One:400,700,900' => 'Passion One',
            'Pathway+Gothic+One' => 'Pathway Gothic One',
            'Patua+One' => 'Patua One',
            'Poiret+One' => 'Poiret One',
            'Pontano+Sans' => 'Pontano Sans',
            'Play:400,700' => 'Play',
            'Playball' => 'Playball',
            'Playfair+Display:400,400italic,700,900' => 'Playfair Display',
            'PT+Sans:400,400italic,700' => 'PT Sans',
            'PT+Sans+Caption:400,700' => 'PT Sans Caption',
            'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
            'PT+Serif:400,400italic,700' => 'PT Serif',
            'Quattrocento+Sans:400,700,400italic' => 'Quattrocento Sans',
            'Questrial' => 'Questrial',
            'Quicksand:400,700' => 'Quicksand',
            'Raleway:400,300,500,600,700,900' => 'Raleway',
            'Righteous' => 'Righteous',
            'Roboto:400,500,300,700,400italic' => 'Roboto',
            'Roboto+Condensed:400,300,400italic,700' => 'Roboto Condensed',
            'Roboto+Slab:400,300,700' => 'Roboto Slab',
            'Rokkitt:400,700' => 'Rokkitt',
            'Ropa+Sans:400,400italic' => 'Ropa Sans',
            'Russo+One' => 'Russo One',
            'Sanchez:400,400italic' => 'Sanchez',
            'Satisfy' => 'Satisfy',
            'Shadows+Into+Light' => 'Shadows Into Light',
            'Sigmar+One' => 'Sigmar One',
            'Signika:400,300,700' => 'Signika',
            'Six+Caps' => 'Six Caps',
            'Slabo+27px' => 'Slabo 27px',
            'Source+Sans+Pro:400,400italic,600,900,300' => 'Source Sans Pro',
            'Squada+One' => 'Squada One',
            'Tangerine:400,700' => 'Tangerine',
            'Tinos:400,400italic,700' => 'Tinos',
            'Titillium+Web:400,300,400italic,700,900' => 'Titillium Web',
            'Ubuntu:400,400italic,500,700' => 'Ubuntu',
            'Ubuntu+Condensed' => 'Ubuntu Condensed',
            'Varela+Round' => 'Varela Round',
            'Vollkorn:400,400italic,700' => 'Vollkorn',
            'Voltaire' => 'Voltaire',
            'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz',
            'Cairo' => 'Cairo',
            'Amiri' => 'Amiri',
            'El+Messiri' => 'El Messiri',
            'Lalezar' => 'Lalezar',
            'Scheherazade' => 'Scheherazade',
        );
        return apply_filters('allure_news_google_fonts', $allure_news_google_fonts);
    }
endif;


/**
 * Enqueue the list of fonts.
 */
function allure_news_customizer_fonts()
{
    wp_enqueue_style('allure_news_customizer_fonts', 'https://fonts.googleapis.com/css?family=ABeeZee|Abel|Abril+Fatface|Aldrich|Alegreya|Alex+Brush|Alfa+Slab+One|Amaranth|Andada|Anton|Archivo+Black|Archivo+Narrow|Arimo|Arimo|Arvo|Asap|Bangers|BenchNine|Bevan|Bitter|Bree+Serif|Cabin|Cabin+Condensed|Cantarell|Carme|Cherry+Cream+Soda|Cinzel|Comfortaa|Cookie|Covered+By+Your+Grace|Crete+Round|Crimson+Text|Cuprum|Dancing+Script|Didact+Gothic|Droid+Sans|Domine|Dosis|Droid+Serif|Economica|EB+Garamond|Exo|Exo|Fira+Sans|Fjalla+One|Francois+One|Fredericka+the+Great|Fredoka+One|Fugaz+One|Great+Vibes|Handlee|Hammersmith+One|Hind|Inconsolata|Indie+Flower|Istok+Web|Josefin+Sans|Josefin+Slab|Jura|Karla|Kaushan+Script|Kreon|Lateef|Lato|Lato|Libre+Baskerville|Limelight|Lobster|Lobster+Two|Lora|Maven+Pro|Merriweather|Merriweather+Sans|Monda|Montserrat|Muli|News+Cycle|Noticia+Text|Noto+Sans|Noto+Serif|Nunito|Old+Standard +TT|Open+Sans|Open+Sans+Condensed|Oswald|Oxygen|Pacifico|Passion+One|Passion One|Pathway+Gothic+One|Patua+One|Poiret+One|Pontano+Sans|Play|Playball|Playfair+Display|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Quattrocento+Sans|Questrial|Quicksand|Raleway|Righteous|Roboto|Roboto+Condensed|Roboto+Slab|Rokkitt|Ropa+Sans|Russo+One|Sanchez|Satisfy|Shadows+Into+Light|Sigmar+One|Signika|Six+Caps|Slabo+27px|Source+Sans+Pro|Squada+One|Tangerine|Tinos|Titillium+Web|Ubuntu|Ubuntu+Condensed|Varela+Round|Vollkorn|Voltaire|Yanone+Kaffeesatz|Cairo|Amiri|El+Messiri|Lalezar|Scheherazade', array(), null);
}

add_action('customize_controls_print_styles', 'allure_news_customizer_fonts');
add_action('customize_preview_init', 'allure_news_customizer_fonts');

add_action(
    'customize_controls_print_styles',
    function () {
        ?>
  <style>
  <?php $arr=array('ABeeZee', 'Abel', 'Abril+Fatface', 'Aldrich', 'Alegreya', 'Alex+Brush', 'Alfa+Slab+One', 'Amaranth', 'Andada', 'Anton', 'Archivo+Black', 'Archivo+Narrow', 'Arimo', 'Arimo', 'Arvo', 'Asap', 'Bangers', 'BenchNine', 'Bevan', 'Bitter', 'Bree+Serif', 'Cabin', 'Cabin+Condensed', 'Cantarell', 'Carme', 'Cherry+Cream+Soda', 'Cinzel', 'Comfortaa', 'Cookie', 'Covered+By+Your+Grace', 'Crete+Round', 'Crimson+Text', 'Cuprum', 'Dancing+Script', 'Didact+Gothic', 'Droid+Sans', 'Domine', 'Dosis', 'Droid+Serif', 'Economica', 'EB+Garamond', 'Exo', 'Exo', 'Fira+Sans', 'Fjalla+One', 'Francois+One', 'Fredericka+the+Great', 'Fredoka+One', 'Fugaz+One', 'Great+Vibes', 'Handlee', 'Hammersmith+One', 'Hind', 'Inconsolata', 'Indie+Flower', 'Istok+Web', 'Josefin+Sans', 'Josefin+Slab', 'Jura', 'Karla', 'Kaushan+Script', 'Kreon', 'Lateef', 'Lato', 'Lato', 'Libre+Baskerville', 'Limelight', 'Lobster', 'Lobster+Two', 'Lora', 'Maven+Pro', 'Merriweather', 'Merriweather+Sans', 'Monda', 'Montserrat', 'Muli', 'News+Cycle', 'Noticia+Text', 'Noto+Sans', 'Noto+Serif', 'Nunito', 'Old+Standard +TT', 'Open+Sans', 'Open+Sans+Condensed', 'Oswald', 'Oxygen', 'Pacifico', 'Passion+One', 'Passion One', 'Pathway+Gothic+One', 'Patua+One', 'Poiret+One', 'Pontano+Sans', 'Play', 'Playball', 'Playfair+Display', 'PT+Sans', 'PT+Sans+Caption', 'PT+Sans+Narrow', 'PT+Serif', 'Quattrocento+Sans', 'Questrial', 'Quicksand', 'Raleway', 'Righteous', 'Roboto', 'Roboto+Condensed', 'Roboto+Slab', 'Rokkitt', 'Ropa+Sans', 'Russo+One', 'Sanchez', 'Satisfy', 'Shadows+Into+Light', 'Sigmar+One', 'Signika', 'Six+Caps', 'Slabo+27px', 'Source+Sans+Pro', 'Squada+One', 'Tangerine', 'Tinos', 'Titillium+Web', 'Ubuntu', 'Ubuntu+Condensed', 'Varela+Round', 'Vollkorn', 'Voltaire', 'Yanone+Kaffeesatz', 'Cairo', 'Amiri', 'El+Messiri', 'Lalezar', 'Scheherazade');

  foreach ($arr as $font) {
    $font_family=str_replace("+", " ", $font);
    echo '.customize-control select option[value*="'. $font . '"] {font-family: '. $font_family . '; font-size: 22px;}';
  }

  ?>
  </style>
  <?php
    }
);


if (!function_exists('allure_news_editor_assets')) {
    /**
     * Add styles and fonts for the editor.
     */
    function allure_news_editor_assets()
    {
        wp_enqueue_style('allure-news-fonts', allure_news_fonts_url(), array(), null);
        wp_enqueue_style('allure-news-blocks', get_theme_file_uri('/candidthemes/assets/css/block-editor.css'), false);
    }

    add_action('enqueue_block_editor_assets', 'allure_news_editor_assets');
}


/**
 * Post Formats
 *
 * @since  Allure News 1.0.0
 */
if (!function_exists('allure_news_post_formats')) :
    function allure_news_post_formats($post_id)
    {
        global $allure_news_theme_options;
        $hide_post_format_icon = !empty($allure_news_theme_options['allure-news-extra-post-formats-icons']) ? $allure_news_theme_options['allure-news-extra-post-formats-icons'] : '';
        if ($hide_post_format_icon != 1) :
            $post_formats = get_post_format($post_id);
            switch ($post_formats) {
                case "image":
                    $post_formats = "<div class='candid-allure-post-format'><i class='fa fa-image'></i></div>";
                    break;
                case "video":
                    $post_formats = "<div class='candid-allure-post-format'><i class='fa fa-video-camera'></i></div>";

                    break;
                case "gallery":
                    $post_formats = "<div class='candid-allure-post-format'><i class='fa fa-camera'></i></div>";
                    break;
                case "audio":
                    $post_formats = "<div class='candid-allure-post-format'><i class='fa fa-volume-up'></i></div>";
                    break;
                default:
                    $post_formats = "";
            }

            echo $post_formats;
        endif;
    }

endif;


/* Word read count Pagination */
if (!function_exists('allure_news_read_time_words_count')) :
    /**
     * @param $content
     *
     * @return string
     */
    function allure_news_read_time_words_count($post_id)
    {
        global $allure_news_theme_options;
        $allure_news_read_time = !empty($allure_news_theme_options['allure-news-extra-hide-read-time']) ? $allure_news_theme_options['allure-news-extra-hide-read-time'] : '';
        if ($allure_news_read_time != 1) {
            allure_news_read_time($post_id);
        }
    }

endif;


/* Word read count Pagination */
if (!function_exists('allure_news_read_time_slider')) :
    /**
     * @param $content
     *
     * @return string
     */
    function allure_news_read_time_slider($post_id)
    {
        global $allure_news_theme_options;
        $allure_news_read_time = !empty($allure_news_theme_options['allure-news-slider-post-read-time']) ? $allure_news_theme_options['allure-news-slider-post-read-time'] : '';
        if ($allure_news_read_time == 1) {
            allure_news_read_time($post_id);
        }
    }

endif;


/* Word read count Pagination */
if (!function_exists('allure_news_read_time')) :
    /**
     * @param $content
     *
     * @return string
     */
    function allure_news_read_time($post_id)
    {
        global $allure_news_theme_options;
        $content = apply_filters('the_content', get_post_field('post_content', $post_id));
        $read_words = !empty($allure_news_theme_options['allure-news-extra-hide-read-time-words']) ? $allure_news_theme_options['allure-news-extra-hide-read-time-words'] : '';
        $decode_content = html_entity_decode($content);
        $filter_shortcode = do_shortcode($decode_content);
        $strip_tags = wp_strip_all_tags($filter_shortcode, true);
        $count = str_word_count($strip_tags);
        if (absint($count) > 0 && absint($read_words) > 0) {
            $word_per_min = (absint($count) / $read_words);
            $word_per_min = ceil($word_per_min);

            if (absint($word_per_min) > 0) {
                $word_count_strings = sprintf(_n('%s min read', '%s min read', number_format_i18n($word_per_min), 'allure-news'), number_format_i18n($word_per_min));
                if ('post' == get_post_type($post_id)) :
                    echo '<span class="min-read"><i class="fa fa-clock-o" aria-hidden="true"></i>';
                    echo esc_html($word_count_strings);
                    echo '</span>';
                endif;
            }
        }
    }

endif;

if (!function_exists('allure_news_add_menu_description')) :
    function allure_news_add_menu_description($item_output, $item, $depth, $args)
    {
        global $allure_news_theme_options;

        if (!empty($allure_news_theme_options['allure-news-disable-menu-description']) && $allure_news_theme_options['allure-news-disable-menu-description'] == 1 && 'menu-1' == $args->theme_location  && $item->description)
            $item_output = str_replace('</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output);

        return $item_output;
    }
endif;
add_filter('walker_nav_menu_start_el', 'allure_news_add_menu_description', 10, 4);


/**
 * Custom theme hooks for Users Info
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Allure News
 */
if (!function_exists('allure_news_user_contact_methods')) :

    /**
     * Added For Author Page
     *
     * @since 1.0.0
     */

    // Register User Contact Methods
    function allure_news_user_contact_methods($user_contact_method)
    {

        $user_contact_method['facebook'] = __('Enter Facebook Url', 'allure-news');
        $user_contact_method['twitter'] = __('Enter Twitter Url', 'allure-news');
        $user_contact_method['linkedin'] = __('Enter Linkedin Url', 'allure-news');
        $user_contact_method['youtube'] = __('Enter Youtube Url', 'allure-news');
        $user_contact_method['google_plus'] = __('Enter Google Plus Url', 'allure-news');
        $user_contact_method['instagram'] = __('Enter Instagram Url', 'allure-news');
        $user_contact_method['pinterest'] = __('Enter Pinterest Url', 'allure-news');
        $user_contact_method['flickr'] = __('Enter Flickr Url', 'allure-news');
        $user_contact_method['tumblr'] = __('Enter Tumblr Url', 'allure-news');
        $user_contact_method['vk'] = __('Enter VK Url', 'allure-news');
        $user_contact_method['wordpress'] = __('Enter WordPress Url', 'allure-news');

        return $user_contact_method;
    }

    add_filter('user_contactmethods', 'allure_news_user_contact_methods');
endif;

if (!function_exists('allure_news_show_author_links')) :

    function allure_news_show_author_links()
    {
        $user_url = get_the_author_meta('user_url');
        $facebook = get_the_author_meta('facebook');
        $twitter = get_the_author_meta('twitter');
        $linkedin = get_the_author_meta('linkedin');
        $youtube = get_the_author_meta('youtube');
        $instagram = get_the_author_meta('instagram');
        $pinterest = get_the_author_meta('pinterest');
        $flickr = get_the_author_meta('flickr');
        $tumblr = get_the_author_meta('tumblr');
        $vk = get_the_author_meta('vk');
        $wordpress = get_the_author_meta('wordpress');
        ?>
  <div class="author-socials">
    <?php _e('Follow Me :', 'allure-news'); ?>
    <?php
                if (!empty($user_url)) {
                ?>
    <a href="<?php echo esc_url($user_url); ?>" class="website" data-title="Website" target="_blank">
      <span class="font-icon-social-website"><i class="fa fa-external-link"></i></span>
    </a>
    <?php
                }
                if (!empty($facebook)) {
                ?>
    <a href="<?php echo esc_url($facebook); ?>" class="facebook" data-title="Facebook" target="_blank">
      <span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span>
    </a>
    <?php
                }
                if (!empty($twitter)) {
                ?>
    <a href="<?php echo esc_url($twitter); ?>" class="twitter" data-title="Twitter" target="_blank">
      <span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span>
    </a>
    <?php
                }
                if (!empty($linkedin)) {
                ?>
    <a href="<?php echo esc_url($linkedin); ?>" class="linkedin" data-title="Linkedin" target="_blank">
      <span class="font-icon-social-linkedin"><i class="fa fa-linkedin"></i></span>
    </a>
    <?php
                }
                if (!empty($instagram)) {
                ?>
    <a href="<?php echo esc_url($instagram); ?>" class="instagram" data-title="Instagram" target="_blank">
      <span class="font-icon-social-instagram"><i class="fa fa-instagram"></i></span>
    </a>
    <?php
                }
                if (!empty($youtube)) { ?>
    <a href="<?php echo esc_url($youtube); ?>" class="youtube" data-title="Youtube" target="_blank">
      <span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span>
    </a>
    <?php
                }
                if (!empty($pinterest)) {
                ?>
    <a href="<?php echo esc_url($pinterest); ?>" class="pinterest" data-title="Pinterest" target="_blank">
      <span class="font-icon-social-pinterest"><i class="fa fa-pinterest"></i></span>
    </a>
    <?php
                }
                if (!empty($flickr)) {
                ?>
    <a href="<?php echo esc_url($flickr); ?>" class="flickr" data-title="Flickr" target="_blank">
      <span class="font-icon-social-flickr"><i class="fa fa-flickr"></i></span>
    </a>
    <?php
                }
                if (!empty($tumblr)) {
                ?>
    <a href="<?php echo esc_url($tumblr); ?>" class="tumblr" data-title="Tumblr" target="_blank">
      <span class="font-icon-social-tumblr"><i class="fa fa-tumblr"></i></span>
    </a>
    <?php
                }
                if (!empty($vk)) {
                ?>
    <a href="<?php echo esc_url($vk); ?>" class="vk" data-title="VK" target="_blank">
      <span class="font-icon-social-vk"><i class="fa fa-vk"></i></span>
    </a>
    <?php
                }
                if (!empty($wordpress)) {
                ?>
    <a href="<?php echo esc_url($wordpress); ?>" class="wordpress" data-title="WordPress" target="_blank">
      <span class="font-icon-social-wordpress"><i class="fa fa-wordpress"></i></span>
    </a>
    <?php
                }
                ?>
  </div>
  <?php
    }
endif;
add_action('allure_news_author_links', 'allure_news_show_author_links', 10);
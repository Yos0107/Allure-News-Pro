<?php
/**
 * File to load the custom-sidebar folder
 * @package Allure News
 *
 * Load files
*/
/**
 * Load Custom Functions
 */
require get_template_directory() . '/candidthemes/functions/custom-functions.php';

/**
 * Load Schema Microdata
 */
require get_template_directory() . '/candidthemes/functions/microdata.php';

/**
 * Load Metabox video
 */
require get_template_directory() . '/candidthemes/metabox/metabox-video.php';

/**
 * Load Metabox Sidebar
 */
require get_template_directory() . '/candidthemes/metabox/metabox-sidebar.php';

/**
 * Load Header Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-header.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-top.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-main.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-nav.php';
require get_template_directory() . '/candidthemes/functions/header/hook-header-misc.php';
require get_template_directory() . '/candidthemes/functions/header/hook-carousel.php';
require get_template_directory() . '/candidthemes/functions/header/hook-carousel-modern.php';
require get_template_directory() . '/candidthemes/functions/header/hook-carousel-awesome.php';
require get_template_directory() . '/candidthemes/functions/header/hook-carousel-four.php';

/**
 * Load Miscellaneous Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-misc.php';

/**
 * Load Footer Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-footer.php';

/**
 * Load Single Post Hooks
 */
require get_template_directory() . '/candidthemes/functions/hook-single.php';


/**
 * Load Sanitize Functions
 */
require get_template_directory() . '/candidthemes/functions/sanitize-functions.php';

/**
 * Load category dropdown functions
 */
require get_template_directory() . '/candidthemes/functions/customizer-category-control.php';

/**
 * Load breadcrumb_trail File
 */
if (!function_exists('breadcrumb_trail')) {
	require get_template_directory() . '/candidthemes/assets/framework/breadcrumbs/breadcrumbs.php';
}

/**
 * Load Dynamic CSS from customizer
 */
require get_template_directory() . '/candidthemes/functions/dynamic-css.php';

/**
 * Load custom widgets
 */
require get_template_directory() . '/candidthemes/custom-widgets/widget-init.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-author-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-featured-posts-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-social-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-post-slider-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-tabbed-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-category-column-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-three-category-column-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-grid-post-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-advertisement-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-video-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-posts-two-column-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-category-tabbed-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-category-grid-tabbed-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-thumbnail-posts-widget.php';
require get_template_directory() . '/candidthemes/custom-widgets/candid-recent-posts-widget.php';


/**
 * Plugin Recommendation
 */
require get_template_directory() . '/candidthemes/assets/library/tgm-plugin-activation.php';
require get_template_directory() . '/candidthemes/functions/plugin-recommendation.php';

/**
 * Demo Data
*/
require get_template_directory() . '/candidthemes/functions/demo-import.php';
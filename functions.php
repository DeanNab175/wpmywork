<?php
/**
 * The functions definition for the theme
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file functions.php
 *
 */

/**
 * =============================================================
 *  Required Scripts
 * =============================================================
 */
// Enqueue styles and scripts
require get_template_directory() . '/inc/enqueue.php';
// Add Theme Support
require get_template_directory() . '/inc/theme-support.php';
// Admin Page
require get_template_directory() . '/inc/function-admin.php';
// AJAX Functions
require get_template_directory() . '/inc/ajax.php';
/**
 * =============================================================
 *  Other Scripts
 * =============================================================
 */

// Set the except length to 20 words
function mwrk_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mwrk_custom_excerpt_length', 999 );

// Change the excerpt "read more" string to ellipses "..."
function mwrk_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'mwrk_excerpt_more' );

// add custom class to the next and previous post links
add_filter('next_post_link', 'mwrk_post_link_attributes');
add_filter('previous_post_link', 'mwrk_post_link_attributes');

function mwrk_post_link_attributes($output) {
    $code = 'class="md-btn md-btn--outline-primary"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

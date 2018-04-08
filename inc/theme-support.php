<?php
/**
 * The functions definition for Theme Support
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file theme-support.php
 *
 */
// Theme support
function mwrk_theme_setup() {
    // Featured image
    add_theme_support( 'post-thumbnails' );

    // Nav menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wpmywork' )
    ) );

    // Post Formats
    add_theme_support( 'post-formats', array('aside', 'gallery') );
}
add_action('after_setup_theme', 'mwrk_theme_setup');
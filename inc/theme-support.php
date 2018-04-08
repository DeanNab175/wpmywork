<?php
/**
 * The functions definition for Theme Support
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file theme-support.php
 *
 */
/**
 * Theme support
 */
function mwrk_theme_setup() {
    // Featured image
    add_theme_support( 'post-thumbnails' );

    // Nav menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wpmywork' )
    ) );

    // Post Formats
	mwrk_activate_post_formats();
	// Custom Header
	mwrk_custom_header();
	// Custom Background
	mwrk_custom_background();
}
add_action('after_setup_theme', 'mwrk_theme_setup');

# Activate Post Formats Function
function mwrk_activate_post_formats() {
	$options = get_option('post_formats');
	$formats = array(
		'aside'     => 'Aside',
		'gallery'   => 'Gallery',
		'link'      => 'Link',
		'image'     => 'Image',
		'quote'     => 'Quote',
		'status'    => 'Status',
		'video'     => 'Video',
		'audio'     => 'Audio',
		'chat'      => 'Chat'
	);
	$output = array();
	foreach ( $formats as $key => $value ) {
		$output[] = (@$options[$key] == 1 ? $key : '');
	}
	if( !empty( $options ) ) {
		add_theme_support( 'post-formats', $output );
	}
}

# Activate Custom Header Function
function mwrk_custom_header() {
	$header = get_option('custom_header');
	if( @$header == 1 ) {
		add_theme_support( 'custom-header' );
	}
}

# Activate Custom Background Function
function mwrk_custom_background() {
	$background = get_option('custom_background');
	if( @$background == 1 ) {
		add_theme_support( 'custom-background' );
	}
}
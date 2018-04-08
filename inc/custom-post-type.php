<?php
/**
 * The custom post type
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file custom-post-type.php
 *
 */

/**
 * ---------------------------------------------------
 *  Theme Custom Post Types
 * ---------------------------------------------------
 */
$contact = get_option('contact_form');
if( @$contact == 1 ) {
	add_action( 'init', 'mwrk_contact_cpt' );
}

# Contact CPT
function mwrk_contact_cpt() {
	$labels = array(
		'name'               => _x( 'Messages', 'post type general name' ),
		'singular_name'      => _x( 'Message', 'post type singular name' ),
		'menu_name'          => _x( 'Messages', 'admin menu' ),
		'name_admin_bar'     => _x( 'Message', 'add new on admin bar' )
	);

	$args = array(
		'labels'             => $labels,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 26,
		'menu_icon'          => 'dashicons-email-alt',
		'supports'           => array( 'title', 'editor', 'author' )
	);

	register_post_type( 'mywork-contact', $args );
}
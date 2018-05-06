<?php
/**
 * Theme Custom Post Types
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file custom-post-type.php
 *
 */

/**
 * ---------------------------------------------------
 *  Contact Custom Post Type
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

	register_post_type( 'contact', $args );
}

/**
 * ---------------------------------------------------
 *  Portfolio Custom Post Type
 * ---------------------------------------------------
 */
add_action( 'init', 'mwrk_portfolio_cpt' );
function mwrk_portfolio_cpt() {
	$labels = array(
		'name'                  => _x( 'Portfolio', 'general name' ),
		'singular_name'         => _x( 'Portfolio', 'singular name' ),
		'menu_name'             => _x( 'Portfolio', 'Admin Menu text' ),
		'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar' ),
		'add_new'               => __( 'Add Work' ),
		'add_new_item'          => __( 'Add New Work' ),
		'new_item'              => __( 'New Work' ),
		'edit_item'             => __( 'Edit Work' ),
		'view_item'             => __( 'View Work' ),
		'all_items'             => __( 'All Works' ),
		'search_items'          => __( 'Search Works' ),
		'parent_item_colon'     => __( 'Parent Works:' ),
		'not_found'             => __( 'No works found.' ),
		'not_found_in_trash'    => __( 'No works found in Trash.' ),
		'featured_image'        => _x( 'Work Featured Image', 'Overrides the “Featured Image” phrase for this post type' ),
		'set_featured_image'    => _x( 'Set work featured image', 'Overrides the “Set featured image” phrase for this post type' ),
		'remove_featured_image' => _x( 'Remove featured image', 'Overrides the “Remove featured image” phrase for this post type' ),
		'use_featured_image'    => _x( 'Use as featured image', 'Overrides the “Use as featured image” phrase for this post type' ),
		'archives'              => _x( 'Portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”' ),
		'items_list_navigation' => _x( 'Works list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”' ),
		'items_list'            => _x( 'Works list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”' ),
	);

	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'portfolio' ),
		'capability_type'       => 'post',
		'has_archive'           => true,
		'hierarchical'          => false,
		'menu_position'         => 5,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'exclude_from_search'   => false,
	);

	register_post_type( 'portfolio', $args );
}
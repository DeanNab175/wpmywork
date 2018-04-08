<?php
/**
 * The Enqueue Styles and Scripts definition for the theme
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file enqueue.php
 *
 */

/**
 * =============================================================
 *  Front Enqueue Functions
 * =============================================================
 */
add_action( 'wp_enqueue_scripts', 'mwrk_load_scripts' );
function mwrk_load_scripts() {
	# --- enqueue styles ---
	// Fonts
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/fontawesome/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style( 'pe-icon', get_template_directory_uri() . '/fonts/pe-icon/pe-icon.css', array(), '1.0.0', 'all' );

	//Vendors
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/vendors/bootstrap/grid.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/vendors/magnific-popup/magnific-popup.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/vendors/swiper/swiper.css', array(), '3.4.2', 'all' );

	// App & fonts
	wp_enqueue_style( 'Montserrat-googlefonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:400,700', array(), null, 'all' );
	wp_enqueue_style( 'wpminimus-main', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all' );

	# --- enqueue scripts ---

	// Vendors
	// Jquery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, null, true );
	wp_enqueue_script( 'jquery' );

	// imagesloaded
	wp_deregister_script( 'imagesloaded' );
	wp_register_script( 'imagesloaded', includes_url( '/js/imagesloaded.min.js' ), false, null, true );
	wp_enqueue_script( 'imagesloaded' );

	// isotope
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/vendors/isotope-layout/isotope.pkgd.js', array('jquery'), '3.0.4', true );
	// jquery one page
	wp_enqueue_script( 'jquery-one-page', get_template_directory_uri() . '/vendors/jquery-one-page/jquery.nav.min.js', array('jquery'), null, true );
	// jquery easing
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/vendors/jquery.easing/jquery.easing.min.js', array('jquery'), null, true );
	// jquery matchHeight
	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/vendors/jquery.matchHeight/jquery.matchHeight.min.js', array('jquery'), null, true );
	// magnific popup
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/vendors/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );

	// mansory
	wp_deregister_script( 'masonry' );
	wp_register_script( 'masonry', includes_url( '/js/masonry.min.js' ), array('imagesloaded'), null, true );
	wp_enqueue_script( 'masonry' );

	// waypoints
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/vendors/jquery.waypoints/jquery.waypoints.min.js', array('jquery'), '4.0.1', true );
	// swiper
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/vendors/swiper/swiper.jquery.js', array('jquery'), '3.4.2', true );
	// menu
	wp_enqueue_script( 'menu', get_template_directory_uri() . '/vendors/menu/menu.js', array('jquery'), null, true );
	// typed
	wp_enqueue_script( 'typed', get_template_directory_uri() . '/vendors/typed/typed.min.js', false, '2.0.4', true );

	// custom script
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );

}

/**
 * =============================================================
 *  Admin Enqueue Functions
 * =============================================================
 */
add_action( 'admin_enqueue_scripts', 'mywrk_load_admin_scripts' );
function mywrk_load_admin_scripts( $hook ) {
	//echo $hook;
	if( 'toplevel_page_mywork_theme_options' != $hook && 'my-work_page_mywork_theme_support' != $hook && 'my-work_page_mywork_contact_form' != $hook  ) { return; }

	# Admin custom styles
	wp_register_style( 'mywrk-admin', get_template_directory_uri() . '/css/mywork.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'mywrk-admin' );

	wp_enqueue_media();

	# Admin custom scripts
	wp_register_script( 'mywrk-admin-script', get_template_directory_uri() . '/js/mywork.admin.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'mywrk-admin-script' );
}
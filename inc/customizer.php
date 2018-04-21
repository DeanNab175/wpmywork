<?php
/**
 * The Customizer Options
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file customizer.php
 *
 */

/**
 * ---------------------------------------------------
 *  Theme Customize Appearance Options
 * ---------------------------------------------------
 */
add_action( 'customize_register', 'mywork_customize_register' );
function mywork_customize_register( $wp_customize ) {
	# section Theme Standard Colors
	$wp_customize -> add_section( 'mywork_theme_standard_colors_section', array(
		'title' => __( 'Theme Standard Colors', 'wpmywork' ),
		'priority'  => 30,
	) );

	/**
	 *  Title
	 */
	# setting Title
	$wp_customize -> add_setting( 'mywork_title_setting', array(
		'default'   => _x( 'Hello, my name is Amir.', 'wpmywork' ),
		'type'      => 'theme_mod',
		'transport' => 'refresh',
	) );
	# control Title
	$wp_customize -> add_control( 'mywork_title_control', array(
		'label' => __( 'Title', 'wpmywork' ),
		'section'   => 'mywork_theme_standard_colors_section',
		'settings'   => 'mywork_title_setting',
		'priority'   => 1,
	) );

	/**
	 *  Header background color
	 */
	# setting Header background color
	$wp_customize -> add_setting( 'mywork_header_background_color_setting', array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
	) );
	# control Header background color
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'mywork_header_background_color_control', array(
		'label' => __( 'Header background color', 'wpmywork' ),
		'section'   => 'mywork_theme_standard_colors_section',
		'settings'   => 'mywork_header_background_color_setting',
		'priority'   => 2,
	) ) );

	/**
	 *  Body background color
	 */
	# setting Body background color
	$wp_customize -> add_setting( 'mywork_body_background_color_setting', array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
	) );
	# control Body background color
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'mywork_body_background_color_control', array(
		'label' => __( 'Body background color', 'wpmywork' ),
		'section'   => 'mywork_theme_standard_colors_section',
		'settings'   => 'mywork_body_background_color_setting',
		'priority'   => 3,
	) ) );

	/**
	 *  Footer background color
	 */
	# setting Footer background color
	$wp_customize -> add_setting( 'mywork_footer_background_color_setting', array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
	) );
	# control Footer background color
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'mywork_footer_background_color_control', array(
		'label' => __( 'Footer background color', 'wpmywork' ),
		'section'   => 'mywork_theme_standard_colors_section',
		'settings'   => 'mywork_footer_background_color_setting',
		'priority'   => 4,
	) ) );

}

/**
 * ---------------------------------------------------
 *  Theme Customizer Custom Functions
 * ---------------------------------------------------
 */
# Output Customize CSS
add_action( 'wp_head', 'mywork_customize_css' );
function mywork_customize_css() { ?>
	<style type="text/css">
		.bg-header,
		.header.header--fixed {
			background-color: <?php echo get_theme_mod( 'mywork_header_background_color_setting' ) ?>;
		}
		.bg-body {
			background-color: <?php echo get_theme_mod( 'mywork_body_background_color_setting' ) ?>;
		}
		.bg-footer {
			background-color: <?php echo get_theme_mod( 'mywork_footer_background_color_setting' ) ?>;
		}
	</style>
<?php } ?>
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
	$wp_customize -> add_section( 'mywork_theme_settings_section', array(
		'title' => __( 'MyWork Theme Settings', 'wpmywork' ),
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
		'section'   => 'mywork_theme_settings_section',
		'settings'   => 'mywork_title_setting',
		'priority'   => 1,
	) );

	/**
	 *  Description
	 */
	# setting Description
	$wp_customize -> add_setting( 'mywork_description_setting', array(
		'default'   => _x( 'I\'m a web designer, I do creative, I\'m a frontend developer', 'wpmywork' ),
		'type'      => 'theme_mod',
		'transport' => 'refresh',
	) );
	# control Description
	$wp_customize -> add_control( 'mywork_description_control', array(
		'label' => __( 'Description', 'wpmywork' ),
		'section'   => 'mywork_theme_settings_section',
		'settings'   => 'mywork_description_setting',
		'type'       => 'textarea',
		'priority'   => 2,
	) );

	/**
	 *  Portfolio section text
	 */
	# setting Portfolio section text
	$wp_customize -> add_setting( 'mywork_portfolio_section_text_setting', array(
		'default'   => _x( 'My Work', 'wpmywork' ),
		'type'      => 'theme_mod',
		'transport' => 'refresh',
	) );
	# control Portfolio section text
	$wp_customize -> add_control( 'mywork_portfolio_section_text_control', array(
		'label' => __( 'Portfolio Section Text', 'wpmywork' ),
		'section'   => 'mywork_theme_settings_section',
		'settings'   => 'mywork_portfolio_section_text_setting',
		'priority'   => 3,
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
		'section'   => 'mywork_theme_settings_section',
		'settings'   => 'mywork_header_background_color_setting',
		'priority'   => 4,
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
		'section'   => 'mywork_theme_settings_section',
		'settings'   => 'mywork_body_background_color_setting',
		'priority'   => 5,
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
		'section'   => 'mywork_theme_settings_section',
		'settings'   => 'mywork_footer_background_color_setting',
		'priority'   => 6,
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
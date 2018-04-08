<?php
/**
 * The functions definition for the Admin page
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file function-admin.php
 *
 */

/**
 * ---------------------------------------------------
 *  Admin page
 * ---------------------------------------------------
 */
add_action('admin_menu', 'mwrk_add_admin_page');
function mwrk_add_admin_page() {
	// --- Generate My Work admin page / Top level menu ---
	add_menu_page( 'My Work Theme Options', 'My Work', 'manage_options', 'mywork_theme_options', 'mwrk_theme_create_page_callback', 'dashicons-format-gallery', 110);

	// --- Generate My Work admin sub pages / Sub level menus ---
	/* The First sub menu Theme Options sub page
	 * has the same options arguments as the menu page
	 */
	add_submenu_page( 'mywork_theme_options', 'My Work Theme Options', 'Theme Options', 'manage_options', 'mywork_theme_options', 'mwrk_theme_create_page_callback' );
	// Custom CSS sub page
	add_submenu_page( 'mywork_theme_options', 'My Work Theme CSS', 'Custom CSS', 'manage_options', 'mywork_css', 'mwrk_theme_custom_css_callback' );

	// Activate custom settings
	add_action( 'admin_init', 'mywork_custom_settings' );
}

function mwrk_theme_create_page_callback() {
	// Generate the admin page / Theme options
	require_once get_template_directory() . '/inc/templates/mywork-admin.php';
}

function mwrk_theme_custom_css_callback() {
	// Generate Custom CSS page
	echo '<h1>My Work Custom CSS</h1>';
}

// Activate custom settings
function mywork_custom_settings() {
	// ----- Header Section -----
	// Section
	add_settings_section( 'mywork-header-options-section', 'Header options', 'mwrk_header_options_callback', 'mywork_theme_options' );
	// Logo field options
	add_settings_field( 'mywork-logo-display-choice', 'Display logo as: ', 'mwrk_logo_display_choice_callback', 'mywork_theme_options', 'mywork-header-options-section' );
	// register the settings group
	register_setting( 'mywork-settings-group', 'logo_display_choice' );

	/**
	 * if the display option is 'Text' or 'Image
	 * display it's appropriate field
	 */
	$choice  = get_option('logo_display_choice');
	if ( $choice == 'Image' ) {
		register_setting( 'mywork-settings-group', 'logo_image' );
		add_settings_field( 'mywork-logo-image', 'Logo Image', 'mwrk_logo_image_callback', 'mywork_theme_options', 'mywork-header-options-section' );
	}
	if ( $choice == 'Text' ) {
		register_setting( 'mywork-settings-group', 'logo_name' );
		add_settings_field( 'mywork-logo-name', 'Logo Name', 'mwrk_logo_name_callback', 'mywork_theme_options', 'mywork-header-options-section' );
	}
}

/**
 *  ---------------------------------------------------
 *  Custom Settings Callbacks Functions
 *  ---------------------------------------------------
 */

function mwrk_header_options_callback() {
	echo '<p>Customize the header options</p>';
}

# Logo display choice function
function mwrk_logo_display_choice_callback() {
	$options = get_option('logo_display_choice');
	$choices = array('text' =>'Text', 'image' =>'Image');
	$output = '';

	foreach ($choices as $key => $value) {
		//$checked = checked($value, $options, false);
		$checked = (@$options == $value) ? 'checked': '';

		$output .= '<span class="logo-display-choice">';
		$output .= '<label for="logo-display-choice-'. $key .'">';
		$output .= '<input type="radio" id="logo-display-choice-'. $key.'" name="logo_display_choice" value="'. $value .'" '. $checked .' />'. $value;
		$output .= '</label></span>';
	}
	echo $output;

}

# Logo name function
function mwrk_logo_name_callback() {
	$logoName = esc_attr( get_option( 'logo_name' ) );

	$output = '<div>';
	$output .= '<input id="logo-name-text" type="text" name="logo_name" value="'. $logoName .'" placeholder="Logo Text" />';
	$output .= '<p>Enter your logo text</p>';
	$output .= '</div>';

	echo $output;
}

# Logo image function
function mwrk_logo_image_callback() {
	$logoImage = esc_attr( get_option( 'logo_image' ) );

	$output = '<div>';
	$output .= '<input id="upload-logo-image" class="button button-secondary" type="button" value="Upload Logo Image" />';
	$output .= '<input id="logo-image-url" type="hidden" name="logo_image" value="'. $logoImage .'" />';
	$output .= '<p>Upload your logo image</p>';
	$output .= '</div>';

	echo $output;
}

/**
 *  ---------------------------------------------------
 *  Sanitize Functions
 *  ---------------------------------------------------
 */
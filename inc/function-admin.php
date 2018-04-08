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
	add_submenu_page( 'mywork_theme_options', 'My Work Theme Header Options', 'Header Options', 'manage_options', 'mywork_theme_options', 'mwrk_theme_create_page_callback' );
	// Theme support sub page
	add_submenu_page( 'mywork_theme_options', 'My Work Theme Support', 'Theme Support', 'manage_options', 'mywork_theme_support', 'mwrk_theme_support_callback' );
	// Contact Form sub page
	add_submenu_page( 'mywork_theme_options', 'My Work Contact Form', 'Contact Form', 'manage_options', 'mywork_contact_form', 'mwrk_contact_form_page_callback' );
	// Custom CSS sub page
	add_submenu_page( 'mywork_theme_options', 'My Work Theme CSS', 'Custom CSS', 'manage_options', 'mywork_css', 'mwrk_theme_custom_css_callback' );

	// Activate custom settings
	add_action( 'admin_init', 'mywork_custom_settings' );
}

# Generate the admin page / Theme options
function mwrk_theme_create_page_callback() {
	require_once get_template_directory() . '/inc/templates/mywork-admin.php';
}

# Generate Theme Support page
function mwrk_theme_support_callback() {
	require_once get_template_directory() . '/inc/templates/mywork-theme-support.php';
}

# Generate Contact Form page
function mwrk_contact_form_page_callback() {
	require_once get_template_directory() . '/inc/templates/mywork-contact-form.php';
}

# Generate Custom CSS page
function mwrk_theme_custom_css_callback() {
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
		register_setting( 'mywork-settings-group', 'logo_name', 'mwrk_sanitize_logo_name' );
		add_settings_field( 'mywork-logo-name', 'Logo Name', 'mwrk_logo_name_callback', 'mywork_theme_options', 'mywork-header-options-section' );
	}

	// ----- Theme Support Section -----
	register_setting( 'mywork-theme-support-group', 'post_formats' );
	register_setting( 'mywork-theme-support-group', 'custom_header' );
	register_setting( 'mywork-theme-support-group', 'custom_background' );

	add_settings_section( 'mywork-theme-support-section', 'Theme Support', 'mwrk_theme_support_section_callback', 'mywork_theme_support' );

	add_settings_field( 'mywork-post-formats', 'Post Formats', 'mwrk_post_formats_callback', 'mywork_theme_support', 'mywork-theme-support-section' );
	add_settings_field( 'mywork-custom-header', 'Custom Header', 'mwrk_custom_header_callback', 'mywork_theme_support', 'mywork-theme-support-section' );
	add_settings_field( 'mywork-custom-background', 'Custom Background', 'mwrk_custom_background_callback', 'mywork_theme_support', 'mywork-theme-support-section' );

	// ----- Contact Form Section -----
	register_setting( 'mywork-contact-form-group', 'contact_form' );
	add_settings_section( 'mywork-contact-form-section', 'Contact Form', 'mwrk_contact_form_section_callback', 'mywork_contact_form' );
	add_settings_field( 'mywork-contact-form', 'Activate Contact Form', 'mwrk_contact_form_callback', 'mywork_contact_form', 'mywork-contact-form-section' );


}

/**
 *  ---------------------------------------------------
 *  Header Logo
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
 *  Theme Support
 *  Custom Settings Callbacks Functions
 *  ---------------------------------------------------
 */
function mwrk_theme_support_section_callback() {
	echo '<p>Activate and Deactivate specific options theme support</p>';
}

# Post Formats Callback
function mwrk_post_formats_callback() {
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
	$output = '';
	foreach ( $formats as $key => $value ) {
		//var_dump($options[$key]);
		//$checked = checked($value, $options, false);
		$checked = ( @$options[$key] == 1 ? 'checked': '' );

		$output .= '<p><label for="post-formats-'. $key .'">';
		$output .= '<input type="checkbox" id="post-formats-'. $key .'" name="post_formats['. $key .']" value="1" ' . $checked . ' />' . $value;
		$output .= '</label></p>';
	}
	echo $output;
}

# Custom Header Callback
function mwrk_custom_header_callback() {
	$options = get_option('custom_header');
	$checked = ( @$options == 1 ? 'checked': '' );
	$output = '';

	$output .= '<p><label for="custom_header">';
	$output .= '<input type="checkbox" id="custom_header" name="custom_header" value="1" ' . $checked . ' /> Activate the Custom Header';
	$output .= '</label></p>';

	echo $output;
}

# Custom Background Callback
function mwrk_custom_background_callback() {
	$options = get_option('custom_background');
	$checked = ( @$options == 1 ? 'checked': '' );
	$output = '';

	$output .= '<p><label for="custom_background">';
	$output .= '<input type="checkbox" id="custom_background" name="custom_background" value="1" ' . $checked . ' /> Activate the Custom Background';
	$output .= '</label></p>';

	echo $output;
}

/**
 *  ---------------------------------------------------
 *  Contact Form
 *  Custom Settings Callbacks Functions
 *  ---------------------------------------------------
 */
function mwrk_contact_form_section_callback() {
	echo '<p>Activate or deactivate the built-in Contact Form</p>';
}

# Activate or deactivate Contact Form
function mwrk_contact_form_callback() {
	$options = get_option('contact_form');
	$checked = ( @$options == 1 ? 'checked': '' );
	$output = '';

	$output .= '<p><label for="contact_form">';
	$output .= '<input type="checkbox" id="contact_form" name="contact_form" value="1" ' . $checked . ' />';
	$output .= '</label></p>';

	echo $output;
}


/**
 *  ---------------------------------------------------
 *  Sanitize Functions
 *  ---------------------------------------------------
 */
# Header Logo
function mwrk_sanitize_logo_name( $input ) {
	$output = sanitize_text_field( $input );
	return $output;
}
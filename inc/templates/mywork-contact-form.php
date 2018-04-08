<?php
/**
 * The Admin Contact Form
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file mywork-contact-form.php
 *
 */
?>

<h1>My Work - Contact Form</h1>
<?php settings_errors(); ?>
<?php
//$choice  = get_option('logo_display_choice');
?>
<div class="wrap">
	<div class="contact-form">
		<form id="contact-form" method="post" action="options.php">
			<?php settings_fields( 'mywork-contact-form-group' ); ?>
			<?php do_settings_sections( 'mywork_contact_form' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
</div>

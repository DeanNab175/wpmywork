<?php
/**
 * The Admin Theme Support template
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file mywork-theme-support.php
 *
 */
?>

<h1>My Work - Theme Support</h1>
<?php settings_errors(); ?>
<div class="wrap">
	<div class="theme-support">
		<form id="theme-support-form" method="post" action="options.php">
			<?php settings_fields( 'mywork-theme-support-group' ); ?>
			<?php do_settings_sections( 'mywork_theme_support' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
</div>

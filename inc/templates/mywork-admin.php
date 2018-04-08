<?php
/**
 * The Admin page / Theme options template
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file mywork-admin.php
 *
 */
?>
<h1>My Work - Theme Header Options</h1>
<?php settings_errors(); ?>
<?php
    $choice  = get_option('logo_display_choice');
    $output = '';
    if ( $choice == 'Image' ) {
	    $output = esc_attr( get_option( 'logo_image' ) );
    }
    if ( $choice == 'Text' ) {
	    $output = esc_attr( get_option( 'logo_name' ) );
    }
?>
<div class="wrap clearfix">
    <div class="header-preview">
        <div class="logo-container">
            <?php if( $choice == 'Text' ) : ?>
                <h3 id="logo-text-preview"><?php print $output; ?></h3>
            <?php  endif; ?>
            <?php if( $choice == 'Image' ) : ?>
                <img id="logo-image-preview" src="<?php print $output; ?>">
            <?php  endif; ?>
        </div>
    </div>
    <div class="header-options">
        <form id="header-options-form" method="post" action="options.php">
		    <?php settings_fields( 'mywork-settings-group' ); ?>
		    <?php do_settings_sections( 'mywork_theme_options' ); ?>
		    <?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
        </form>
    </div>
</div>

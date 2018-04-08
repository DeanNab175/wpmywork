<?php
/**
 * The header for the theme
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file header.php
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title>
		<?php bloginfo('name'); ?> |
		<?php is_front_page() ? bloginfo('description') : wp_title( '' ); ?>
	</title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
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
<body>
<div class="page-wrap" id="root">
	<!-- header -->
	<header class="header header--fixed">
		<div class="header__inner">
			<div class="header__logo">
                <a href="<?php echo get_home_url(); ?>">
	                <?php if( $choice == 'Text' ) : ?>
                        <h3><?php print $output; ?></h3>
	                <?php  endif; ?>
	                <?php if( $choice == 'Image' ) : ?>
                        <img src="<?php print $output; ?>" alt="Logo Image">
	                <?php  endif; ?>
<!--                    <img src="--><?php //bloginfo('template_url'); ?><!--./img/logo.png" alt="" style="width: 122px;"/>-->
                </a>
            </div>
			<div class="navbar-toggle" id="fs-button">
				<div class="navbar-icon"><span></span></div>
			</div>
		</div>

		<!-- fullscreenmenu__module -->
		<div class="fullscreenmenu__module" trigger="#fs-button">

			<!-- overlay-menu -->
			<nav class="overlay-menu">

				<?php
					$args = array(
                        'theme_location'    => 'primary',
                        'menu'              => 'Primary menu',
                        'menu_class'        => 'wil-menu-list',
                        'menu_id'           => 'primary-menu',
						'container'         => false,
						'depth'             => 2,
						'fallback_cb'       => false
					);
					wp_nav_menu( $args );
				?>

			</nav><!-- End / overlay-menu -->

		</div><!-- End / fullscreenmenu__module -->

	</header><!-- End / header -->

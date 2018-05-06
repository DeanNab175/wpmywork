<?php
/**
 * The Home/Front Page template file
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file front-page.php
 *
 */
get_header();
?>

<!-- Content-->
<div class="wil-content">

	<!-- Section -->
	<section class="awe-section bg-header">
		<div class="container">

			<!-- page-title -->
			<div class="page-title">
				<h2 class="page-title__title"><?php echo get_theme_mod( 'mywork_title_setting', 'Hello, my name is Amir.' ); ?><br>

					<!-- typing__module -->
					<?php
                        $str = get_theme_mod( 'mywork_description_setting', 'I\'m a web designer, I do creative, I\'m a frontend developer' );
                        $descriptions = mwrk_split_text( $str );
                        if ( $descriptions ) :
                    ?>
                        <div class="typing__module">
                            <div class="typed-strings">
                                <?php
                                    foreach ( $descriptions as $text ) {
                                        echo '<span>'. $text .'</span>';
                                    }
                                ?>
                            </div>
                            <span class="typed"></span>
	                        <?php endif; ?>
                        </div>
					<!-- End / typing__module -->

				</h2>
				<p class="page-title__text"></p>
				<div class="page-title__divider"></div>
			</div><!-- End / page-title -->

		</div>
	</section>
	<!-- End / Section -->


	<!-- Section -->
	<section class="awe-section bg-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 ">

					<!-- title -->
					<div class="title">
						<h2 class="title__title"><?php echo get_theme_mod( 'mywork_portfolio_section_text_setting', 'My work' ); ?></h2>
					</div><!-- End / title -->

				</div>
			</div>
			<div class="grid-css grid-css--masonry" data-col-lg="3" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
				<div class="grid__inner">
					<div class="grid-sizer"></div>
					<?php
                    $args = array(
                        'post_type'     => 'portfolio',
                        'post_per_page' => 9
                    );
                    $work_posts = new WP_Query( $args );
					if ( $work_posts->have_posts() ) :

						while ( $work_posts->have_posts() ) : $work_posts->the_post();
							get_template_part( 'template-parts/content', 'portfolio' );
						endwhile;

					else :

						echo '<p>'. __('No Works Found.') . '</p>';

					endif;
					?>
				</div>
			</div>
			<div class="awe-text-center mt-50">
				<a class="md-btn md-btn--outline-primary" href="#">all work
				</a>
			</div>
		</div>
	</section>
	<!-- End / Section -->

</div>
<!-- End / Content-->

<?php get_footer(); ?>

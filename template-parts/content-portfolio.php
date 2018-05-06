<?php
/**
 * The Portfolio Post Template for the theme
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file content-portfolio.php
 *
 */
?>
<div class="grid-item">
	<div class="grid-item__inner">
		<div class="grid-item__content-wrapper">

			<!-- work -->
			<div class="work">
				<a href="<?php the_permalink(); ?>">

					<!-- hoverbox ef-slide-bottom -->
					<div class="hoverbox ef-slide-bottom light">

						<!-- hb_front -->
						<div class="hb_front">
							<?php if( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail(); ?>
							<?php endif; ?>
						</div><!-- End / hb_front -->


						<!-- hb_back -->
						<div class="hb_back">
							<h2 class="work__title"><?php the_excerpt(); ?></h2><span class="work__text">View detail</span>
						</div><!-- End / hb_back -->

					</div><!-- End / hoverbox ef-slide-bottom -->
				</a>
			</div><!-- End / work -->

		</div>
	</div>
</div><!-- .grid-item -->

<?php
/**
 * The footer for the theme
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file footer.php
 *
 */
?>

<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6 ">
				<p class="footer__coppy"><?php echo Date( 'Y'); ?> &copy; Copyright <a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>. All rights Reserved.</p>
			</div>
			<div class="col-md-6 col-lg-6 ">
				<div class="footer__social">

					<!-- social-icon -->
					<a class="social-icon" href="#"><i class="social-icon__icon fa fa-facebook"></i>
					</a><!-- End / social-icon -->


					<!-- social-icon -->
					<a class="social-icon" href="#"><i class="social-icon__icon fa fa-twitter"></i>
					</a><!-- End / social-icon -->


					<!-- social-icon -->
					<a class="social-icon" href="#"><i class="social-icon__icon fa fa-linkedin"></i>
					</a><!-- End / social-icon -->


					<!-- social-icon -->
					<a class="social-icon" href="#"><i class="social-icon__icon fa fa-behance"></i>
					</a><!-- End / social-icon -->


					<!-- social-icon -->
					<a class="social-icon" href="#"><i class="social-icon__icon fa fa-vimeo"></i>
					</a><!-- End / social-icon -->

				</div>
			</div>
		</div>
	</div>
</div><!-- End / footer -->

</div>

<?php wp_footer(); ?>
</body>
</html>

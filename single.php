<?php
/**
 * The single page template
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file single.php
 *
 */
?>

<?php get_header(); ?>

<!-- Content-->
<div class="wil-content">

    <!-- Section -->
    <section class="awe-section">
        <div class="container">

            <!-- page-title -->
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="page-title pb-40">
                        <span class="post-detail__cat"><?php the_category( ' &bull; ' ); ?></span>
                        <h2 class="page-title__title"><?php the_title(); ?></h2>
                        <div class="post-detail__meta">
                            <span class="date"><?php the_date('M d, Y'); ?></span>
                            <span class="author">
                                by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                            </span>
                        </div>
                        <div class="page-title__divider"></div>
                    </div>

                <?php endwhile; ?>
            <?php else : ?>
                <p><?php echo __('No Posts Found.'); ?></p>
            <?php endif; ?>
            <!-- End / page-title -->

        </div><!-- .container /  -->
    </section>
    <!-- End / Section -->


    <!-- Section -->
    <section class="awe-section bg-gray">
        <div class="container">

            <!--  -->
            <div>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <div class="post-detail__media">
                            <?php if( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="post-detail__entry row">
                            <div class="col-md-8">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php echo __('No Posts Found.'); ?></p>
                <?php endif; ?>

                <div class="sharebox__module">
                    <p class="social-text">share this article</p>

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
            </div><!-- End /  -->

            <!-- Previous and Next Post Navigation -->
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="awe-text-left mt-50">
                        <?php
                            $fa_icon = '<i class="fa fa-arrow-left" aria-hidden="true"></i>';
                            previous_post_link( '%link', $fa_icon . ' %title');
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="awe-text-right mt-50">
                        <?php
                            $fa_icon = '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
                            next_post_link( '%link', '%title ' . $fa_icon );
                        ?>
                    </div>
                </div>
            </div>

        </div><!-- .container /  -->
    </section>
    <!-- End / Section -->

</div>
<!-- End / Content-->

<?php get_footer(); ?>

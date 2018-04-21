<?php
/**
* The main template file
* @package MY Work
* @since 1.0.0
* @version 1.0.0
* @file index.php
*
*/
get_header();
?>

<!-- Content-->
<div class="wil-content">

    <!-- Section -->
    <section class="awe-section bg-header">
        <div class="container">
            <?php $page_title = ( get_post_type( get_the_ID() ) === 'page' ) ? get_the_title() : get_the_title( get_option('page_for_posts', true) ); ?>
            <!-- page-title -->
            <div class="page-title pb-40">
                <h2 class="page-title__title"><?php  echo $page_title; ?></h2>
                <p class="page-title__text">Sed ante nisl, fermentum et facilisis in</p>
                <div class="page-title__divider"></div>
            </div><!-- End / page-title -->

        </div><!-- .container /  -->
    </section>
    <!-- End / Section -->


    <!-- Section -->
    <section class="awe-section bg-body">
        <div class="container">
            <div class="grid-css grid-css--masonry" data-col-lg="3" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
                <div class="grid__inner mywork-posts-container">
                    <div class="grid-sizer"></div>
                    <?php
                        if ( have_posts() ) :
                            echo '<div class="page-limit" data-page="/">';

                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/post/content', get_post_format() );
                            endwhile;

                            echo '</div>';
                        else :

                        echo '<p>'. __('No Posts Found.') . '</p>';

                        endif;
                    ?>
                </div>
            </div>
            <div class="awe-text-center mt-50">
                <a href="javascript: void(0)" class="md-btn md-btn--outline-primary mywork-load-more-post" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">Load more</a>
            </div>
            <div class="back-to-top" id="back-to-top">
                <p>Back to top</p>
            </div>
        </div><!-- .container /  -->
    </section>
    <!-- End / Section -->

</div>
<!-- End / Content-->

<?php get_footer(); ?>
<?php
/**
 * The ajax functions
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file ajax.php
 *
 */
add_action( 'wp_ajax_nopriv_mywork_load_more_post', 'mywork_load_more_post' );
add_action( 'wp_ajax_mywork_load_more_post', 'mywork_load_more_post' );
function mywork_load_more_post() {
	$paged = $_POST['page'] + 1;

	$query = new WP_Query(array(
		'post_type'     => 'post',
		'post_status'   => 'publish',
		'paged'         => $paged
	));

	if( $query -> have_posts() ):

		echo '<div class="page-limit" data-page="/page/'. $paged .'">';

		while( $query -> have_posts() ) : $query -> the_post();
			get_template_part( 'template-parts/post/content', get_post_format() );
		endwhile;

		echo '</div>';

	endif;

	wp_reset_postdata();

	wp_die();
}
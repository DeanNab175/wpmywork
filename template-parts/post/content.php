<?php
/**
 * The standard post format for the theme
 * @package MY Work
 * @since 1.0.0
 * @version 1.0.0
 * @file content.php
 *
 */
?>
<div class="grid-item">
    <div class="grid-item__inner">
        <div class="grid-item__content-wrapper">

            <!-- post -->
            <div class="post">
                <div class="post__media">
                    <a href="<?php the_permalink(); ?>">
                        <?php if( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="post__body">
                    <div class="post__meta">
                        <span class="date"><?php the_time('M d, Y'); ?></span>
                        <span class="author">
                            by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                        </span>
                    </div>
                    <h2 class="post__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="post__text">
                        <?php the_excerpt(); ?>
                    </div>
                    <a class="md-btn md-btn--outline-primary" href="<?php the_permalink(); ?>">
                        <?php echo __('read more'); ?>
                    </a>
                </div>
            </div><!-- End / post -->

        </div>
    </div>
</div><!-- .grid-item -->

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="rel">

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <div class="imageWrapper fill wide ol">
                <img src="<?php echo $image[0]; ?>">
                <span class="date fwb sf"><?php the_time('d F Y'); ?></span>
            </div>
        </a>
        
        <div class="newsPreview">

            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="sf fwb pc ls-2"><?php the_title(); ?></a></h2>
            <div class="newsExcerpt pc">
                <?php html5wp_excerpt('html5wp_index'); ?>
            </div>
            <a href="<?php echo get_the_permalink(); ?>" class="readMoreLink pf pc ls-1">Lees meer</a>
        
        </div>

	</article>

<?php endwhile; ?>

<?php endif; ?>

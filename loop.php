<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col-sm-3">
				<!-- post thumbnail -->
				<?php if(get_field('video_url')): ?>
					<div style="position: relative;width: 100%;height: 0;padding-bottom: 56.25%;"><iframe src="<?php echo get_field('video_url'); ?>?rel=0&amp;controls=1&amp;showinfo=0"frameborder="0" allowfullscreen="allowfullscreen" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"></iframe></div>
				<?php elseif ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('medium'); // Declare pixel size you need inside the array ?>
					</a>
				<?php else : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div style="width:100%; padding:40%; background:#e8e8e8;"></div>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->
			</div>
			<div class="col-sm-9">
				<!-- post title -->
				<h3>
					<a class="posts-loop_a" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>
				<!-- /post title -->

				<!-- post details -->
				<!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
				<!-- /post details -->

				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

				<?php edit_post_link(); ?>
			</div>
		</div>
	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>

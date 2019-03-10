<?php get_header(); ?>
<div class="concrete"><div class="container"><h1><?php the_title(); ?></h1><p class="meta">Le <?php the_time(' j F, Y'); ?> <?php //the_time('g:i a'); ?></p></div></div>


	<div class="container" style="margin:50px auto;">
	<div class="row">
		<!-- section -->
		<section class="col-sm-6" style="padding:0;">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>






			<?php the_content(); // Dynamic Content ?>





			<?php  //  edit_post_link(); // Always handy to have Edit Post Links available ?>
			<?php // comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

		</section>
		<aside class="col-sm-6">
			<?php if(get_field('video_url')): ?>
				<div style="position: relative;width: 100%;height: 0;padding-bottom: 56.25%;"><iframe src="<?php echo get_field('video_url'); ?>?rel=0&amp;controls=1&amp;showinfo=0"frameborder="0" allowfullscreen="allowfullscreen" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;"></iframe></div>
			<?php endif; ?>


			<?php $gallery = get_field('gallery') ; ?>
			<?php if ($gallery) : ?>
			<ul class="bxslider">
			<?php  foreach ($gallery as $image)  : ?>
				<li class="slide_photo_background" style="background-image: url(<?php echo $image['sizes']['large']; ?>);" >
				</li>
			<?php endforeach; ?>
				</ul>
			<?php elseif ( has_post_thumbnail()) : ?>
				<div class="post_thumbnail"><?php the_post_thumbnail('medium'); // Declare pixel size you need inside the array ?></div>
			<?php endif; ?>
		</aside>
	</div> <!-- END OF ROW -->
	</div> <!-- END OF CONTAINER -->




<?php get_footer(); ?>

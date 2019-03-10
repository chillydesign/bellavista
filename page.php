<?php get_header(); ?>



	<!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<div class="parallax_container">
			<div class="parallax_image" style="background-image:url('<?php  echo thumbnail_of_post_url( get_the_ID(), 'large' ) ; ?>')"></div>
		</div>
	<?php endif; ?>
	<!-- /post thumbnail -->




<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <?php include('section-loop.php'); ?>


	<div class="container">
		<?php the_content(); ?>
	</div>
	<?php # if (the_content() != '' ) : ?><?php  #endif; ?>
<?php endwhile;endif; ?>




<?php get_footer(); ?>

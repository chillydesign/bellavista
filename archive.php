<?php get_header(); ?>
	<div class="container">

		<!-- section -->
		<section>

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->


<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

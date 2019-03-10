<?php get_header(); ?>
<!-- post thumbnail -->
<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
	<div class="parallax_container">
		<div class="parallax_image" style="background-image:url('<?php  echo thumbnail_of_post_url( get_the_ID(), 'large' ) ; ?>')"></div>
	</div>
<?php endif; ?>
<!-- /post thumbnail -->

<div class="concrete"><h1 class="container">Actualités</h1></div>
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<main role="main">
		<!-- section -->


			<section>

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</section>
			<!-- /section -->
		</main>
	</div>




</div>
</div>

<?php get_footer(); ?>

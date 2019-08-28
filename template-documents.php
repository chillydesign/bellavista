<?php /* Template Name: Documents Page Template */ get_header(); ?>

	<!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<div class="parallax_container">
			<div class="parallax_image" style="background-image:url('<?php  echo thumbnail_of_post_url( get_the_ID(), 'large' ) ; ?>')"></div>
		</div>
	<?php endif; ?>
	<!-- /post thumbnail -->


	<?php include('section-loop.php'); ?>


		<!-- section -->
		<section style="padding-top:0; margin-top:-50px;">

		<div class="container">
			<form id="documents_form"  action="<?php echo site_url(); ?>/wp-content/themes/bellavista/sections/mail.php"  method="post">
			<div class="doc_options">
			<?php $i = 1; ?>
			<?php while ( have_rows('downloads') ) : the_row(); ?>
				<?php $filename = get_sub_field('nom_du_fichier'); ?>
				<?php $file = get_sub_field('fichier')['url']; ?>
				<div class="document_box">
					<input type="checkbox" name="docs[<?php echo sanitize_title($filename); ?>]" value="<?php echo $filename; ?>|<?php echo $file; ?>" <?php if($i==1){echo 'checked'; } ?> >
					<label for="docs[<?php echo sanitize_title($filename); ?>]"><?php echo $filename; ?></label>
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
			</div>
			<div class="clear"></div>
				<br>
				<input class="email_input" type="email" name="email" placeholder="<?php _e('Adresse email', 'webfactor'); ?>">
				<input id="email_submit" type="submit" value="<?php _e('Recevoir les documents', 'webfactor'); ?>">
				<input type="hidden" name="language" id="language" value="<?php echo ICL_LANGUAGE_CODE; ?>" />
			</form>
			<div id="form_message"></div>
		</div>


		</section>
		<!-- /section -->



<?php get_footer(); ?>


<div class="slider_inner">
<ul class="bxslider">


	<?php while ( have_rows('slides') ) : the_row() ; ?>


		<?php $image =  get_sub_field('image'); ?>
		<?php $slide_content =  get_sub_field('slide_content'); ?>

		<li  class="slide_photo_background" style="background-image: url(<?php echo $image['url']; ?>);" >
            <?php if ($slide_content): ?>
            <?php if ($slide_content != ''): ?>
                		 <div class="slide_content"><?php echo $slide_content; ?></div>
            <?php endif; ?>
            <?php endif; ?>

		</li>
	<?php endwhile; ?>


</ul>
</div>

<?php $images =  get_sub_field('images'); ?>


<div class="container">
<ul class="gallery_images clearfix">
	<?php  foreach ($images as $image) : ?>
	<li  class="gallery_image"> 
		<a class="gallery"  href="<?php echo $image['sizes']['large']; ?>"><img src="<?php echo $image['sizes']['medium']; ?>"  alt="" /></a>
	</li>
	<?php endforeach; ?>
</ul>

</div>
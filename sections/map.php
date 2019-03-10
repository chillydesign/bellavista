<?php $coordinates = strval(get_sub_field('address'));  ?>


<div class="map_container">
	<address>
		<div><?php echo get_sub_field('map_content'); ?></div>
	</address>

	<?php echo do_shortcode( '[chilly_map location="' . $coordinates . '"]'  ); ?>
</div>
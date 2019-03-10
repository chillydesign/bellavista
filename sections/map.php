<?php $coordinates = strval(get_sub_field('lat_lng'));  ?>
<?php $marker_title = strval(get_sub_field('marker_title'));  ?>
<?php $latlng = implode(',',  $coordinates); ?>
<?php $lat = $latlng[0]; ?>
<?php $lng = $latlng[1]; ?>

<div class="map_container">
	<address>
		<div><?php echo get_sub_field('map_content'); ?></div>
	</address>


	<?php echo do_shortcode( '[chilly_map lat='. $lat.' lng='.$lng.' title="' . $marker_title . '"]'  ); ?>
</div>

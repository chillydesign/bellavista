<?php $coordinates = (get_sub_field('lat_lng'));  ?>
<?php $marker_title = strval(get_sub_field('marker_title'));  ?>
<?php $map_content = get_sub_field('map_content'); ?>
<div class="map_container">
	<address>
		<div><?php echo $map_content; ?></div>
	</address>

    <?php if ($coordinates):
        $latlng = explode(',',  $coordinates);
        $lat = $latlng[0];
        $lng = $latlng[1];
        echo do_shortcode( '[chilly_map lat='. $lat.' lng='.$lng.' title="' . $marker_title . '"]'  );

    endif; ?>
</div>

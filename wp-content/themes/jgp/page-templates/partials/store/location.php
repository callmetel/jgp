<section id="location" class="is-inactive">
	<div class="google-map left">
		 <?php
			$location = get_field('map');
			if( ! empty($location) ):
			?>
			<div id="map-canvas"></div>
			<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

			<script type="text/javascript">
			  //<![CDATA[
				function load() {
				var lat = <?php echo $location['lat']; ?>;
				var lng = <?php echo $location['lng']; ?>;
			// coordinates to latLng
				var latlng = new google.maps.LatLng(lat, lng);
			// map Options
				// var myOptions = {
				// zoom: 9,
				// center: latlng,
				// mapTypeId: google.maps.MapTypeId.ROADMAP
			 //   };
			//draw a map
				var map = new google.maps.Map(document.getElementById("map-canvas"));
				var marker = new google.maps.Marker({
				position: map.getCenter(),
				map: map
			   });
			}
			// call the function
			   load();
			//]]>
			</script>
		<?php endif; ?> 
	</div>
	<div class="divider"></div>
	<div class="location-info right">
		<h1>LOCATE US</h1>
		<h2>Address</h2>
		<a href ="<?php the_field('street_address'); ?>">1214 South St</a>
		<a href ="<?php the_field('city_state_zip'); ?>">Philadelphia, Pa 19147</a>
		<h2>Hours</h2>
		<?php the_field('weekday_hours'); ?>
		<?php the_field('weekend_hours'); ?>
		<!-- <h3>TUES-FRI <span>2PM-7PM</span></h3>
		<h3>SAT&amp;SUN <span>12PM-7PM</span></h3></a> -->
	</div>
</section>
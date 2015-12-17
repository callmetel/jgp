$( document ).ready(function() {



	var map; //<-- This is now available to both event listeners and the initialize() function
	function initialize() {

		var map_options = {
			center: new google.maps.LatLng(39.943080,-75.162317),
			zoom: 9,
			scrollwheel: false,
			draggable: false,
			
		}

		map = new google.maps.Map(document.getElementById("map-canvas"),
			map_options);

		var marker = new google.maps.Marker({
			position: map_options.center,
			map: map,
			animation: google.maps.Animation.DROP,
			title: 'Heres2CoolStuff Clothing Store'
		}); 


	}

	google.maps.event.addDomListener(window, 'load', initialize);

	google.maps.event.addDomListener(window, "resize", function() {
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center); 
	});

 });
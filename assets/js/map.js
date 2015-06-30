$( document ).ready(function() {

	var map; //<-- This is now available to both event listeners and the initialize() function
	function initialize() {

		var map_options = {
			center: new google.maps.LatLng(39.943294, -75.162311),
			zoom: 13,
			scrollwheel: false,
			draggable:false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		map = new google.maps.Map(document.getElementById("map-canvas"),
			map_options);

		var image = '../../assets/images/map-logo.svg';
		var marker = new google.maps.Marker({
			position: map_options.center,
			map: map,
			animation: google.maps.Animation.DROP,
			title: 'Heres2CoolStuff Clothing Store',
			icon: image
		}); 

		var styles = [
		{
			stylers: [
			{ hue: "#511d29" },
			{ invert_lightness:false },
			{weight:0.5},
			{saturation:-63},
			{lightness:-11},
			{gamma:1.09}
			]
		}
		];

		map.setOptions({styles: styles});

	}

	google.maps.event.addDomListener(window, 'load', initialize);

	google.maps.event.addDomListener(window, "resize", function() {
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center); 
	});

 });
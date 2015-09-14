$(document).ready(function() {

	var $playLightbox = $('#play-lightbox'),
	$classLightbox = $('#class-lightbox'),
	$prevPlay = $('#prev-play'),
	$galleryImage = $('a.play'),
	$galleryEvent = $('a.event'),
	$moreInfo = $('a.more-info-link'),
	$slider = $('div.slide-play'),
	$eventslider = $('div.slide-event'),
	$sliderClass = $('div.slide-class'),
	$classes = $('section.classes'),
	$close = $('.lightbox-close');

	$galleryImage.on('click', function () {
		var $img_val = $(this).index() + 1;
		
		$slider.eq($img_val-1).removeClass('is-inactive');
		$slider.eq($img_val-1).addClass('is-active');

	});

	$galleryEvent.on('click', function () {
		var $img_val = $(this).index() + 1;

		$eventslider.eq($img_val-1).removeClass('is-inactive');
		$eventslider.eq($img_val-1).addClass('is-active');

	});

	$moreInfo.on('click', function () {
		var $btn_val = $(this).index() + 1;

		$classes.filter('more-info-link').eq($btn_val-1).index();

		$sliderClass.eq($btn_val-1).removeClass('is-inactive');
		$sliderClass.eq($btn_val-1).addClass('is-active');

	});

	$close.on('click', function(){
		$slider.removeClass('is-active');
		$slider.removeClass('is-active');
		$eventslider.removeClass('is-active');
		$eventslider.addClass('is-inactive');
		$sliderClass.addClass('is-inactive');
		$sliderClass.addClass('is-inactive');
	});

});
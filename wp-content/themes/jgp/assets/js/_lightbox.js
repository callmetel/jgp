$(document).ready(function() {

	var $playLightbox = $('#play-lightbox'),
	$classLightbox = $('#class-lightbox'),
	$prevPlay = $('#prev-play'),
	$galleryImage = $('a.play'),
	$moreInfo = $('a.more-info-link'),
	$slider = $('div.slide-play'),
	$sliderClass = $('div.slide-class'),
	$classes = $('section.classes'),
	$close = $('.lightbox-close');

	$galleryImage.on('click', function () {
		var $img_val = $(this).index() + 1;
		
		$slider.eq($img_val-1).removeClass('is-inactive');
		$slider.eq($img_val-1).addClass('is-active');

	});

	$moreInfo.on('click', function () {
		var $btn_val = $(this).index() + 1;

		$classes.filter('more-info-link').eq($btn_val-1).index();

		$sliderClass.eq($btn_val-1).removeClass('is-inactive');
		$sliderClass.eq($btn_val-1).addClass('is-active');

	});

	$close.on('click', function(){
		$slider.removeClass('is-active');
		$slider.addClass('is-inactive');
	});

});
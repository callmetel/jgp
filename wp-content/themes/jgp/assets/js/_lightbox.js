$(document).ready(function() {

	var $playLightbox = $('#play-lightbox'),
	$classLightbox = $('#class-lightbox'),
	$prevPlay = $('#prev-play'),
	$galleryImage = $('a.play'),
	$slider = $('div.slide-play'),
	$close = $('.lightbox-close');

	$galleryImage.on('click', function () {
		var $img_val = $(this).index() + 1;
		
		$slider.eq($img_val-1).removeClass('is-inactive');
		$slider.eq($img_val-1).addClass('is-active');

	});

	$close.on('click', function(){
		$slider.removeClass('is-active');
		$slider.addClass('is-inactive');
	})

});
$(document).ready(function() {

	var $playLightbox = $('#play-lightbox'),
	$classLightbox = $('#class-lightbox'),
	$play1 = $('#play-1'),
	$play2 = $('#play-2'),
	$play3 = $('#play-3'),
	$play4 = $('#play-4'),
	$play5 = $('#play-5'),
	$play6 = $('#play-6'),
	$class1 = $('#class-1'),
	$class2 = $('#class-2'),
	$class3 = $('#class-3'),
	$class4 = $('#class-4'),
	$prevPlay = $('#prev-play'),
	$galleryImage = $('a.play'),
	$slider = $('div.slide-play'),
	$close = $('.lightbox-close'),



	$thankyou = $('#signup-thankyou');

	$galleryImage.on('click', function () {
		var $img_val = $(this).index() + 1;
		
		$slider.eq($img_val-1).removeClass('is-inactive');
		$slider.eq($img_val-1).addClass('is-active');

	});

	$close.on('click', function(){
		$slider.removeClass('is-active');
		$slider.addClass('is-inactive');
	})
		// $submit.on('click', function() {
		// 	$form.submit(function( event ) {
		// 	  $thankyou.removeClass('is-inactive');
		// 	  $thankyou.addClass('fade-out');
		// 	  $signup.addClass('is-hidden');
		// 	  $lightbox.addClass('is-hidden');
		// 	  event.preventDefault();
		// 	});
		// });

		// $thankyou.on('webkitAnimationEnd', function(){ 
		// 	$(this).addClass('is-inactive');
		// 	$(this).removeClass('fade-out');

		// });

});
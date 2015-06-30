$(document).ready(function($) {

	// Declare variables

	var autoswitch = false;		//autoslide option
	var autoswitch_speed =8000; //auto slide speed 

	// Carousel Functionality

	$('.slide').first().addClass('is-active');
	$('.slide-copy').first().addClass('is-active');
	$('.slide-copy').addClass('is-inactive');

	$('#next').on('click', nextSlide);

	$('#prev').on('click', prevSlide);

	if(autoswitch === true){
		setInterval(nextSlide, autoswitch_speed)
	}

	function nextSlide(){

		var $active = $('.is-active');
		var	$firstSlide = $('.slide').first();
		var $firstSlideCopy = $('.slide-copy').first();


		if ($active.is(':last-child')) {
			$active.removeClass('is-active'); 
			$firstSlide.addClass('is-active');
			$firstSlide.addClass('slide-in');
			$firstSlideCopy.addClass('is-active');
		}
		else{
			$active.removeClass('is-active').next().addClass('is-active');
			$active.removeClass('slide-in').next().addClass('slide-in');
		}
	}

	function prevSlide(){

		var $active = $('.is-active'),
			$lastSlide = $('.slide').last(),
			$lastSlideCopy = $('.slide-copy').last();

			if ($active.is(':first-child')){
				$active.removeClass('is-active');
				$lastSlide.addClass('is-active'); 
				$lastSlide.addClass('slide-in-reverse'); 
				$lastSlideCopy.addClass('is-active');

			}
			else{
				$active.removeClass('is-active').prev().addClass('is-active');
				$active.removeClass('slide-in-reverse').prev().addClass('slide-in');
			}  
	}
});
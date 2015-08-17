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


	/* CODE BELOW IS FOR LIGHTBOX CAROUSEL*/

	//Plays

	$('.slide-play').first().addClass('is-active');
	$('.slide-copy').first().addClass('is-active');
	$('.slide-copy').addClass('is-inactive');

	$('#next').on('click', nextSlide2);

	$('#prev').on('click', prevSlide2);

	if(autoswitch === true){
		setInterval(nextSlide2, autoswitch_speed)
	}

	function nextSlide2(){

		var $active = $('.is-active');
		var	$firstSlidePlay = $('.slide-play').first();
		var $firstSlidePlayCopy = $('.slide-copy').first();


		if ($active.is(':last-child')) {
			$active.removeClass('is-active'); 
			$firstSlidePlay.addClass('is-active');
			$firstSlidePlay.addClass('fade-in');
			$firstSlidePlayCopy.addClass('is-active');
		}
		else{
			$active.removeClass('is-active').next().addClass('is-active');
			$active.removeClass('fade-in').next().addClass('fade-in');
		}
	}

	function prevSlide2(){

		var $active = $('.is-active'),
			$lastSlidePlay = $('.slide-play').last(),
			$lastSlidePlayCopy = $('.slide-copy').last();

			if ($active.is(':first-child')){
				$active.removeClass('is-active');
				$lastSlidePlay.addClass('is-active'); 
				$lastSlidePlay.addClass('fade-in'); 
				$lastSlidePlayCopy.addClass('is-active');

			}
			else{
				$active.removeClass('is-active').prev().addClass('is-active');
				$active.removeClass('fade-in').prev().addClass('fade-in');
			}  
	}

	//Plays
	
	$('.single-class').first().addClass('is-active');

	$('#next-class').on('click', nextClass);

	$('#prev-class').on('click', prevClass);

	function nextClass(){

		var $active = $('.is-active');
		var	$firstClass = $('.single-class').first();


		if ($active.is(':last-child')) {
			$active.removeClass('is-active'); 
			$firstClass.addClass('is-active');
			$firstClass.addClass('fade-in');
		}
		else{
			$active.removeClass('is-active').next().addClass('is-active');
			$active.removeClass('fade-in').next().addClass('fade-in');
		}
	}

	function prevClass(){

		var $active = $('.is-active'),
			$lastSlide = $('.slide').last();

			if ($active.is(':first-child')){
				$active.removeClass('is-active');
				$lastClass.addClass('is-active'); 
				$lastClass.addClass('fade-in'); 

			}
			else{
				$active.removeClass('is-active').prev().addClass('is-active');
				$active.removeClass('fade-in').prev().addClass('fade-in');
			}  
	}
});
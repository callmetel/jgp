$(document).ready(function() {
	var $subpgHeader = $('#sub-pg-header'),
		$events = $('#events'),
		$booking = $('#booking'),
		$contact = $('#contact'),
		$calendar = $('#calendar'),
		$subpageBg = $('.subpage-bg'),
		$toggleMenu = $('.toggle-menu'),
		$studioIndexLink = $('#studio-index-link'),
		$eventsLink = $('#events-link'),
		$bookingLink = $('#booking-link'),
		$contactLink = $('#contact-link'),
		$calendarLink = $('#calendar-link'),

		//State Variables
		$active = $('.is-active'),
		$inactive = $('.is-inactive');


	$eventsLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$subpgHeader.addClass('is-inactive');
		$booking.addClass('is-inactive');
		$contact.addClass('is-inactive');
		$calendar.addClass('is-inactive');
		$events.removeClass('is-inactive');
		$events.addClass('is-active');
		$events.addClass('fade-in');
	});

	$bookingLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$subpgHeader.addClass('is-inactive');
		$events.addClass('is-inactive');
		$contact.addClass('is-inactive');
		$calendar.addClass('is-inactive');
		$booking.removeClass('is-inactive');
		$booking.addClass('is-active');
		$booking.addClass('fade-in');

	});

	$contactLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$subpgHeader.addClass('is-inactive');
		$booking.addClass('is-inactive');
		$events.addClass('is-inactive');
		$calendar.addClass('is-inactive');
		$contact.removeClass('is-inactive');
		$contact.addClass('is-active');
		$contact.addClass('fade-in');
	});

	$calendarLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$subpgHeader.addClass('is-inactive');
		$booking.addClass('is-inactive');
		$events.addClass('is-inactive');
		$contact.addClass('is-inactive');
		$calendar.removeClass('is-inactive');
		$calendar.addClass('is-active');
		$calendar.addClass('fade-in');
	});

	$studioIndexLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blurOut 1s linear forwards;}</style>');
		$events.addClass('is-inactive');
		$booking.addClass('is-inactive');
		$contact.addClass('is-inactive');
		$calendar.addClass('is-inactive');
		$subpgHeader.removeClass('is-inactive');
		$subpgHeader.addClass('is-active');
		$subpgHeader.addClass('fade-in');
	});


	if($(window).width < 767) {
		$toggleMenu.removeClass('is-inactive'); 
		$toggleMenu.addClass('is-active');  
	}
	else{
		$toggleMenu.removeClass('is-active'); 
		$toggleMenu.addClass('is-inactive');
	}

});
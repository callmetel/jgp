$(document).ready(function() {
	var $subpgHeader = $('#sub-pg-header'),
		$aboutUs = $('#about-us'),
		$plays = $('#plays'),
		$auditions = $('#auditions'),
		$tickets = $('#tickets'),
		$classes = $('#classes'),
		$subpageBg = $('.subpage-bg'),
		$body = $('#bg-productions'),
		$toggleMenu = $('.toggle-menu'),
		$productionsIndexLink = $('#menu-item-115'),
		$aboutUsLink = $('#menu-item-116'),
		$playsLink = $('#menu-item-117'),
		$auditionsLink = $('#menu-item-118'),
		$ticketsLink = $('#menu-item-119'),
		$classesLink = $('#menu-item-120'),
		$mobileNav = $('.nav-mobile'),
		$auditionFormLink = $('#gform_submit_button_1'),

		//State Variables
		$active = $('.is-active'),
		$inactive = $('.is-inactive');


//Click Functions

	$aboutUsLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$plays.addClass('is-inactive');
		$auditions.addClass('is-inactive');
		$tickets.addClass('is-inactive');
		$classes.addClass('is-inactive');
		$body.removeClass('is-scrollable');
		$aboutUs.removeClass('is-inactive');
		$aboutUs.addClass('is-active');
		$aboutUs.addClass('fade-in');
	});

	$playsLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$aboutUs.addClass('is-inactive');
		$auditions.addClass('is-inactive');
		$tickets.addClass('is-inactive');
		$classes.addClass('is-inactive');
		$body.removeClass('is-scrollable');
		$plays.removeClass('is-inactive');
		$plays.addClass('is-active');
		$plays.addClass('fade-in');

	});

	$auditionsLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$plays.addClass('is-inactive');
		$aboutUs.addClass('is-inactive');
		$tickets.addClass('is-inactive');
		$classes.addClass('is-inactive');
		$body.removeClass('is-scrollable');
		$auditions.removeClass('is-inactive');
		$auditions.addClass('is-active');
		$auditions.addClass('fade-in');
	});

	$auditionFormLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$plays.addClass('is-inactive');
		$aboutUs.addClass('is-inactive');
		$tickets.addClass('is-inactive');
		$classes.addClass('is-inactive');
		$body.removeClass('is-scrollable');
		$auditions.removeClass('is-inactive');
		$auditions.addClass('is-active');
		$auditions.addClass('fade-in');
	});

	$ticketsLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$plays.addClass('is-inactive');
		$aboutUs.addClass('is-inactive');
		$auditions.addClass('is-inactive');
		$classes.addClass('is-inactive');
		$body.removeClass('is-scrollable');
		$tickets.removeClass('is-inactive');
		$tickets.addClass('is-active');
		$tickets.addClass('fade-in');
	});

	$classesLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$plays.addClass('is-inactive');
		$aboutUs.addClass('is-inactive');
		$auditions.addClass('is-inactive');
		$tickets.addClass('is-inactive');
		$classes.removeClass('is-inactive');
		$classes.addClass('is-active');
		$classes.addClass('fade-in');
	});

	$productionsIndexLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blurOut 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$aboutUs.addClass('is-inactive');
		$plays.addClass('is-inactive');
		$auditions.addClass('is-inactive');
		$tickets.addClass('is-inactive');
		$classes.addClass('is-inactive');
		$body.removeClass('is-scrollable');
		$subpgHeader.removeClass('is-inactive');
		$subpgHeader.addClass('is-active');
		$subpgHeader.addClass('fade-in');
	});


$(window).resize(function(){
	if($(window).width < 767) {
		$toggleMenu.removeClass('is-inactive'); 
		$toggleMenu.addClass('is-active');  
	}
	else{
		$toggleMenu.removeClass('is-active'); 
		$toggleMenu.addClass('is-inactive');
	}
});

});
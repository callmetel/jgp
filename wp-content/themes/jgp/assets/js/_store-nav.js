$(document).ready(function() {
	var $subpgHeader = $('#sub-pg-header'),
		$ourStory = $('#our-story'),
		$location = $('#location'),
		$donate = $('#donate'),
		$subpageBg = $('.subpage-bg'),
		$toggleMenu = $('.toggle-menu'),
		$storeIndexLink = $('#menu-item-111'),
		$ourStoryLink = $('#menu-item-110'),
		$locationLink = $('#menu-item-112'),
		$donateLink = $('#menu-item-114'),
		$mobileNav = $('.nav-mobile'),

		//State Variables
		$active = $('.is-active'),
		$inactive = $('.is-inactive');


//Click Functions

	$ourStoryLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$location.addClass('is-inactive');
		$donate.addClass('is-inactive');
		$ourStory.removeClass('is-inactive');
		$ourStory.addClass('is-active');
		$ourStory.addClass('fade-in');
	});

	$locationLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$ourStory.addClass('is-inactive');
		$donate.addClass('is-inactive');
		$location.removeClass('is-inactive');
		$location.addClass('is-active');
		$location.addClass('fade-in');

	});

	$donateLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blur 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$subpgHeader.addClass('is-inactive');
		$location.addClass('is-inactive');
		$ourStory.addClass('is-inactive');
		$donate.removeClass('is-inactive');
		$donate.addClass('is-active');
		$donate.addClass('fade-in');
	});

	$storeIndexLink.on('click', function(){
		$('head').append('<style>.subpage-bg:before{ animation: blurOut 1s linear forwards;}</style>');
		$('.nav-mobile').addClass('is-inactive');
		$('.nav-mobile').removeClass('is-active');
		$ourStory.addClass('is-inactive');
		$location.addClass('is-inactive');
		$donate.addClass('is-inactive');
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
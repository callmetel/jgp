$(document).ready(function() {
	//Define variables
	
	var
		$menu_li = $('.menu-item'),
		$menu_ul = $('.menu'),
		$store_menu = $('#menu-heres2coolstuff-menu'),
		$productions_menu = $('#menu-productions-menu'),
		$studio_menu = $('#menu-jgpstudio-menu'),
		$toggle_menu = $('.toggle-menu');
		
	var	$menuQuery = function(){

			if( $('ul').hasClass('menu')){
			if ($(window).width() <= 767){
				$menu_ul.addClass('nav-mobile');
				$menu_ul.removeClass('nav-desktop');
				$toggle_menu.removeClass('is-inactive');
				$toggle_menu.addClass('is-active');
				$menu_ul.addClass('is-inactive');
				$menu_ul.removeClass('is-active');
			}
			if ($(window).width() >= 768){
				$menu_ul.addClass('nav-desktop');
				$menu_ul.removeClass('nav-mobile');
				$toggle_menu.addClass('is-inactive');
				$toggle_menu.removeClass('is-active');
				$menu_ul.addClass('is-active');
				$menu_ul.removeClass('is-inactive');

			}
		} 

		}

	 $(function() {
            // Call on every window resize
            $(window).resize($menuQuery);
            // Call once on initial load
            $menuQuery();
        });	

});
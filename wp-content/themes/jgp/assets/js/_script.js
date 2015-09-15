$(document).ready(function(){

  // Body Animation

  $('body').fadeIn(500);
 
  var $aboutLink = $('#menu-item-135'),
      $contactLink = $('#menu-item-138');

  $aboutLink.on('click', function(){
      $('.menu').addClass('is-inactive');
      $('.menu').removeClass('is-active');
  });
  $contactLink.on('click', function(){
      $('.menu').addClass('is-inactive');
      $('.menu').removeClass('is-active');
  });

  // Nav Toggle Animation

  $('.toggle-menu').click(function(){
    $('.menu').toggleClass('is-active is-inactive');
  });


  //Ease Scrolling
$(window).resize(function(){
  if ($(window).width() >= 768){
    $(function() {
        $('a[href*=#]:not([href=#])').on('click', (function() { //get the 'a' anchor with a # but not ones with only a #
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) { //is the location of the pathname & hostname = to this pathname & hostname?
              var target = $(this.hash); //get the link; section id
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']'); //is the target length = to target? if not slice the target length down to 1
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
        }));
    });
  }
});



});
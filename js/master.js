$(document).ready(function(){
   $(window).scroll(function (){
     //everytime i scroll this function executes
      //if you hard code, then use console
      //.log to determine when you want the
      //nav bar to stick.
    // console.log($(window).scrollTop());
    // console.log($(window).width());
    if ($(window).scrollTop() > 212 || $(window).width() < 750) {
      $('#na').addClass('navbar-fixed-top');
      $('#na').addClass('transparent');
    }
    else if ($(window).scrollTop() < 212 && $(window).width() > 749) {
      $('#na').removeClass('navbar-fixed-top');
      $('#na').removeClass('transparent');
    }
    });

    $(window).resize(function (){
      //everytime i resize this function executes
      if ($(window).scrollTop() > 212 || $(window).width() < 750) {
        $('#na').addClass('navbar-fixed-top');
        $('#na').addClass('transparent');
      }
      else if ($(window).scrollTop() < 212 && $(window).width() > 749) {
        $('#na').removeClass('navbar-fixed-top');
        $('#na').removeClass('transparent');
      }
    });
});

(function($) {
    "use strict"; // Start of use strict
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 190)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

})(jQuery);

$(document).ready(function(){
   $(window).scroll(function (){
     //everytime i scroll this function executes
      //if you hard code, then use console
      //.log to determine when you want the
      //nav bar to stick.
    //  console.log($(window).scrollTop());
    //console.log($(window).width());
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

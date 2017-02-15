//This is for homepage scroll and resize

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

//for easing through page from navigation bar
//About and Contact
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

//Modal for editing students
$(document).on("click", ".editStudents", function () {
   var id = $(this).data('id');
   if(id != '')
     {
          $.ajax({
               url:"editstudents.php",
               method:"POST",
               data:{view:id},
               success:function(data){
                    $('#students_details').html(data);
                    $('#edit-students').modal('show');
               }
          });
     }
});

//Modal for editing meetings
$(document).on("click", ".editMeeting", function () {
   var id = $(this).data('id');
   if(id != '')
     {
          $.ajax({
               url:"editmeetings.php",
               method:"POST",
               data:{view:id},
               success:function(data){
                    $('#event_details').html(data);
                    $('#edit-meeting').modal('show');
               }
          });
     }
});

//Modal for editing Student-sanctions
$(document).on("click", ".editSanction", function () {
   var id = $(this).data('id');
   if(id != '')
     {
          $.ajax({
               url:"editsanctions.php",
               method:"POST",
               data:{view:id},
               success:function(data){
                    $('#sanction_details').html(data);
                    $('#edit-sanction').modal('show');
               }
          });
     }
});

//for deleting students individually
$(document).on("click", ".deleteStudent", function () {
   var id = $(this).data('id');
   var con = confirm("Are you sure?");
   if (con) {
     if(id != '')
       {
            $.ajax({
                 url:"editstudents.php",
                 method:"POST",
                 data:{delete:id},
                 success:function(data){
                      $('#students-table').html(data);
                 }
            });
       }
   }
});

//for deleting meeting individually
$(document).on("click", ".deleteMeeting", function () {
   var id = $(this).data('id');
   var con = confirm("Are you sure?");
   if (con) {
     if(id != '')
       {
            $.ajax({
                 url:"editmeetings.php",
                 method:"POST",
                 data:{delete:id},
                 success:function(data){
                      $('#meetings-table').html(data);
                 }
            });
       }
   }
});

//for deleting student-sanction individually
$(document).on("click", ".deleteSanction", function () {
   var id = $(this).data('id');
   var con = confirm("Are you sure?");
   if (con) {
     if(id != '')
       {
            $.ajax({
                 url:"editsanctions.php",
                 method:"POST",
                 data:{delete:id},
                 success:function(data){
                      $('#sanctions-table').html(data);
                 }
            });
       }
   }
});

// $(function(){
//     $('#searchname').keyup(function(event){
//         console.log("Im in here!");
//         var keyCode = event.which; // check which key was pressed
//         var term = $(this).val();
//         console.log(keyCode + " " + term);
//     });
// });

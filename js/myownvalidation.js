$(document).ready(function(){
  $("#bulletin-form").submit(function (event) {
    var formData = new FormData($(this)[0]);
      var file = $("#image").val();
      var title = $("#title").val();
      var post = $("#post").val();
      // var sub = $("#bulletin").val();
      if(file == ''){
        $('#imgerror').text("Feeling hacker ka na nyan?");
      }
      if(title == ''){
        $('#titleerror').text("Feeling hacker ka na nyan?");
        $('#errortitle').addClass("has-error");
      }
      if(post == ''){
        $('#posterror').text("Feeling hacker ka na nyan?");
        $('#errorpost').addClass("has-error");
      }
      if(file != '' && title != '' && post != ''){
            $("#bulletin-form").unbind('submit').submit()
            // $.ajax({
            //      url:"../process/bulletin.php",
            //      method:"POST",
            //      data: formData,
            //      async: false,
            //      success:function(data){
            //        console.log(data);
            //        window.location = "index.php";
            //      },
            //      error:function(data){
            //       console.log(" NOt Orayt!");
            //     },
            //      cache: false,
            //      contentType: false,
            //      processData: false
            // });
       }
       event.preventDefault();
  });

  $("#p-form").submit(function (event){
    var oldpass = $("#old-pass").val();
    var newpass = $("#new-pass").val();
    var conpass = $("#con-pass").val();
    if(oldpass == ''){
      $('#olderror').text("Seeees!");
    }
    if(newpass == ''){
      $('#newerror').text("Hacker!");
    }
    if(conpass == ''){
      $('#conerror').text("Kuno!");
    }
    event.preventDefault();
  });

});

 $(function() {

  var error = false;
  var error1 = false;
  var error2 = false;

  $("#image").focusout(function(){
    var file = this.files[0];
    var filetype = file['type'];
    var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
    var img = $("#image").val();
    console.log(filetype);
    if(img == ''){
      $('#imgerror').text("Image required!");
      $('#imgerror').show();
      error = true;
    }

    if($.inArray(filetype, ValidImageTypes) < 0){
      $('#imgerror').text("Invalid File Type");
      $('#imgerror').show();
      error = true;
    }
    else if (this.files[0].size/1024/1024 > 1) {
      $('#imgerror').text("File too large");
      $('#imgerror').show();
      error = true;
    }
    else{
      $('#imgerror').empty();
      error = false;
    }
    if(error == false && error1 == false && error2 == false){
      $("#bulletin-form").unbind('submit').submit();
      $("#bulletin").prop('disabled', false);
    }else{
      $("#bulletin").prop('disabled', true);
    }
  });

  $("#title").focusout(function(){
    var title = $("#title").val();
    var titlelength = title.length;
    if(titlelength > 0 && titlelength < 5 || titlelength > 20){
      $('#titleerror').text("Should be between 5-20 characters");
      $('#errortitle').addClass("has-error");
      $('#titleerror').show();
      error1 = true;
      }
    else if (titlelength == 0) {
      $('#titleerror').text("Title Required");
      $('#errortitle').addClass("has-error");
      $('#titleerror').show();
      error1 = true;
    }
    else{
      $('#titleerror').hide();
      $('#errortitle').removeClass("has-error");
      error1 = false;
    }
    if(error == false && error1 == false && error2 == false){
      $("#bulletin-form").unbind('submit').submit();
      $("#bulletin").prop('disabled', false);
    }else{
      $("#bulletin").prop('disabled', true);
    }
  });

  $("#post").focusout(function(){
    var post = $("#post").val();
    var postlength = post.length;
    if(postlength > 0 && postlength < 10 || postlength > 500){
      $('#posterror').text("Minimum: 10 - Maximum: 500");
      $('#errorpost').addClass("has-error");
      $('#posterror').show();
      error2 = true;
      }
    else if (postlength == 0) {
      $('#posterror').text("Title Required");
      $('#errorpost').addClass("has-error");
      $('#posterror').show();
      error2 = true;
    }
    else{
      $('#posterror').hide();
      $('#errorpost').removeClass("has-error");
      error2 = false;
    }
    console.log("error: "+ error);
    if(error == false && error1 == false && error2 == false){
      $("#bulletin-form").unbind('submit').submit();
      $("#bulletin").prop('disabled', false);
    }else{
      $("#bulletin").prop('disabled', true);
    }
  });
});

$(function (){

  var oldpass = '';
  var newpass = '';
  var conpass = '';
  var error = true;
  var error1 = true;
  var error2 = true;

  $('#old-pass').focusout(function(){
    oldpass = $(this).val();
    var name = $('#admin').val();
    if(oldpass == ''){
      $('#olderror').text("Required Field");
      $('#operror').addClass("has-error");
      error = true;
    }else{
      $('#olderror').empty();
      $('#operror').removeClass("has-error");
      error = false;
    }
    if(name != '' && oldpass != '')
      {
           $.ajax({
                url:"../process/checkpass.php",
                method:"POST",
                data:{name:name, pass:oldpass},
                dataType: 'json',
                success:function(data){
                  if(data == "false"){
                    $('#olderror').text("Password Incorrect");
                    $('#operror').addClass("has-error");
                    error = true;
                  }else{
                    $('#olderror').empty();
                    $('#operror').removeClass("has-error");
                    error = false;
                  }
                }
           });
      }
      else{
        $('#olderror').text("Password Required!");
        $('#operror').addClass("has-error");
        error = false;
      }

      if(error == false && error1 == false && error2 == false){
        $("#p-form").unbind('change').submit();
        $("#pbutton").prop('disabled', false);
      }else{
        $("#pbutton").prop('disabled', true);
      }
  });

  $('#new-pass').focusout(function(){
    newpass = $(this).val();
    if(newpass == ''){
      $('#newerror').text("Required Field");
      $('#nperror').addClass("has-error");
      error1 = true;
    }else{
      $('#newerror').empty();
      $('#nperror').removeClass("has-error");
      error1 = false;
    }
    var rgx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if(newpass == oldpass){
      $('#newerror').text("New ganee!");
      $('#nperror').addClass("has-error");
      error1 = true;
    }
    else if(!rgx.test(newpass)){
        $('#newerror').text("Must contain #,A,a & 8 minimum char");
        $('#nperror').addClass("has-error");
        error1 = true;
      }
    else{
      $('#newerror').empty();
      $('#nperror').removeClass("has-error");
      error1 = false;
    }

    if(error == false && error1 == false && error2 == false){
      $("#p-form").unbind('submit').submit();
      $("#pbutton").prop('disabled', false);
    }else{
      $("#pbutton").prop('disabled', true);
    }
  });

  $('#con-pass').focusout(function(){
    conpass = $(this).val();
    if(conpass == ''){
      $('#conerror').text("Required Field");
      $('#cperror').addClass("has-error");
      error2 = true;
    }
    else{
      $('#conerror').empty();
      $('#cperror').removeClass("has-error");
      error2 = false;
    }

    if(conpass != newpass){
      $('#conerror').text("Re-type the password correctly!");
      $('#cperror').addClass("has-error");
      error2 = true;
    }
    else{
      $('#conerror').empty();
      $('#cperror').removeClass("has-error");
      error2 = false;
    }

    if(error == false && error1 == false && error2 == false){
      $("#p-form").unbind('submit').submit();
      $("#pbutton").prop('disabled', false);
    }else{
      $("#pbutton").prop('disabled', true);
    }
  });

});

$(function (){

var nameerror = true;
var dateerror = true;

  $('#event').focusout(function(){
    console.log("inside");
    var eventname = $("#eventname").val();
    console.log(eventname);
    var rgx = /^([a-zA-Z0-9 _-]+)$/;
    if(!rgx.test(eventname)){
      console.log("here");
      $("#event").addClass("has-error");
      nameerror = true;
    }
    else {
      $("#event").removeClass("has-error");
      nameerror = false;
    }

    if(nameerror == false && dateerror == false){
      $("#eventsubmit").prop('disabled', false);
    }
    else{
      $("#eventsubmit").prop('disabled', true);
    }
  })

  $('#eventdate').focusout(function(){
    var eventdate = $("#dateevent").val();
    var dateReg = /^\d{4}([-/])\d{2}\1\d{2}$/
    if(!dateReg.test(eventdate)){
      $("#eventdate").addClass("has-error");
      dateerror = true;
    }
    else{
      $("#eventdate").removeClass("has-error");
      dateerror = false;
    }

    if(nameerror == false && dateerror == false){
      $("#eventsubmit").prop('disabled', false);
    }
    else{
      $("#eventsubmit").prop('disabled', true);
    }
  })

  $('#penalty').focusout(function(){
    console.log("In!");
    var sanction = $("#penaltyfield").val();
    var rgx = /^([0-9]+)$/;
    if(!rgx.test(sanction)){
      $("#penalty").addClass("has-error");
      nameerror = true;
    }
    else {
      $("#penalty").removeClass("has-error");
      nameerror = false;
    }

    if(nameerror == false && dateerror == false){
      $("#eventsubmit").prop('disabled', false);
    }
    else{
      $("#eventsubmit").prop('disabled', true);
    }
  })

});

// $('#image').bind('change', function(){
//   alert('this file size is: ' + this.files[0].size/1024/1024 + "MB");
// });

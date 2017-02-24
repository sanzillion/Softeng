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

  $("#pass-form").submit(function (event){
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

  $('#old-pass').focusout(function(){
    oldpass = $(this).val();
    var name = $('#admin').val();
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
                  }else{
                    $('#olderror').empty();
                    $('#operror').removeClass("has-error");
                  }
                }
           });
      }
      else{
        $('#olderror').text("Password Required!");
        $('#operror').addClass("has-error");
      }
  });

  $('#new-pass').focusout(function(){
    newpass = $(this).val();
    if(oldpass != ''){
      if(newpass == oldpass){
        $('#newerror').text("Password Incorrect");
        $('#nperror').addClass("has-error");
        console.log("Same");
      }
      else{
        console.log("Not the same");
        $('#newerror').empty();
        $('#nperror').removeClass("has-error");
      }
    }
    if(newpass == ''){
      $('#newerror').text("Required Field!");
      $('#nperror').addClass("has-error");
    }
    else{
      $('#newerror').empty();
      $('#nperror').removeClass("has-error");
    }
    var rgx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if(rgx.test(newpass)){
      $('#newerror').text("Must contain a number, an uppercase and a lowercase and atleast 8 minimum characters!");
      $('#nperror').addClass("has-error");
    }
    else{
      $('#newerror').empty();
      $('#nperror').removeClass("has-error");
    }
  });
});

// $('#image').bind('change', function(){
//   alert('this file size is: ' + this.files[0].size/1024/1024 + "MB");
// });

$(function () {
    $("#register-link").click(function () {
      $("#login-box").hide();
      $("#register-box").show();
    });
    $("#login-link").click(function () {
      $("#login-box").hide();
      $("#register-box").show();
    });
    $("#forgot-link").click(function () {
      $("#login-box").hide();
      $("#forgot-box").show();
    });
    $("#back-link").click(function () {
      $("#login-box").show();
      $("#forgot-box").hide();
    });

    //Register Ajax Request
    $(document).on("click", "#register-btn", function(e) {
      if($("#register-form")[0].checkValidity()){
        e.preventDefault();
        //alert("Hello");
        $("#register-btn").val('Please Wait...');
        if($("#rpassword").val() != $("#cpassword").val()){
          $("#passError").text('* Password did not matched!');
          $("#register-btn").val('Sign Up');

        }
        else{
          $("#passError").text('');
          $.ajax({
            url: 'assets/php/action.php',
            method: 'post',
            data: $("#register-form").serialize()+'&action=register',
            success:function(response){
              $("#register-btn").val('Sign Up');

              //console.log(response);
              if(response === 'register'){
                window.location = 'index.php';
              }
              else{
                $("#regAlert").html(response);
              }
            }
          });
        }

    }

  });


  $("#login-btn").click(function(e) {
    if ($("#login-form")[0].checkValidity()) {
        e.preventDefault();

        $("#login-btn").val('Please Wait...');
        $.ajax({
            url: "assets/php/action.php",
            method: 'post',
            data: $("#login-form").serialize() + '&action=login',
            success: function(response) {
                console.log(response);
                $("#login-btn").val('Sign in');
                if(response === 'login'){
                  window.location = 'home.php';
                }
                else{
                  $("#loginAlert").html(response);
                }
            }
            
        });
    }
});


$("#forgot-btn").click(function(e){
  if($("#forgot-form")[0].checkValidity()){
    e.preventDefault();

    $("#forgot-btn").val('Please Wait...');

    $.ajax({
      url: "assets/php/action.php",
      method: 'post',
      data: $("#forgot-form").serialize() + '&action=forgot',
      success:function(response){
        console.log(response);
        $("#forgot-btn").val('Reset Password');
        $("#forgot-form")[0].reset();
        
        // Construye un mensaje legible para el usuario
        var message = "<ul>";
        $.each(response, function(key, value) {
            message += "<li><strong>" + key + ":</strong> " + value + "</li>";
        });
        message += "</ul>";
    
        $("#forgotAlert").html(message);
    }
  
    });
    
  }
});



    
  

  });
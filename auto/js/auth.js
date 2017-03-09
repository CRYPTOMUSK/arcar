$("#button-auth").click(function() {
  var auth_login = $("#auth_login").val();
  var auth_pass = $("#auth_pass").val();

  if (auth_login == "") {
    $("#auth_login").css("borderColor","#e74c3c");
    send_login = 'no';
  } else {
    $("#auth_login").css("borderColor","#2ecc71");
    send_login = 'yes';
  }

  if (auth_pass == "") {
    $("#auth_login").css("borderColor","#e74c3c");
    send_pass = 'no';
  } else {
    $("#auth_pass").css("borderColor","#2ecc71");
    send_pass = 'yes';
  }

  if (send_login == 'yes' && send_pass == 'yes') {
    $("#button-auth").hide();
  }

  $.ajax ({
    type: "POST",
    url: "include/auth.php",
    data: "login="+auth_login+"&pass="+auth_pass,
    dataType: "html",
    cache: false,
    success: function(data) {
      if (data == 'yes_auth') {
        location.reload();
      } else {
        $("#message-auth").slideDown(400);
        $(".auth-loading").hide();
        $("#button-auth").show();
      }
    }
  })
})

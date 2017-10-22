function submit_signup() {
    var data = {
        username: $('#username').val(),
        email: $('#email').val(),
        password: $('#password').val()
    }
    
    $.ajax({
        type: "POST",
        url: "services/create_user.php",
        data: data,
        dataType: "json",
        success: function(response, textStatus, xhr) {
            $('#error').slideUp();
            $('#success').slideDown().text("You've signed up successfully.. Redirecting to Homepage..");
            setTimeout(function() {
                window.location.href = '/index.php';
            }, 1000)
        },
        error: function(response, textStatus, xhr) {
            var message = response.responseJSON.error;
            $("#error").slideDown().html(message);
        }
    });
}
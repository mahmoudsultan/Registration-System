function submit_signin() {
    var data = {
        email: $('#email').val(),
        password: $('#password').val()
    }
    
    $.ajax({
        type: "POST",
        url: "services/login.php",
        data: data,
        dataType: "json",
    }).done(function(response, textStatus, xhr) {
        $('#error').slideUp();
        $('#success').slideDown().text("You've logged in successfully.. Redirecting to Homepage..");
        setTimeout(function() {
            window.location.href = '/index.php';
        }, 1000)
    }).fail(function(response, textStatus, xhr) {
        var message = "Invalid Email or Password..";
        $("#error").slideDown().html(message);
    });
}
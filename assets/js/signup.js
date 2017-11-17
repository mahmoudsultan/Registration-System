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

function validateUsername(username, callback) {
    if (!username) {
        return false;
    }

    var available;
    var data = {
        username: username
    };

    $.ajax({
        type: "POST",
        url: "services/check_username.php",
        data: data,
        dataType: "json",
        success: function(response, textStatus, xhr) {
            callback(response.available);
        },
        error: function(response, textStatus, xhr) {
            callback(false);
        }
    });
}

function displayAlert(available) {
    if (!available) {
        $("#username").addClass("error-input").removeClass("correct-input");
        $("#username_help").slideDown();
    } else {
        $("#username").removeClass("error-input").addClass("correct-input");
        $("#username_help").slideUp();
    }
}


function displayEmailAlert(correct) {
    if (!correct) {
        $("#email").addClass("error-input").removeClass("correct-input");
        $("#email_help").slideDown();
    } else {
        $("#email").removeClass("error-input").addClass("correct-input");
        $("#email_help").slideUp();
    }
}

function validateEmailAddress() {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#email').val())
}

$(document).ready(function() {
    // validate that username is not used before
    $("#username").change(function() {
        validateUsername($("#username").val(), displayAlert);
    });

    $("#email").change(function() {
        displayEmailAlert(validateEmailAddress());
    });

    // when submit is click validate first username then submit
    $("#signup_button").click(function () {
        if (!validateEmailAddress()) {
            displayEmailAlert(false);
        } else {
            validateUsername($("#username").val(), function(available) {
                if (available) {
                    submit_signup();
                } else {
                    displayAlert(available);
                }
            })
        }
    });
});
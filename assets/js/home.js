function choose_department(userID) {
    var data = {
        userID: userID,
        departmentID: $('#department').val()
    }
    
    $.ajax({
        type: "POST",
        url: "services/choose_department.php",
        data: data,
        dataType: "json",
        success: function(response, textStatus, xhr) {
            $('#error').slideUp();
            $('#success').slideDown().text("You've selected this departemnt succesfully.. refreshing the Homepage..");
            setTimeout(function() {
                console.log("Yup");
                location.reload(true);
            }, 1000)
        },
        error: function(response, textStatus, xhr) {
            var message = "Something went wrong..";
            $("#error").slideDown().html(message);
        }
    });
}
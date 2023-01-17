$(document).ready(function() {
 
    // function to handle login
    $('.login_submit').click(function() {
        let username = $("#username").val()
        let password = $("#password").val()
        let accountType = $("#account_type").val()
        // console.log(username);
        // console.log(password);
        // console.log(accountType);
        $.ajax({
        type: 'POST',
        url: 'login.php',
        data: { username: username, password: password, account_type: accountType },
        success: function(data) {
            console.log(data);
            if (data === "successful") {
            location.reload(true);
            } else if (data === "incorrectPassword") {
            $("#password").addClass("input_error");
            $(".incorrectPassword").css({"opacity": 1, "transform": "translateY(-50px)"});
            setTimeout(() => {
                $(".incorrectPassword").css({"opacity": 0, "transform": "translateY(0px)"});
            }, 2000);
            
            } else if (data === "invalidUser") {
            $("#username").addClass("input_error");
            $(".invalidUser").css({"opacity": 1, "transform": "translateY(-50px)"});
            setTimeout(() => {
                $(".invalidUser").css({"opacity": 0, "transform": "translateY(0px)"});
            }, 2000);
            
            } else if (data === "invalidAccount") {
            $("#account_type").addClass("input_error");
            $(".invalidAccount").css({"opacity": 1, "transform": "translateY(-50px)"});
            setTimeout(() => {
                $(".invalidAccount").css({"opacity": 0, "transform": "translateY(0px)"});
            }, 2000);
            }
        }
        });
    });

    // function to remove error class in login input on keyup
    $("#password, #username, #account_type").click(function() {
        $("#password, #username, #account_type").removeClass("input_error");
    });

    // onclick the checkbox, show typed password
    $('#show-password').change(function() {
        var input = $('#password');
        if(this.checked) {
        input.attr('type', 'text');
        } else {
        input.attr('type', 'password');
        }
    });

});
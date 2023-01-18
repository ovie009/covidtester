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

    console.log(getCookie("account_type"))
    if (getCookie("account_type") === "Patient") {
        $.ajax({
            type: 'GET',
            data: { id: 1 },
            url: 'load_readings.php',
            success: function(response) {
                $('#readings').html(response);
                console.log('refreshing data')
            }
        });

        setInterval(() => {
            $.ajax({
                type: 'GET',
                data: { id: 1 },
                url: 'load_readings.php',
                success: function(response) {
                    $('#readings').html(response);
                    console.log('refreshing data')
                }
            });
            
        }, 5000);

    } else if (getCookie("account_type") === "Doctor") {
        $.ajax({
            type: 'GET',
            data: { id: 1 },
            url: 'table_readings.php',
            success: function(response) {
                $('table').html(response);
                console.log('refreshing data')
            }
        });

        setInterval(() => {
            $.ajax({
                type: 'GET',
                data: { id: 1 },
                url: 'table_readings.php',
                success: function(response) {
                    $('table').html(response);
                    console.log('refreshing data')
                }
            });
            
        }, 5000);
    }



    
  // function to get the value of a cookie
  function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

});
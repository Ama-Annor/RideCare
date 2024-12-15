/**signup.js */
$("#submit").click(function (event) {
    event.preventDefault();
    // Disable submit button and show loading state
    $("#submit").prop("disabled", true);
    $("#submit").html("Loading...");

    // Get input values
    const username = $("#uname").val().trim();
    const gender = $("input[name='gender']:checked").val();
    const phoneNumber = $("#phone_number").val().trim();
    const email = $("#register_email").val().trim();
    const password = $("#register_password").val().trim();
    const confirmPassword = $("#register_password1").val().trim();

    // Check if any field is empty
    if (!username || !gender || !phoneNumber || !email || !password || !confirmPassword) {
        $("#error").html("Please fill in all fields");
        $("#submit").prop("disabled", false);
        $("#submit").html("Sign Up");
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        $("#error").html("Passwords do not match");
        $("#submit").prop("disabled", false);
        $("#submit").html("Sign Up");
        return;
    }
  
    $.ajax({
      url: "../actions/signup_action.php",
      // url: "../functions/functions.php",
      method: "post",
      data: JSON.stringify({
        username: $("#uname").val(),
        gender: $("input[name='gender']:checked").val(),
        phone_number: $("#phone_number").val(),
        register_email: $("#register_email").val(),
        register_password: $("#register_password").val(),
        register_password1: $("#register_password1").val(),
      }),
      dataType: "json",
      success: (data, status) => {
        console.log(data, status);
        if (data.status == 201 || status == "success") {
          window.location.href = "../login/login.php";
        }
      },
      error: (error) => {
        console.log(error);
        var responseData = JSON.parse(error.responseText);
        document.getElementById("error").innerHTML = responseData.message;
      },
    });
  });

        $(document).ready(function() {
            $("#reset-button").click(function() {
                var oldpass = $("#oldpass").val();
                

                // Client-side validation
                if (oldpass === "" ) {
                    $("#password-error").text("Both fields are required.");
                    return;
                }

                // Clear any previous error message
                $("#password-error").text("");

                // Send data to server using AJAX
                $.ajax({
                    type: "POST",
                    url: "passreset2.php",
                    data: {
                        oldpass: oldpass,
                       
                    },
                    success: function(response) {
                        if (response === "success") {
                            // Redirect to the login page or display a success message
                            window.location.href = "http://localhost:3000/backend/login.php";
                        } else {
                            $("#password-error").text("Error updating password: " + response);
                        }
                    }
                });
            });
        });
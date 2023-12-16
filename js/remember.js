$(document).ready(function() {
    $("#verify").click(function(e) {
        e.preventDefault(); // Prevent the form from submitting

        var email = $("#email").val(); // Get the email from the input field

        // Clear any previous error message
        $(".error-message").text("");

        // Send data to the server for email verification using AJAX
        $.ajax({
            type: "POST",
            url: "resetlink.php", // Use the correct URL
            data: {
                email: email,
            },
            success: function(response) {
                if (response === "success") {
                    // Email matches a record in the database; proceed with password reset
                    window.location.href = "http://localhost:3000/backend/passreset.php";
                } else {
                    // Email does not match; display an error message
                    var errorContainer = $(".error-message");
                    errorContainer.text(response);
                    errorContainer.css("display", "block");
                }
            },
            error: function(xhr, status, error) {
                // Handle any AJAX errors here
                console.log("AJAX Error: " + error);
            }
        });
    });
});

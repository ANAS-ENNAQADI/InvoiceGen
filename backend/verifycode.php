<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password-Reset</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="/js/verifyco.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="website icon" type="image/png" href="/photo/Picsart_23-08-27_16-09-36-931.png">
   <link rel="stylesheet" href="/css/verifycde.css">
</head>
<body>
<center>
        
        <form id="fom"  action="verifyco.php" method="post">
       
        
       
        <div class="verification-code-container">
        <h1 >Check your email</h1>
        <br>
        <p id="p">we've sent the code to your email</p>
        <div class="error-message"></div>
        <input type="text" id="token" name="toke" placeholder="Enter verification code">
        
        <p id="countdown-timer"></p>
        <button type="submit" id="verify">Verify</button>
      <br>
      <button type="button" id="send">Send again</button>
      
    
      <div id="success-message" style="display: none;">
    <p class="success-text"><i class="fas fa-check-circle"></i> <span class="message-text"></span></p>
</div>
      
<script>
$(document).ready(function() {
    $("#verify").click(function(e) {
        e.preventDefault(); // Prevent the form from submitting

        var token = $("#token").val();

        // Clear any previous error message
        $(".error-message").text("");

        // Send data to the server for token verification using AJAX
        $.ajax({
            type: "POST",
            url: "verifyco.php", // Use the correct URL
            data: {
                token: token,
            },
            success: function(response) {
                if (response === "success") {
                    // Token is correct; redirect to the password reset page
                    window.location.href = "http://localhost:3000/backend/passreset.php";
                } else {
                    // Token is incorrect; display an error message
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
</script>








    
   


    
    </form>
    </center>
</body>
</html>
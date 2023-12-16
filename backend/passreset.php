<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password-Reset</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <link rel="website icon" type="image/png" href="/photo/Picsart_23-08-27_16-09-36-931.png">
    <link rel="stylesheet" href="/css/resetpass.css">
    <script src="/js/resetpass.js"></script>
</head>
<body>
    <div class="container">
        <h1>Reset Your Password</h1>
       
        <form id="reset-password-form" action="passreset2.php" method="post" onsubmit="return validatePassword()">
           <p>Enter a New Password For Your Account !!</p>
           <input type="password" name="oldpass" id="oldpass" placeholder="New Password">
           <input type="password" placeholder="Confirm Password" id="password" name="password" required>
           <div id="password-error" style="color: red;"></div>
           <button  id="reset">Reset Password</button>
        </form>
    </div>
</body>
</html>

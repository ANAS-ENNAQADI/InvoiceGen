<!DOCTYPE html>
<html>
<head>
    <title>Forgot-Password</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="website icon" type="image/png" href="/photo/Picsart_23-08-27_16-09-36-931.png">
    <script src="/js/remember.js"></script>
    <link rel="stylesheet" href="/css/remember.css">
</head>
<body>
    <center>
    <form action="resetlink.php" method="post">
        <div class="container">
        <h1>Forgot Password</h1>
        
        <label>Please enter your email adress and we'll <br> 
            send you a link to reset your password.</label>
        <br><br>
        <div class="error-message"></div>
        <input type="email" placeholder="Email" name="email" id="email" required>
        <br><br>
        <button type="submit">Send Reset Link</button>
        </div>
    </form>
</center>
</body>
</html>

<!DOCTYPE html>
<html>
    <head>
        
        <title> Sign In - Invoiced</title>
       <link rel="stylesheet" href="/css/login.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       <link rel="website icon" type="image/png" href="/photo/Picsart_23-08-27_16-09-36-931.png">
    </head>
    <body class="body">
        <script src="/js/log.js"></script>
        <main>

<form action="login1.php" method="POST">


   
            <center>
                
<?php
$email=null;
$pass = null;
            session_start(); // Start the session
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        $pass= $_SESSION['pass'];
        $email = $_SESSION['email'];
        echo '<div class="error"><p>' . $error . '</p></div>';
        unset($_SESSION['error']); // Clear the error message from the session after displaying it
    }?>
               <div class="top">
                <a><img id alt="invoice" src="/photo/Picsart_23-08-27_16-09-36-931.png"></a>

                <a  href="http://127.0.0.1:5500/html/body.html"> <label >Invoiced</label></a>
                           </div>
<div class="log">
    <p>welcome back!</p>
<div class="but" >

<input name="email" id="mail" value="<?php  echo$email ; ?>" type ="email" required placeholder="Email">
<br>
<input name="pass" id="pass" value="<?php echo$pass;  ?>" type ="password" required placeholder="Password">

</div>
<i id="eye-icon" class="eye-icon fas fa-eye" onclick="toggleEye()"></i>
<div class="rem">
<input id="in"  type="checkbox" style="cursor:pointer;" ><label style="cursor:pointer;font-family:tahoma;font-size:15px" for="in">Remember me</label>
<a href="remember.php"> forgot password?</a>
</div>
<button class="bt" type="submit"> SIGN IN</button>


</div>
<div class="foot">

<p>Don’t have an account? <a href="sign1.php" >Join us.</a></p>

</div>
</center>
</form>
        </main>
    </body>
</html>
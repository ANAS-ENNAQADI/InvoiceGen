
<?php
session_start();
include"dbconnect.php";

// Check for database connection errors
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['first_N']) && isset($_POST['last_N'])&& isset($_POST['email'])&& isset($_POST['pass'])&& isset($_POST['country'])) {
    // Sanitize the input
    $first_N =  $_POST['first_N'];
    $last_N =  $_POST['last_N'];
    $email =$_POST['email'];
    $pass = $_POST['pass'];
    $country = $_POST['country'];
    // Perform necessary database operations or other actions here
    // For example, you could insert the data into the database
    $query = "INSERT INTO user (First_N, Last_N,Email,Pasword,Country) VALUES ('$first_N', '$last_N','$email','$pass','$country')";
    if (mysqli_query($con, $query)) {
        header("location:login.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

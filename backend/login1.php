<?php
session_start();
include "dbconnect.php";

$email = $_POST['email'];
$pass = $_POST['pass'];
$error = "";
$name = null;
$id = null;

// Use prepared statements to prevent SQL injection
$sql = "SELECT id_user, Email, Pasword, First_N FROM user WHERE Email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    
    // Check if the stored password is hashed or not
    if (password_verify($pass, $row['Pasword']) || $pass === $row['Pasword']) {
        $_SESSION['id'] = $row['id_user'];
        $_SESSION['name_user'] = $row['First_N'];
        header("Location: body.php");
        exit();
    }else {
        $error = "The email or password is wrong";
        $_SESSION['email'] = $email; // Store the email in the session for reuse in login.php
        $_SESSION['pass'] = $pass;
        $_SESSION['error'] = $error; // Store the error message in a session variable
        header("Location: login.php");
        exit();
    }
} 


?>
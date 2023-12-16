<?php
// Start a session to access the stored token
session_start();
include "dbconnect.php";
if (isset($_SESSION['emaili'])) {
    $email = $_SESSION['emaili'];
    // Debugging statement
} 

// Check if the token is provided in the POST data
$tokenInput = $_POST["token"]; // Adjust the name to match your HTML input

// Fetch the reset token from the database
$sql = "SELECT reset_token FROM user WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $realtoken);
mysqli_stmt_fetch($stmt);

// Check if the token matches the one stored in the session
if ($realtoken == $tokenInput) {
    // The token is correct; you can proceed with password reset logic here

    // Optionally, you can unset or destroy the session token if it's no longer needed.
    
    echo "success"; // Send a success response
} else {
    // The token is incorrect; send an error response
    echo "Invalid token. Please check the code you entered.";
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>

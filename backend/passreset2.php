<?php

session_start();


$pass = $_POST["password"];
$id_user = $_SESSION["id_user"]; // Assuming you have the correct user ID here

// Establish a database connection
$mysqli = include "dbconnect2.php";

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Escape the password (sanitize it)
$pass = password_hash(mysqli_real_escape_string($mysqli, $pass), PASSWORD_DEFAULT);

// Build and execute the SQL statement using a prepared statement
$sql = "UPDATE user SET Pasword = ? ,reset_token=null,reset_token_expires=null WHERE id_user = ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("si", $pass, $id_user); // "si" stands for "string" and "integer"
    
    if ($stmt->execute()) {
        header("Location: http://localhost:3000/backend/login.php");
        exit; // Important: exit after the header to prevent further execution
    } else {
        echo "Error updating password: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $mysqli->error;
}

$mysqli->close();
?>

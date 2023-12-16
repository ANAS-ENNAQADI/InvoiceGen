<?php
// Replace the database connection details below with your own
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'invoice';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

return $mysqli; // Return the mysqli connection object
?>

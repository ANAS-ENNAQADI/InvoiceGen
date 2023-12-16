<?php
// php_page.php

session_start(); // Start the session

include "dbconnect.php";
$data[]=array();

// Get the user's session data (assuming you have a user_id stored in the session)
$user_id = $_SESSION['id'];

// Prepare the database query with the session condition
$query = "SELECT customer,bill_to,total,typee,da_te FROM invoices WHERE id_user = '$user_id'"; // Replace "your_table_name" and "user_id" with the actual table and session variable names

$result = mysqli_query($con, $query);
$numrows=mysqli_num_rows($result);
if ($row =mysqli_num_rows($result)>0){
  while( $row = mysqli_fetch_assoc($result)){
    $data[] =$row;
  }

}

header('Content-Type: application/json');
echo json_encode($data);

?>

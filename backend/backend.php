<?php
session_start();

include "dbconnect.php"; // Include your database connection file


  


$date = $_POST['da_te'];
$paymentTerms = $_POST['pay_terms'];
$dueDate = $_POST['due_date'];
$poNumber = $_POST['po_number'];
$customer = $_POST['customer'];
$billTo = $_POST['bill_to'];
$shipTo = $_POST['ship_to'];
$num = $_POST['num'];
$total = $_POST['total'];
$notes = $_POST['notes'];
$terms = $_POST['terms'];
$id_user = $_SESSION['id'];
$type = $_POST['type'];
$logo = $_POST['logo'];


$query = "INSERT INTO invoices (id_user, numInv, customer, bill_to, ship_to, da_te, pay_terms, due_date, po_number, currency, typee, notes, terms, logo,total) VALUES ('$id_user', '$num', '$customer', '$billTo', '$shipTo', '$date', '$paymentTerms', '$dueDate', '$poNumber', '$currency', '$type', '$notes', '$terms', '$logo','$total')";


if (mysqli_query($con, $query)) {
  
} else {
    echo "Error: " . mysqli_error($con);
}
// Effectuer la requête SELECT pour obtenir id_Inv

 // Get form data
$items = $_POST["item"];
$quantities = $_POST["quantity"];
$rates = $_POST["rate"];
$amounts = $_POST["amount"];

// Prepare and execute SQL INSERT statement
$stmt = $con->prepare("INSERT INTO product (item, quantity, rate, amount, currency, id_Inv) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssss", $item, $quantity, $rate, $amount, $currency, $id_Inv);

// Get the ID of the invoice (assuming it's the same for all products)
$querry4 = "SELECT id_Inv FROM invoices WHERE po_number = $poNumber";
$result = mysqli_query($con, $querry4);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $id_Inv = $row['id_Inv'];

    // Loop through form data and insert into the database
    foreach ($items as $index => $item) {
        $quantity = $quantities[$index];
        $rate = $rates[$index];
        $amount = $amounts[$index];
        $currency = $_POST['currency'];
        $stmt->execute();
    }

    // Insert into "avoir" table with the same id_Inv
   
} else {
    // Handle SELECT error for invoice ID here if needed
    echo "Erreur lors de la requête SELECT pour l'ID de la facture : " . mysqli_error($con);
}

?>

<?php
// Generate a unique token
session_start();

include "dbconnect.php";
// Generate a unique token with six random numbers
$token = "";
for ($i = 0; $i < 6; $i++) {
    $token .= mt_rand(0, 9); // Append a random digit (0-9)
}
$_SESSION["reset_token"] = $token;




$expiry = date("Y-m-d H:i:s", time() + 60 * 3);
$email=$_POST['email'];
// User's email address
 $_SESSION["emaili"]=$email; // Assuming you get the email from a form

$querry = "SELECT id_user from user where email = '$email'";
$result = mysqli_query($con, $querry);

if ($result) {
    // La requête s'est exécutée avec succès, nous devons extraire l'ID de l'utilisateur
    $row = mysqli_fetch_assoc($result);
    $id_user = $row['id_user'];

    // Stocker l'ID de l'utilisateur en session
    $_SESSION['id_user'] = $id_user;

    // Libérer le résultat de la requête
    mysqli_free_result($result);
} else {
    // Gérer les erreurs de requête ici si nécessaire
    echo "Error: " . mysqli_error($con);
}

// Establish a database connection
$mysqli = require "dbconnect2.php";

// Escape user input using mysqli_real_escape_string
$email = mysqli_real_escape_string($mysqli, $email);

// Construct the SQL statement
$sql = "UPDATE user
        SET reset_token = '$token',
            reset_token_expires = '$expiry'
        WHERE email = '$email'";

// Execute the SQL statement
if (mysqli_query($mysqli, $sql)) {
    
} 

// Close the database connection
mysqli_close($mysqli);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

// Create a PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Enable SMTP debugging (optional)
    $mail->SMTPDebug = SMTP::DEBUG_OFF;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    // Set up SMTP configuration for Gmail
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com"; // Gmail SMTP server
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Use 587 for TLS
    $mail->Username = "invoicegen23@gmail.com"; // Your Gmail email address
    $mail->Password = "xaiehquremzjbygd"; // Your Gmail app password
    
    // Set email attributes
    $mail->addCustomHeader("List-Unsubscribe: <mailto:invoicegen23@gmail.com?subject=Unsubscribe>");
    $mail->setFrom("invoicegen23@gmail.com", "invoiceGen");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->isHtml(true);

    // Email content with the reset token

    $mail->Body = "This is your verification email code : $token ";

    // Send the email
   if ( $mail->send()){

   
   }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
}

?>

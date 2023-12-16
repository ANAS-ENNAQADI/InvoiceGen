<?php
// Generate a unique token
session_start();

use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

include "dbconnect.php";

$email = $_POST["email"]; // Email received from the client

// Check if the email matches a record in the database
$sql = "SELECT email FROM user WHERE email = '$email'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Email matches a record in the database
    $_SESSION['emaili'] = $email ;
    
    $token = "";
    for ($i = 0; $i < 6; $i++) {
        $token .= mt_rand(0, 9); // Append a random digit (0-9)
    }
    $_SESSION["reset_token"] = $token;
    $expiry = date("Y-m-d H:i:s", time() + 60 * 3);

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
    mysqli_query($mysqli, $sql);

    // Send the email
    

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
        $mail->Body = "This is your verification email code: $token ";

        // Send the email
        if ($mail->send()) {
            header("location: http://localhost:3000/backend/verifycode.php");
        }

        echo "Password reset email sent. Please check your inbox.";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }

    // Close the database connection within the if block
    mysqli_close($mysqli);
} else {
    // Email does not match; display an error message
    echo "Email does not match our records. Please try again.";
}
?>
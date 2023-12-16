<?php
session_start();
include "dbconnect.php"; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id_Inv"])) {
        $rowId = $_GET["id_Inv"];

        $sql = "DELETE FROM invoices WHERE id_Inv = ?";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $rowId);

            if ($stmt->execute()) {
                
                echo json_encode(["success" => true, "message" => "Row deleted successfully"]);
                
                       } else {
                echo json_encode(["success" => false, "error" => "Error deleting row: " . $stmt->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(["success" => false, "error" => "Error preparing query"]);
        }

        $con->close();
    }
}

?>

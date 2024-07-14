<?php
// accept.php

// Database connection credentials
$server = "localhost";
$username = "root";
$password = "";
$db = "login";

// Establishing connection
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $card_id = $_POST['card_id'];

    if ($action === 'accept') {
        // Perform accept action if needed
        // For example, update status in database
        $sql = "UPDATE reqstory SET status = 'Accepted' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $card_id);

        if ($stmt->execute()) {
            echo "Card accepted successfully.";
        } else {
            echo "Error accepting card: " . $conn->error;
        }

        $stmt->close();
    } elseif ($action === 'reject') {
        // Perform reject action if needed
        // Update status and reason in database
        $reason = $_POST['reason'];

        $sql = "UPDATE reqstory SET status = 'Rejected', reason = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $reason, $card_id);

        if ($stmt->execute()) {
            echo "Card rejected successfully.";
        } else {
            echo "Error rejecting card: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Method not allowed.";
}

$conn->close();
?>

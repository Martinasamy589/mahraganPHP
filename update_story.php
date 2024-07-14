<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST request
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mo3gzat = $_POST['mo3gzat'];
    $tamged = $_POST['tamged'];
    $img = $_POST['img'];
    $story = $_POST['story'];

    // Prepare SQL statement with placeholders
    $sql = "UPDATE shohdaa SET 
            name = ?,
            fname = ?,
            mo3gzat = ?,
            tamged = ?,
            img = ?,
            story = ?
            WHERE id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssi", $name, $fname, $mo3gzat, $tamged, $img, $story, $id);

    // Execute SQL statement
    if (mysqli_stmt_execute($stmt)) {
        echo "تم تحديث البيانات بنجاح.";
    } else {
        echo "خطأ في تحديث البيانات: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt); // Close prepared statement
    mysqli_close($conn); // Close database connection
} else {
    // Redirect to homepage or handle invalid requests
    header("Location: index.php");
    exit();
}
?>

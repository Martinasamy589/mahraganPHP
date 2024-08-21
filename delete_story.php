<?php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM shohdaa WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo "خطأ في تحضير الاستعلام: " . mysqli_error($conn);
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    
    if (mysqli_stmt_execute($stmt)) {
        echo "تم حذف القصة بنجاح.";
    } else {
        echo "خطأ في عملية الحذف: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt); 
    mysqli_close($conn); 
    header("Location: indexAdmin.php");
    exit();
} else {
    header("Location: indexAdmin.php");
    exit();
}
?>

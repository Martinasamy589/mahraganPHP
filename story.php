<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Data from Database</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "login";

$conn = new mysqli($server, $username, $password, $db);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $card_id = intval($_GET['id']);
    $sql = "SELECT * FROM shohdaa WHERE id = $card_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
       echo "<tr><th>ID</th><th>Name</th><th>Image</th><th>FName</th><th>Tamged</th><th>Mo3gzat</th></tr>";
        echo "<tr>";
        $card_data = mysqli_fetch_assoc($result);
        echo "<td>" . htmlspecialchars($card_data['id']) . "</td>";
        echo "<td>" . htmlspecialchars($card_data['name']) . "</td>";
        echo "<td>" . htmlspecialchars($card_data['tamged']) . "</td>";
        echo "<td>" . htmlspecialchars($card_data['mo3gzat']) . "</td>";
        echo "<td>" . htmlspecialchars($card_data['fname']) . "<td>" ;
        echo  "<td>" ."<img src='data:image/jpeg;base64," . base64_encode($card_data['img']) . "' alt='Card Image'>" ."<td>" ;
        echo "</tr>";
    } else {
        echo "No data found for this ID.";
    }
} else {
    echo "Invalid ID parameter.";
}


 ?>

 </body>
</html>
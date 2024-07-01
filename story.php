<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Data from Database</title>
    <style>
  table.paleBlueRows {
  font-family: Arial, Helvetica, sans-serif;
  border: 1px solid #1C6EA4;
  background-color: #FFFFFF;
  width: 100%;
  height: 100%;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 10px solid #FFFFFF;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
  color: #333333;
}
table.paleBlueRows tr:nth-child(even) {
  background: #E9E9E9;
}
table.paleBlueRows thead {
  background: #1702A4;
  border-bottom: 2px solid #444444;
}
table.paleBlueRows thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #D0E4F5;
}
table.paleBlueRows thead th:first-child {
  border-left: none;
}

table.paleBlueRows tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  border-top: 2px solid #444444;
}
table.paleBlueRows tfoot td {
  font-size: 14px;
}
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
       
        $first_row = mysqli_fetch_assoc($result);
        
       
        echo "<table border='1' class='paleBlueRows'>";
        
        foreach ($first_row as $column_name => $value) {
           
            if ($column_name === 'id') {
                continue;
            }
            
            echo "<tr>";
            echo "<th>" . htmlspecialchars($column_name) . "</th>";
            
            
            mysqli_data_seek($result, 0); 
            while ($row = mysqli_fetch_assoc($result)) {
               
                echo "<td>";
                if ($column_name === 'img') {
                    echo "<img src='data:image/jpeg;base64," . base64_encode($row[$column_name]) . "' alt='Card Image'>";
                } else {
                    echo htmlspecialchars($row[$column_name]);
                }
                echo "</td>";
            }
            
            echo "</tr>";
        }
        
        
        echo "</table>";
        
    } else {
        echo "No data found for this ID.";
    }
}



 ?>

 </body>
</html>

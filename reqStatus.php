<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit();
}

$email = $_SESSION['email'];

include "connection.php";
$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

$sql = "SELECT * FROM reqstory WHERE email = '$email'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض بيانات جدول reqstory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        
    /* الأسلوب الحالي للـ footer */
    footer {
        background-color: #204060;
        color: #FFFFFF;
        text-align: center;
        padding: 20px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    /* أسلوب إضافي لتحسين التباعد بين العناصر داخل الـ footer */
    footer .container {
        padding-top: 10px; /* تباعد أعلى داخل الـ container */
        padding-bottom: 10px; /* تباعد أسفل داخل الـ container */
    }


        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            margin: 0;
            background-color: #2B547E; 
        }

        table.paleBlueRows {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #1C6EA4;
            background-color: #2B547E; 
            width: 100%;
            height: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        table.paleBlueRows td,
        table.paleBlueRows th {
            border: 1px solid #FFFFFF; 
            padding: 8px;
            color: #FFFFFF; 
        }

        table.paleBlueRows tbody td {
            font-size: 13px;
            color: #FFFFFF; 
            padding: 10px; 
        }

        table.paleBlueRows tr:nth-child(even) {
            background: #5080A6; 
        }

        table.paleBlueRows thead {
            background: #204060; 
            border-bottom: 2px solid #1C6EA4; 
        }

        table.paleBlueRows thead th {
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF; 
            text-align: center;
            border-left: 2px solid #1C6EA4; 
            padding: 10px; 
        }

        table.paleBlueRows thead th:first-child {
            border-left: none;
        }

        table.paleBlueRows tfoot {
            font-size: 14px;
            font-weight: bold;
            color: #FFFFFF; 
            background: #204060; 
            border-top: 3px solid #1C6EA4; 
        }

        table.paleBlueRows tfoot td {
            font-size: 14px;
            padding: 20px; 
        }

        /* لون خلفية الحالة "accepted" */
        table.paleBlueRows td.accepted {
           background-color: #4CAF50; /* لون أخضر */
         }

/* لون خلفية الحالة "rejected" */
        table.paleBlueRows td.rejected {
          background-color: #FF5733; /* لون أحمر */
        }

/* لون خلفية الحالة "bending" */
        table.paleBlueRows td.pending {
          background-color: #F9C74F; /* لون أصفر */
            }

    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<table  class='paleBlueRows'>";
    echo "<tr><th>الحاله</th><th>السبب </th><th>اسم الشهيد </th></tr>";
    
    while($row = $result->fetch_assoc()) {
        // تحديد الفئة CSS بناءً على قيمة الحالة
        $statusClass = '';
        switch ($row['status']) {
            case 'accepted':
                $statusClass = 'accepted';
                break;
            case 'rejected':
                $statusClass = 'rejected';
                break;
            case 'pending':
                $statusClass = 'pending';
                break;
            default:
                $statusClass = ''; // لا شيء إذا لم تتطابق القيمة مع أي من الحالات السابقة
                break;
        }

        echo "<tr>";
        echo "<td class='" . $statusClass . "'>" . htmlspecialchars($row['status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['reason']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "لا توجد بيانات لعرضها.";
}

$conn->close();
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <p class="logo"><i class="bi bi-chat"></i> Brag Spot</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <ul class="d-flex">
                    <li><a href="index.php">الرئيسيه</a></li>
                    <li><a href="totalCards.php">القصص</a></li>
                    <li><a href="index.php#contact">تواصل معنا</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12">
                <p>&copy;2023_BragSpot</p>
            </div>
            <div class="col-lg-1 col-md-12 col-sm-12">
                <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                        class="bi bi-arrow-up-short"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>

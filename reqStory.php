<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <div class="container">
        <div class="form-box box">

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
            

            include "connection.php";

            if (isset($_POST['reqStory'])) {
                $name = $_POST['name'];
                $fname = $_POST['fname'];
                $img = $_POST['img'];
                $mo3gzat = $_POST['mo3gzat'];
                $tamged = $_POST['tamged'];
                $story = $_POST['story'];
                $email = $_SESSION['email'];
            
                $query = "INSERT INTO reqstory (name, fname, img, mo3gzat, tamged, story, email) VALUES (?, ?, ?, ?, ?, ?,?)";
                $stmt = mysqli_prepare($conn, $query);
            
                mysqli_stmt_bind_param($stmt, "sssssss", $name, $fname, $img, $mo3gzat, $tamged, $story,$email);
                $success = mysqli_stmt_execute($stmt);
            
                if ($success) {
                    echo "<div class='message'>
                    <p>✨ تم ارسال طلبك ✨ </p>
                    </div><br>";
            
                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                } else {
                    echo "<div class='message'>
                    <p>حدث خطأ اثناء الارسال 😔</p>
                    </div><br>";
            
                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                }
            
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
            
            ?>

        </div>
    </div>
</body>

</html>
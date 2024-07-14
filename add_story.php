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

            include "connection.php";

            if (isset($_POST['reqStory'])) {
                $name = $_POST['name'];
                $fname = $_POST['fname'];
                $img = $_POST['img'];
                $mo3gzat = $_POST['mo3gzat'];
                $tamged = $_POST['tamged'];
                $story = $_POST['story'];
                
            
                $query = "INSERT INTO shohdaa (name, fname, img, mo3gzat, tamged, story) VALUES ( ?, ?, ?, ?, ?,?)";
                $stmt = mysqli_prepare($conn, $query);
            
                mysqli_stmt_bind_param($stmt, "ssssss", $name, $fname, $img, $mo3gzat, $tamged, $story);
                $success = mysqli_stmt_execute($stmt);
            
                if ($success) {
                    echo "<div class='message'>
                    <p> Message sent successfully ✨ </p>
                    </div><br>";
            
                    echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                } else {
                    echo "<div class='message'>
                    <p>Message sending fail 😔</p>
                    </div><br>";
            
                    echo "<a href='indexAdmin.php'><button class='btn'>Go Back</button></a>";
                }
            
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
            
            ?>

        </div>
    </div>
</body>

</html>
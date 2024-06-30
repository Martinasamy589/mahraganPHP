<?php
 
 $server = "localhost";
 $username = "root";
 $password = "";
 $db = "login";
 
 $conn = new mysqli($server, $username, $password, $db);
 $sql = "SELECT * FROM shohdaa ";
   $firstR=$sql[0];
   


$sql = "SELECT * FROM shohdaa "; 
$result = mysqli_query($conn, $sql);
$projects = array();
if ($result && mysqli_num_rows($result) > 0) {
 while ($row = mysqli_fetch_assoc($result)) {
     $projects[] = $row;
 }
} else {

 $projects = array(); 
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>


<section class="project-section" id="projects">
    <div class="container">
        <div class="row text">
            <div class="col-lg-6 col-md-12">
                <h1>شهداء الكنيسه المعاصره</h1>
                <hr>
            </div>
        </div>
        <div class="row project">
            
            <?php foreach ($projects as $project) : ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($project['img']); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="text">
                            <h4 class="card-title"><?php echo htmlspecialchars($project['name']); ?></h4>
                            <p class="card-text"><?php echo htmlspecialchars($project['fname']); ?></p>
                            <a  href="story.php?id=<?php echo $project['id']; ?>"style="display: inline-block ; width: 100%; height: auto;"> 
                            <button name="read_story">اقرأ القصه</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</section>

</body>

</html>
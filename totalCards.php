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
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#home">الرئيسية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#projects">القصص</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contact">تواصل معنا</a>
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <?php
                // التحقق من وجود الجلسة واسترجاع المعلومات
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
                    if ($result = mysqli_fetch_assoc($query)) {
                        $res_username = htmlspecialchars($result['username']);
                        $res_id = $result['id'];
                ?>
                <a class='nav-link dropdown-toggle' href='#' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                    <i class='bi bi-person'></i> <?php echo $res_username; ?>
                </a>
                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class='dropdown-item' href='edit.php?id=<?php echo $res_id; ?>'>تعديل الملف الشخصي</a>
                    </li>
                    <li><a class="dropdown-item" href="logout.php">تسجيل الخروج</a></li>
                </ul>
                <?php
                    }
                }
                ?>
            </div>
        </li>
    </ul>
</div>



<section class="project-section" id="projects">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <form method="GET" action="" style="display: flex; align-items: center;">
            <button type="submit" style="height: 35px; width: 60px; border-radius: 50%; background-color: #fff; border: 0; margin-right: 20px;">ابحث</button>
               
                <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"style="border-radius: 20px;">
                <label for="search" style="margin-left: 10px;">البحث</label>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center;">
            <h1>شهداء الكنيسه المعاصره</h1>
            <hr>
        </div>
    </div>
        <div class="row project">
            
                
        <?php foreach ($projects as $project) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($project['img']); ?>" class="card-img-top,imgCard" alt="..." style="display: inline-block; width: 260px; height: 200px ;border-radius: 20px; box-shadow: 25px 15px 25px rgba(1, 0, 0, 0.3); transition: transform 0.3s ease-in-out;">
                <div class="card-body">
                    <div class="text">
                        <h4 class="card-title"><?php echo htmlspecialchars($project['name']); ?></h4>
                        <p class="card-text"><?php echo htmlspecialchars($project['fname']); ?></p>
                        <a href="story.php?id=<?php echo $project['id']; ?>">
                            <button name="read_story" >اقرأ القصه</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        </div>
    </div>
</section>
 <!-- footer section  -->

 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> Brag Spot</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="index.php">الرئيسيه</a></li>
                        <li><a href="index.php#projects">القصص</a></li>
                        <li><a href="index.php#contact">تواصل معنا</a></li>
                       
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2023_BragSpot</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
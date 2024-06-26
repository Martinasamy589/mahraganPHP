<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
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

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-chat"></i> Brag Spot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">الرئيسيه</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">القصص</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">تواصل معنا</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class='nav-link dropdown-toggle' href='edit.php?id=$res_id' id='dropdownMenuLink'
                                    data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='bi bi-person'></i>
                                </a>


                                <ul class="dropdown-menu mt-2 mr-0" aria-labelledby="dropdownMenuLink">

                                    <li>
                                        <?php

                                        $id = $_SESSION['id'];
                                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");

                                        while ($result = mysqli_fetch_assoc($query)) {
                                            $res_username = $result['username'];
                                            $res_email = $result['email'];
                                            $res_id = $result['id'];
                                        }


                                        echo "<a class='dropdown-item' href='edit.php?id=$res_id'>Change Profile</a>";


                                        ?>

                                    </li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="name">
        <center>مرحبا 
            <?php
            // echo $_SESSION['valid'];
            
            echo $_SESSION['username'];

            ?>
            
        </center>
    </div>

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content" >
                    <h2>شهداء الكنيسه الحديثه</h2>
                    <p style="color:black;">
                      الاستشهاد المسيحي بنتائجه هو برهان عملي على صحة قول السيد المسيح له المجد: "إن لم تقع حبة الحنطة في الأرض وتمت فهي تبقى وحدها. ولكن إن ماتت تأتى بثمر كثير. " (إنجيل يوحنا 12: 24)..
                     <span id="story"  style="display: none;">وويقول القديس يوستينوس الشهيد: [ها أنت تستطيع أن ترى بوضوح أنه حينما تقطع رؤوسنا ونُصلب، ونلقى للوحوش المفترسة، ونقيد بالسلاسل، ونلقى في النار، وكل أنواع التعذيب، أننا لا نترك إيماننا. بل بقدر ما نعاقب بهذه الضيقات، بقدر ما ينضم مسيحيون أكثر إلى الإيمان باسم يسوع المسيح.</span>
                    </p>
                    <button class="btn" id="showStoryButton"><a href="#">اضغط هنا </a></button>
                </div>
                <script>
        document.getElementById('showStoryButton').addEventListener('click', function() {
            var storyDiv = document.getElementById('story');
            if (storyDiv.style.display === 'none') {
                storyDiv.style.display = 'block'; // Show the story
                this.textContent = 'اخفاء '; // Change button text
            } else {
                storyDiv.style.display = 'none'; // Hide the story
                this.textContent = ' اضغط هنا'; // Change button text
            }
        });
    </script>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/shohdaa.jpg" alt="شهداء الكنيسه المعاصره" class="img-fluid">
                </div>

            </div>
        </div>
    </section>

    <!-- services section  -->


    <!-- about section  -->


    <!-- project section  -->
    <?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "login";
    
    $conn = new mysqli($server, $username, $password, $db);
    $sql = "SELECT * FROM shohdaa LIMIT 4";
      $firstR=$sql[0];
      
    ?>
    <?php
$sql = "SELECT * FROM shohdaa LIMIT 4"; 
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

<section class="project-section" id="projects">
    <div class="container">
        <div class="row text">
            <div class="col-lg-6 col-md-12">
                <h1>شهداء الكنيسه المعاصره</h1>
                <hr>
            </div>
            <div class="col-lg-6 col-md-12">
                <p>لمزيد من الشهداء عليك بالضغط هنا</p>
                <a href="totalCards.php">
                <button class="btn">اضغط هنا</button>
            </div>
        </div>
        <div class="row project">
            
        <?php foreach ($projects as $project) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($project['img']); ?>" class="card-img-top" alt="..." style="display: inline-block; width: 50%; height: auto;">
                <div class="card-body">
                    <div class="text">
                        <h4 class="card-title"><?php echo htmlspecialchars($project['الاسم']); ?></h4>
                        <p class="card-text"><?php echo htmlspecialchars($project['اسم اخر للشهيد']); ?></p>
                        <a href="story.php?id=<?php echo $project['id']; ?>">
                            <button name="read_story">اقرأ القصه</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    </div>
</section>





    <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1>contact us</h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>A108 Adam Street,<br>New Delhi, 535022</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+91 9876545672<br>+91 8763456243</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>bragspot@gmail.com<br>brag@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 form">
                    <form action="contact.php" method="post" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button name="submit" type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

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
                        <li><a href="#">Home</a></li>
                        <li><a href="#">services</a></li>
                        <li><a href="#">projects</a></li>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">contact</a></li>
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
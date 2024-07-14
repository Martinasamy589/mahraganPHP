<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "login";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM shohdaa";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql .= " WHERE name LIKE '%$search%' OR fname LIKE '%$search%'";
}

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
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                        style="display: flex; align-items: center;">
                        <button type="submit"
                            style="height: 35px; width: 60px; border-radius: 50%; background-color: #fff; border: 0; margin-right: 10px;">ابحث</button>
                        <button type="button" onclick="resetSearch()"
                            style="height: 35px; width: 70px; border-radius: 20px; background-color: #fff; border: 1px solid #ced4da;">رجوع</button>
                        <input type="text" id="search" name="search"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                            style="border-radius: 20px; margin-left: 10px;">
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
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($project['img']); ?>"
                            class="card-img-top,imgCard" alt="..."
                            style="display: inline-block; width: 260px; height: 200px ;border-radius: 20px; box-shadow: 25px 15px 25px rgba(1, 0, 0, 0.3); transition: transform 0.3s ease-in-out;">
                        <div class="card-body">
                            <div class="text"style="text-align:center;" >
                                <h4 class="card-title"><?php echo htmlspecialchars($project['name']); ?></h4>
                                <p class="card-text"><?php echo htmlspecialchars($project['fname']); ?></p>
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

    <script>
        function resetSearch() {
            // Clear the search input
            document.getElementById('search').value = '';

            // Submit the form to reset the search results
            document.querySelector('form').submit();
        }
    </script>
</body>

</html>

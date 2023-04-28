<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classimax</title>
    
    <!-- PLUGINS CSS STYLE -->
    <link href="../plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="../plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="../plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="../plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>-->
    

    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg  navigation">
                        <a class="navbar-brand" href="../php/index.php">
                            <img src="../images/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../php/index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/dashboard.php">Dashboard</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Category <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="../php/Category.php">All</a>
                                        <a class="dropdown-item" href="../php/Books.php">Books</a>
                                        <a class="dropdown-item" href="../php/Stationary.php">Stationery</a>
                                        <a class="dropdown-item" href="../php/Electronics.php">Electronics</a>
                                        <a class="dropdown-item" href="../php/Courses.php">Courses</a>
                                        <a class="dropdown-item" href="../php/Teachers.php">Teachers</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/contactus.php">Contact Us</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="../php/login.php">Logout</a>
                                </li>
                                <!--<li class="nav-item">
								<a class="nav-link add-button" href="../php/sell_login.php"><i class="fa fa-plus-circle"></i> Add Listing</a>
							</li>-->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--==================================
=            User Profile            =
===================================-->

    <section class="user-profile section">
        <div class="container">
            <div class="row">

                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Edit Personal Info -->
                    <div class="widget personal-info">
                        <h3 class="widget-header user">Details</h3>
                        <form action="../php/addItem.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Ad Title</label>
                                <input required type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input required type="text" class="form-control" id="brand" name="brand">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category-select" name="category" class="form-control" style="height: 50px;">
                                    <option value="books">Books</option>
                                    <option value="stationery">Stationery</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="courses">Courses</option>
                                    <option value="teachers">Teachers</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input required type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input required type="text" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input required type="text" class="form-control" id="location" name="location">
                            </div>
                            <div class="form-group">
                                <i class="fa fa-user text-center"></i>
                                <input required type="file" class="form-control-file d-inline" id="inputfile" name="inputfile">
                            </div>
                            <button class="btn btn-transparent">Submit Ad</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!--============================
=            Footer            =
=============================-->

    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
                    <!-- About -->
                    <div class="block about">
                        <!-- footer logo -->
                        <img src="../images/logo-footer.png" alt="">
                        <!-- description -->
                        <p class="alt-color">ClassiMax is an advertisement site for books, stationery, courses, and teachers. Find what you’re searching for or make your very own advertisement for nothing!
                            Allowed to post an advertisement, allowed to peruse postings, allowed to contact dealers.
                        </p>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 offset-lg-1 col-md-3">
                    <div class="block">
                        <h4>Site Pages</h4>
                        <ul>
                            <li><a href="../php/blog.php">About Us</a></li>
                            <li>Lebanon</li>
                            <li><a href="../php/readMore.php">Read More</a></li>
                            <!--<li><a href="#">Listed Ads</a></li>
                            <li><a href="../php/Category.php">Categories</a></li>-->
                        </ul>
                    </div>
                </div>
                <!-- Link list -->

                <div class="block">
                    <h4>Social Media</h4>
                    <!-- Social Icons -->
                    <ul class="social-media-icons text-right">
                        <li><a class="fa fa-facebook" href="http://www.facebook.com"></a></li>
                        <li><a class="fa fa-twitter" href="https://www.twitter.com"></a></li>
                        <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com"></a></li>
                        <li><a class="fa fa-vimeo" href="https://www.vimeo.com"></a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
    </footer>


    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p>Copyright © 2023. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->

        <!-- To Top -->
        <div class="top-to">
            <a id="top" class="" href=""><i class="fa fa-angle-up"></i></a>
        </div>
    </footer>

    <!-- JAVASCRIPTS -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../plugins/tether/js/tether.min.js"></script>
    <script src="../plugins/raty/jquery.raty-fa.js"></script>
    <script src="../plugins/bootstrap/dist/js/popper.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
    <script src="../plugins/slick-carousel/slick/slick.min.js"></script>
    <script src="../plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="../plugins/smoothscroll/SmoothScroll.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="../js/scripts.js"></script>
    
</body>

</html>
<?php
/*require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$today = date("F j, Y");
if ($_POST) {
    $data = file_get_contents($_POST['inputfile']);
    // create a binary object for the image data
    $binary = new MongoDB\BSON\Binary($data, MongoDB\BSON\Binary::TYPE_GENERIC);
    $insert = array(
        'title' => $_POST['title'],
        'brand' => $_POST['brand'],
        'category' => $_POST['category'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'location' => $_POST['location'],
        'date' => $today,
        "image" => $binary,
    );
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['brand'] = $_POST['brand'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['location'] = $_POST['location'];
    $_SESSION['date'] = $today;
    if ($collection->insertOne($insert)) {
        //foreach ($result as $searchfor) {
        //}
        echo "<script>alert('Saved!')</script>";
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }
}*/
/*require_once '../vendor/autoload.php';

try {
    $mongo = new MongoDB\Client;
    $db = $mongo->Classimax;
    $collection = $db->itemsList;
    $today = date("F j, Y");

    if ($_POST) {
        // Check if the file was successfully uploaded
        if (isset($_FILES['inputfile']) && is_uploaded_file($_FILES['inputfile']['tmp_name'])) {
            $data = file_get_contents($_FILES['inputfile']['tmp_name']);

            // Base64 encode the image data
            $encodedData = base64_encode($data);

            $insert = array(
                'title' => $_POST['title'],
                'brand' => $_POST['brand'],
                'category' => $_POST['category'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'location' => $_POST['location'],
                'date' => $today,
                'image'=> $encodedData,
            );

            $_SESSION['title'] = $_POST['title'];
            $_SESSION['brand'] = $_POST['brand'];
            $_SESSION['category'] = $_POST['category'];
            $_SESSION['description'] = $_POST['description'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['location'] = $_POST['location'];
            $_SESSION['date'] = $today;

            if ($collection->insertOne($insert)) {
                //foreach ($result as $searchfor) {
                //}
                echo "<script>alert('Saved!')</script>";
            } else {
                echo "<script>alert('Some Issues!')</script>";
            }
        }
    }
} catch (Exception $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
}*/
/*
require_once '../vendor/autoload.php';

try {
    $mongo = new MongoDB\Client;
    $db = $mongo->Classimax;
    $collection = $db->itemsList;
    $today = date("F j, Y");

    if ($_POST) {
        // Check if the file was successfully uploaded
        if (isset($_FILES['inputfile']) && is_uploaded_file($_FILES['inputfile']['tmp_name'])) {
            $data = file_get_contents($_FILES['inputfile']['tmp_name']);

            // Base64 encode the image data
            $encodedData = base64_encode($data);

            $insert = array(
                'title' => $_POST['title'],
                'brand' => $_POST['brand'],
                'category' => $_POST['category'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'location' => $_POST['location'],
                'date' => $today,
                "image" => $encodedData,
            );

            $_SESSION['title'] = $_POST['title'];
            $_SESSION['brand'] = $_POST['brand'];
            $_SESSION['category'] = $_POST['category'];
            $_SESSION['description'] = $_POST['description'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['location'] = $_POST['location'];
            $_SESSION['date'] = $today;

            if ($collection->insertOne($insert)) {
                //foreach ($result as $searchfor) {
                //}
                echo "<script>alert('Saved!')</script>";
            } else {
                echo "<script>alert('Some Issues!')</script>";
            }
        }
    }
} catch (Exception $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
}
*/

/* Correct!!!
use MongoDB\BSON\Binary;

require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$today = date("F j, Y");
if ($_POST) {
    $data = file_get_contents($_FILES['inputfile']['tmp_name']);
    $encodedData = base64_encode($data);
    // Store the encoded image data in the session
    $_SESSION['image'] = $encodedData;
    // create a binary object for the image data
    //$binary = new Binary($data, Binary::TYPE_GENERIC);
    $insert = array(
        'title' => $_POST['title'],
        'brand' => $_POST['brand'],
        'category' => $_POST['category'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'location' => $_POST['location'],
        'date' => $today,
        'image' => $encodedData,
    );
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['brand'] = $_POST['brand'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['location'] = $_POST['location'];
    $_SESSION['date'] = $today;
    if ($collection->insertOne($insert)) {
        //foreach ($result as $searchfor) {
        //}
        echo "<script>alert('Saved!')</script>";
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }
}*/
?>
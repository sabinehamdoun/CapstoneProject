<?php
session_start();
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$id = new MongoDB\BSON\ObjectId($_POST['_id']);
$item = $collection->findOne(['_id' => $id]);
$_SESSION["_id"] = $id;
?>
<!DOCTYPE html>
<html>

<head>
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
</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg  navigation">
                        <a class="navbar-brand" href="../php/itemsList.php">
                            <img src="../images/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
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
                        <form action="../php/adminUpdateItem.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Ad Title</label>
                                <input required type="text" class="form-control" id="title" name="title" value="<?php echo $item->title ?>">
                            </div>
                            <!--<div class="form-group">
                                <label for="id">ID</label>
                                <input required type="text" class="form-control" id="id" name="id" value="<?php echo $item->price ?>">
                            </div>-->
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input required type="text" class="form-control" id="brand" name="brand" value="<?php echo $item->brand ?>">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category-select" name="category" class="form-control" style="height: 50px;">
                                    <option value="books" <?php if ($item->category == 'books') echo 'selected' ?>>Books</option>
                                    <option value="stationery" <?php if ($item->category == 'stationery') echo 'selected' ?>>Stationery</option>
                                    <option value="electronics" <?php if ($item->category == 'electronics') echo 'selected' ?>>Electronics</option>
                                    <option value="courses" <?php if ($item->category == 'courses') echo 'selected' ?>>Courses</option>
                                    <option value="teachers" <?php if ($item->category == 'teachers') echo 'selected' ?>>Teachers</option>
                                </select>
                                <!--<label for="category">Category</label>
                                <select id="category-select" name="category" class="form-control" style="height: 50px;" >
                                    <option value="books">Books</option>
                                    <option value="stationery">Stationery</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="courses">Courses</option>
                                    <option value="teachers">Teachers</option>
                                </select>-->
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input required type="text" class="form-control" id="description" name="description" value="<?php echo $item->description ?>">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input required type="text" class="form-control" id="price" name="price" value="<?php echo $item->price ?>">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input required type="text" class="form-control" id="location" name="location" value="<?php echo $item->location ?>">
                            </div>
                            <!--<div class="form-group">
                                <i class="fa fa-user text-center"></i>
                                <input required type="file" class="form-control-file d-inline" id="inputfile" name="inputfile">
                            </div>-->
                            <button class="btn btn-transparent">Update Ad</button>
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
                            <li>Lebanon</li>
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
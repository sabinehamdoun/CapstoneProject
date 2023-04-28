<?php session_start();

require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$countBooks = $collection->count(['category' => 'books']);
$countStationary = $collection->count(['category' => 'stationery']);
$countElectronics = $collection->count(['category' => 'electronics']);
$countCourses = $collection->count(['category' => 'courses']);
$countTeachers = $collection->count(['category' => 'teachers']);
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
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <form action="../php/searchforproduct.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="itemSearch3" name="itemSearch" placeholder="What are you looking for">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-primary">Search Now</button>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="search-criteria" name="search-criteria" onchange="location = this.value;" class="btn btn-primary">
                                        <option value="../php/Category.php">Sort By?</option>
                                        <option value="../php/orderbyprice.php">Sort By Price: high to low</option>
                                        <option value="../php/orderbyprice2.php">Sort By Price: low to high</option>
                                        <option value="../php/orderbyname.php">Sort By Name</option>
                                        <!--<option value="../php/orderbydate.php">Sort By Date: oldest to newest</option>-->
                                        <option value="../php/orderbydate2.php">Sort By Date: newest to oldest</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2>All Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">All Category</h4>
                            <ul class="category-list">
                                <li><a href="../php/Books.php">Books <span><?php echo $countBooks; ?></span></a></li>
                                <li><a href="../php/Stationary.php">Stationery <span><?php echo $countStationary; ?></span></a></li>
                                <li><a href="../php/Electronics.php">Electronics <span><?php echo $countElectronics; ?></span></a></li>
                                <li><a href="../php/Courses.php">Courses <span><?php echo $countCourses; ?></span></a></li>
                                <li><a href="../php/Teachers.php">Teachers <span><?php echo $countTeachers; ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-grid-list">
                        <div class="row mt-30">
                            <div class="col-sm-12 col-lg-4 col-md-6">
                                <!-- product card -->
                                <?php

                                require_once '../vendor/autoload.php';
                                $mongo = new MongoDB\Client;
                                $db = $mongo->Classimax;
                                $collection = $db->itemsList;
                                $result = $collection->find([], ['sort' => ['date' => 1]]);
                                foreach ($result as $searchfor) {
                                    echo '<div class="product-item">
                                            <div class="card">
                                                <div class="thumb-content">
                                                    <div class="price">' . $searchfor['price'] . '</div>
                                                    <img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $searchfor['image'] . '" alt="Card image cap">
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title">' . $searchfor['title'] . '</h4>
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href=""><i class="fa fa-folder-open-o"></i>' . $searchfor['category'] . '</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                        <a href=""><i class="fa fa-calendar"></i>' . $searchfor['date'] . '</a>
                                                        </li>
                                                        </ul>
                                                        <p class="card-text">' . $searchfor['description'] . '</p>
                                                        <form action="../php/single.php" method="post">
                                                            <input type="hidden" name="_id" value="' . $searchfor["_id"] . '">
                                                            <button name="update" type="submit" class="btn btn-secondary">View Details</button>
                                                        </form>
                                                        <form action="../php/addToFavorite.php" method="post">
                                                            <input type="hidden" name="_id" value="' . $searchfor["_id"] . '">
                                                            <button name="favorite" type="submit" class="btn btn-primary">Add to Favorite</button>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        
                                                        </div>';
                                } ?>
                            </div>



                        </div>
                    </div>
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
    <script src="../plugins/jquery/jquery.min.js"></script>
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
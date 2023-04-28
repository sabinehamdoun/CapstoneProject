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

    <!-- ../plugins CSS STYLE -->
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
                                <!--<li class="nav-item active">
                                    <a class="nav-link" href="../php/index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/Category.php">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/admin-profile.php">Admin Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/itemsList.php">Items List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../php/customersList.php">Customers List</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="../php/Category.php">Category</a>
									<a class="dropdown-item" href="../php/single.php">Single Page</a>
									<a class="dropdown-item" href="../php/dashboard.php">Dashboard</a>
									<a class="dropdown-item" href="../html/user-profile.html">User Profile</a>
								</div>
							</li>-->
                                <!--<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>-->
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="../php/login.php">Logout</a>
                                </li>
                                <!--<li class="nav-item">
								<a class="nav-link add-button" href="#"><i class="fa fa-plus-circle"></i> Add Listing</a>
							</li>-->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
=            Single Blog            =
==================================-->


    <section class="blog single-blog section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                    <article class="single-post">
                        <h3>Classified Marketplace.</h3>
                        <ul class="list-inline">
                            <li class="list-inline-item">by <a href="">Wissam & Sabine</a></li>
                            <li class="list-inline-item">Jan 01, 2023</li>
                        </ul>
                        <img src="../images/blog/post-4.jpg" alt="article-01">
                        <p>Classimax is an e-commerce website designed for college and high school students to connect with teachers for academic help, as well as buy, sell, and trade books, courses, electronics, and stationary. The website is user-friendly and easy to navigate, making it simple for students to find the resources they need to succeed in their studies.</p>

                        <p>One of the unique features of Classimax is the ability to search for and connect with teachers who specialize in specific subjects. Whether a student needs help with math, science, history, or any other subject, they can easily find a qualified teacher to provide one-on-one tutoring or group study sessions. This helps students to get the personalized attention they need to understand difficult concepts and improve their grades.</p>

                        <p>In addition to connecting with teachers, Classimax also allows students to buy, sell, and trade textbooks, courses, electronics, and stationary. This helps to save money on expensive textbooks and materials, and also allows students to recoup some of their expenses by selling items they no longer need. The website also has a wide range of products from different brands, providing the students with the choices they need to get the best products for their needs.</p>

                        <p>Another great feature of Classimax is its safe and secure platform for transactions. The website uses advanced encryption and security measures to protect personal and financial information, ensuring that all transactions are safe and secure. This gives students peace of mind when buying, selling, or trading items on the website.</p>

                        <p>Furthermore, Classimax offers a community platform for students to connect and network with other students from different schools and major. This allows students to share resources, form study groups, and help each other succeed. This community aspect of the website helps to create a sense of camaraderie and support among students, which can be invaluable during the challenging college and high school years.</p>

                        <p>In conclusion, Classimax is an innovative e-commerce website that offers a wide range of resources for college and high school students. The ability to connect with teachers, buy, sell, and trade books, courses, electronics, and stationary, and the community platform, all make it an invaluable tool for students looking to succeed in their studies. The safe and secure platform also provides peace of mind for transactions. The website is the perfect solution for students who want to get the help and resources they need to succeed in their studies, and to make their college and high school experience easier and more enjoyable.</p>

                        <ul class="social-circle-icons list-inline">
                            <li class="list-inline-item text-center"><a class="fa fa-facebook" href="http://www.facebook.com"></a></li>
                            <li class="list-inline-item text-center"><a class="fa fa-twitter" href="http://www.twitter.com"></a></li>
                            <!--<li class="list-inline-item text-center"><a class="fa fa-google-plus" href="http://www."></a></li>-->
                            <li class="list-inline-item text-center"><a class="fa fa-pinterest-p" href="http://www.pinterest.com"></a></li>
                            <li class="list-inline-item text-center"><a class="fa fa-linkedin" href="http://www.linkedin.com"></a></li>
                        </ul>
                    </article>
                    
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
                        <p class="alt-color">ClassiMax is an advertisement site for books, stationery, courses, and teachers. Find what you're searching for or make your very own advertisement for nothing!
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
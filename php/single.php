<?php
session_start();
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$collection2 = $db->users;
$id = new MongoDB\BSON\ObjectId($_POST['_id']);
$item = $collection->findOne(['_id' => $id]);
$user = $collection2->findOne(['email' => $item->email]);
$_SESSION["_id"] = $id;
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
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="page-search">
		<div class="container">
		</div>
	</section>
	<!--===================================
=            Store Section            =
====================================-->
	<section class="section bg-gray">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<!-- Left sidebar -->
				<div class="col-md-8">
					<div class="product-details">
						<h1 class="product-title"><?php echo $item->title ?></h1>
						<div class="product-meta">
							<ul class="list-inline">
								<li class="list-inline-item"><i class="fa fa-user-o"></i> <b>By </b><a href=""><?php echo $user->firstname ?></a></li>
								<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> <b>Category </b><a href=""><?php echo $item->category ?></a></li>
								<li class="list-inline-item"><i class="fa fa-location-arrow"></i> <b>Location </b><a href=""><?php echo $item->location ?></a></li>
							</ul>
						</div>
						<div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img  class="d-block w-100" src="data:image/jpeg;base64,<?php echo $item->image ?>"/>
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="../images/products/products-2.jpg" alt="Second slide">
								</div>
								<div class="carousel-item">
									<img class="d-block w-100" src="../images/products/products-3.jpg" alt="Third slide">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						<div class="content">
							<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Product Details</a>
								</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<h3 class="tab-title">Product Details</h3>
									<h6> Title </h6>
									<p> <?php echo $item->title ?> </p>
									<h6> Price </h6>
									<p> <?php echo $item->price ?> </p>
									<h6> Brand </h6>
									<p> <?php echo $item->brand ?> </p>
									<h6> Description </h6>
									<p><?php echo $item->description ?> </p>

								</div>
								
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="widget price text-center">
							<h4>Price</h4>
							<p><?php echo $item->price ?></p>
						</div>
						<!-- User Profile widget -->
						<div class="widget user">
							<img width="200px" height="auto" src="data:image/jpeg;base64,<?php echo $user->myimage ?>"/>
							<h4><a href=""><?php echo $user->firstname ?> <?php echo $user->lastname ?></a></h4>
							<p class="seller_email">Email: <?php echo $item->email ?></p>
							<p class="seller_pn">Phone: <?php echo $user->phonenumber ?></p>
							<a href="mailto:<?php echo $user->email; ?>" class="btn btn-contact">Contact</a>
						</div>
						<!-- Safety tips widget -->
						<div class="widget disclaimer">
							<h5 class="widget-header" style="color:red; font-weight: bolder;">Safety Tips</h5>
							<ul>
								<li>Meet seller at a public place</li>
								<li>Check the item before you buy</li>
								<li>Pay only after collecting the item</li>
							</ul>
						</div>
						<!-- Coupon Widget -->
					</div>
				</div>

			</div>
		</div>
		<!-- Container End -->
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
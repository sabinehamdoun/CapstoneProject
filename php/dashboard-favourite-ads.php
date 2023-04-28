<?php session_start(); 

require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
$collection = $db->selectCollection($tableName);
$countFavorites = $collection->count();

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
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav ">
								<li class="nav-item">
									<a class="nav-link" href="../php/index.php">Home</a>
								</li>
								<li class="nav-item active">
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
								<li class="nav-item ">
									<a class="nav-link" href="../php/contactus.php">Contact Us</a>
								</li>
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a class="nav-link login-button" href="../php/login.php">Logout</a>
								</li>
								<li class="nav-item">
									<a class="nav-link add-button" href="../php/listing_form.php"><i class="fa fa-plus-circle"></i> Add Listing</a>
								</li>
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
	<section class="dashboard section">
		<!-- Container Start -->
		<div class="container">
			<!-- Row Start -->
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
					<div class="sidebar">
						<!-- User Widget -->
						<div class="widget user-dashboard-profile">
							<!-- User Image -->
							<div class="profile-thumb">
								<?php echo '<img class="rounded-circle" src="data:image/jpeg;base64,' . $_SESSION['myimage'] . '"/>'; ?>
								<!--<img src="../images/user/user-thumb.jpg" alt="" class="rounded-circle">-->
							</div>
							<!-- User Name -->
							<h5 class="text-center"><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']  ?></h5>
							<a href="../php/user-profile.php" class="btn btn-main-sm">Edit Profile</a>
						</div>
						<!-- Dashboard Links -->
						<div class="widget user-dashboard-menu">
							<ul>
								<li>
									<a href="../php/dashboard.php"><i class="fa fa-user"></i> My Ads</a>
								</li>
								<li class="active">
									<a href="../php/dashboard-favourite-ads.php"><i class="fa fa-bookmark-o"></i> Favourite Ads <span><?php echo $countFavorites; ?></span></a>
								</li>
								<!--<li>
								<a href="../php/login.php"><i class="fa fa-cog"></i> Logout</a>
							</li>-->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
					<!-- Recently Favorited -->
					<div class="widget dashboard-container my-adslist">
						<h3 class="widget-header">Favourite Ads</h3>
						<table class="table table-responsive product-dashboard-table">
							<thead>
								<tr>
									<th>Image</th>
									<th>Product Title</th>
									<th class="text-center">Category</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr></tr>
								<?php

								require_once '../vendor/autoload.php';
								$mongo = new MongoDB\Client;
								$db = $mongo->Classimax;
								//$myemail = $_POST['email'];
								//$mypassword = $_POST['password'];
								$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
								$collection = $db->selectCollection($tableName);
								//$qry = array("email" => $myemail);
								//$result = $collection->find(['email' => $_POST['email']]);
								$result = $collection->find();
								$flag = 0;
								foreach ($result as $searchfor) {

									echo '<tr>
									<td class="product-thumb">
										<img width="80px" height="auto" src="data:image/jpeg;base64,' . $searchfor['image'] . '"/>
									</td>
									<td class="product-details">
										<h3 class="title">' . $searchfor['title'] . "<br>" . $searchfor['description'] . '</h3>
										<span><strong>Posted on: </strong><time>' . $searchfor['date'] . '</time> </span>
										<span class="status active"><strong>Status</strong>Active</span>
										<span class="location"><strong>Location</strong>' . $searchfor['location'] . '</span>
										<span class="price"><strong>Price</strong>' . $searchfor['price'] . '</span>
									</td>
									<td class="product-category"><span class="categories">' . $searchfor['category'] . '</span></td>
									<td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												
											<li class="list-inline-item">
												<form action="../php/removeFromFavorite.php" method="post">
													<input type="hidden" name="_id" value="' . $searchfor["_id"] . '">
													<button name="favorite" type="submit">
													<i class="fa fa-heart"></i>
													</button>
												</form>
												</li>
											</ul>
										</div>
									</td>
								</tr>';
								}

								?>

							</tbody>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<!-- Row End -->
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
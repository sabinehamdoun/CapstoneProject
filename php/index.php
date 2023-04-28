<?php session_start();?>
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
								<li class="nav-item active">
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

								<li class="nav-item">
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

	<!--===============================
=            Hero Area            =
================================-->

	<section class="hero-area bg-1 text-center overly">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header Contetnt -->
					<div class="content-block">
						<h1>Buy & Sell Near You </h1>
						<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
						<div class="short-popular-category-list text-center">
							<h2>Categories</h2>
							<ul class="list-inline">
								<li class="list-inline-item">
									<a href="../php/Books.php"> Books </a>
								</li>
								<li class="list-inline-item">
									<a href="../php/Stationary.php"> Stationery </a>
								</li>
								<li class="list-inline-item">
									<a href="../php/Electronics.php"> Electronics </a>
								</li>
								<li class="list-inline-item">
									<a href="../php/Courses.php"> Courses </a>
								</li>
								<li class="list-inline-item">
									<a href="../php/Teachers.php"> Teachers </a>
								</li>
							</ul>
						</div>

					</div>
					<!-- Advance Search -->
					<div class="advance-search">
						<form action="../php/searchforproduct.php" method="post">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<div class="block d-flex">
										<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="itemSearch" placeholder="Search for product" name="itemSearch">
										<!-- Search Button -->
										<button class="btn btn-main">SEARCH</button>
									</div>
								</div>
							</div>
						</form>

					</div>

				</div>
			</div>
		</div>
		<!-- Container End -->
	</section>


	<!--===========================================
=            Popular deals section            =
============================================-->

	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Trending Ads</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-sm-12 col-lg-4">
					<!-- product card -->
					<?php
					require_once '../vendor/autoload.php';
					$mongo = new MongoDB\Client;
					$db = $mongo->Classimax;
					$collection = $db->itemsList;
					$result = $collection->find(['category' => 'books']);
					
					$c1 = 0; 
					foreach ($result as $searchfor) {
						if($c1 < 1){
							echo '<form action="../php/single.php" method="post"><input type="hidden" name="_id" value="' . $searchfor["_id"] . '"><div class="product-item bg-light"><button name="update" type="submit"><div class="card"><div class="card"><div class="thumb-content"><div class="price">' . $searchfor['price'] . '</div>
							<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $searchfor['image'] . '" alt="Card image cap"></a>
							</div><div class="card-body"><h4 class="card-title"><a href="">' . $searchfor['title'] . '</a></h4>
							<ul class="list-inline product-meta"><li class="list-inline-item">
							<a href=""><i class="fa fa-folder-open-o"></i>' . $searchfor['category'] . '</a></li>
							<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $searchfor['date'] . '</a></li>
							</ul><p class="card-text">' . $searchfor['description'] . '</p>
							</div></div></button></div></form>';
						}
						$c1++;
					} ?>
					<!--<div class="product-item bg-light">
						<div class="card">
							<div class="thumb-content">
								 <div class="price">$200</div>
								<a href="">
									<img class="card-img-top img-fluid" src="../images/products/products-1.jpg" alt="Card image cap">
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
								<ul class="list-inline product-meta">
									<li class="list-inline-item">
										<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									</li>
									<li class="list-inline-item">
										<a href=""><i class="fa fa-calendar"></i>26th December</a>
									</li>
								</ul>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
							</div>
						</div>
					</div>-->



				</div>
				<div class="col-sm-12 col-lg-4">
					<!-- product card -->
					<?php
					require_once '../vendor/autoload.php';
					$mongo = new MongoDB\Client;
					$db = $mongo->Classimax;
					$collection = $db->itemsList;
					$result = $collection->find(['category' => 'electronics']);
					
					$c1 = 0; 
					foreach ($result as $searchfor) {
						if($c1 < 1){
							echo '<form action="../php/single.php" method="post"><input type="hidden" name="_id" value="' . $searchfor["_id"] . '"><div class="product-item bg-light"><button name="update" type="submit"><div class="card"><div class="thumb-content"><div class="price">' . $searchfor['price'] . '</div>
							<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $searchfor['image'] . '" alt="Card image cap"></a>
							</div><div class="card-body"><h4 class="card-title"><a href="">' . $searchfor['title'] . '</a></h4>
							<ul class="list-inline product-meta"><li class="list-inline-item">
							<a href=""><i class="fa fa-folder-open-o"></i>' . $searchfor['category'] . '</a></li>
							<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $searchfor['date'] . '</a></li>
							</ul><p class="card-text">' . $searchfor['description'] . '</p>
							</div></div></button></div></form>';
						}
						$c1++;
					} ?>



				</div>
				<div class="col-sm-12 col-lg-4">
					<!-- product card -->
					<?php
					require_once '../vendor/autoload.php';
					$mongo = new MongoDB\Client;
					$db = $mongo->Classimax;
					$collection = $db->itemsList;
					$result = $collection->find(['category' => 'stationery']);
					
					$c1 = 0; 
					foreach ($result as $searchfor) {
						if($c1 < 1){
							echo '<form action="../php/single.php" method="post"><input type="hidden" name="_id" value="' . $searchfor["_id"] . '"><div class="product-item bg-light"><button name="update" type="submit"><div class="card"><div class="card"><div class="thumb-content"><div class="price">' . $searchfor['price'] . '</div>
							<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $searchfor['image'] . '" alt="Card image cap"></a>
							</div><div class="card-body"><h4 class="card-title"><a href="">' . $searchfor['title'] . '</a></h4>
							<ul class="list-inline product-meta"><li class="list-inline-item">
							<a href=""><i class="fa fa-folder-open-o"></i>' . $searchfor['category'] . '</a></li>
							<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $searchfor['date'] . '</a></li>
							</ul><p class="card-text">' . $searchfor['description'] . '</p>
							</div></div></button></div></form>';
						}
						$c1++;
					} ?>



				</div>


			</div>
		</div>
	</section>
	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Suggested Ads</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-sm-12 col-lg-4">
					<!-- product card -->
					<?php
					/*require_once '../vendor/autoload.php';
					$mongo = new MongoDB\Client;
					$db = $mongo->Classimax;
					$collectionName = $_SESSION['firstname']."".$_SESSION['lastname']."countitemsList";
					$collection = $db->$collectionName;
					$result = $collection->findOne(['_id' => 'searchforproduct.php']);
					$categories = array('books', 'electronics', 'stationary', 'teachers', 'courses');
					$counts = array($result['countBooks'], $result['countElectronics'], $result['countStationary'], $result['countTeachers'], $result['countCourses']);
					$maxIndex = array_search(max($counts), $counts);
					
					$collection = $db->itemsList;
					$result = $collection->findOne(['category' => $categories[$maxIndex]]);
					
					echo '<form action="../php/single.php" method="post"><input type="hidden" name="_id" value="' . $result["_id"] . '"><div class="product-item bg-light"><button name="update" type="submit"><div class="card"><div class="card"><div class="thumb-content"><div class="price">' . $result['price'] . '</div>
					<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $result['image'] . '" alt="Card image cap"></a>
					
					</div><div class="card-body"><h4 class="card-title"><a href="">' . $result['title'] . '</a></h4>
					<ul class="list-inline product-meta"><li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>' . $result['category'] . '</a></li>
					<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $result['date'] . '</a></li>
					</ul><p class="card-text">' . $result['description'] . '</p>
					</div></div></button></div></form>';*/ ?>
					<!--<div class="product-item bg-light">
						<div class="card">
							<div class="thumb-content">
								 <div class="price">$200</div>
								<a href="">
									<img class="card-img-top img-fluid" src="../images/products/products-1.jpg" alt="Card image cap">
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
								<ul class="list-inline product-meta">
									<li class="list-inline-item">
										<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
									</li>
									<li class="list-inline-item">
										<a href=""><i class="fa fa-calendar"></i>26th December</a>
									</li>
								</ul>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
							</div>
						</div>
					</div>-->



				</div>
				<div class="col-sm-12 col-lg-4">
					<!-- product card -->
					<?php
					/*require_once '../vendor/autoload.php';
					$mongo = new MongoDB\Client;
					$db = $mongo->Classimax;
					$collectionName = $_SESSION['firstname']."".$_SESSION['lastname']."countitemsList";
					$collection = $db->$collectionName;
					$result = $collection->findOne(['_id' => 'searchforproduct.php']);
					$categories = array('books', 'electronics', 'stationary', 'teachers', 'courses');
					$counts = array($result['countBooks'], $result['countElectronics'], $result['countStationary'], $result['countTeachers'], $result['countCourses']);
					$maxIndex = array_search(max($counts), $counts);
					
					$collection = $db->itemsList;
					$result = $collection->findOne(['category' => $categories[$maxIndex]]);
					
					echo '<form action="../php/single.php" method="post"><input type="hidden" name="_id" value="' . $result["_id"] . '"><div class="product-item bg-light"><button name="update" type="submit"><div class="card"><div class="card"><div class="thumb-content"><div class="price">' . $result['price'] . '</div>
					<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $result['image'] . '" alt="Card image cap"></a>
					
					</div><div class="card-body"><h4 class="card-title"><a href="">' . $result['title'] . '</a></h4>
					<ul class="list-inline product-meta"><li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>' . $result['category'] . '</a></li>
					<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $result['date'] . '</a></li>
					</ul><p class="card-text">' . $result['description'] . '</p>
					</div></div></button></div></form>';*/?>
					<?php
						require_once '../vendor/autoload.php';

						$mongo = new MongoDB\Client;
						$db = $mongo->Classimax;

						$collectionName = $_SESSION['firstname']."".$_SESSION['lastname']."countitemsList";
						$collection = $db->$collectionName;
						$result = $collection->findOne(['_id' => 'searchforproduct.php']);

						$categories = array('books', 'electronics', 'stationary', 'teachers', 'courses');
						$counts = array($result['countBooks'], $result['countElectronics'], $result['countStationary'], $result['countTeachers'], $result['countCourses']);
						$maxIndex = array_search(max($counts), $counts);

						$collection = $db->itemsList;
						$result = $collection->find(['category' => $categories[$maxIndex]])->toArray();
						shuffle($result);

						$selected_item = $result[0];

						echo '<form action="../php/single.php" method="post">
						<input type="hidden" name="_id" value="' . $selected_item["_id"] . '">
						<div class="product-item bg-light">
							<button name="update" type="submit">
							<div class="card">
								<div class="card">
								<div class="thumb-content">
									<div class="price">' . $selected_item['price'] . '</div>
									<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $selected_item['image'] . '" alt="Card image cap"></a>
								</div>
								<div class="card-body">
									<h4 class="card-title"><a href="">' . $selected_item['title'] . '</a></h4>
									<ul class="list-inline product-meta">
									<li class="list-inline-item">
										<a href=""><i class="fa fa-folder-open-o"></i>' . $selected_item['category'] . '</a>
									</li>
									<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $selected_item['date'] . '</a></li>
									</ul>
									<p class="card-text">' . $selected_item['description'] . '</p>
								</div>
								</div>
							</div>
							</button>
						</div>
						</form>';
						?>

					<script>
						setInterval(function() {
							showHighestCountItem();
						}, 5000);
					</script>




				</div>
				<div class="col-sm-12 col-lg-4">
					<!-- product card -->
					<?php
					/*
					require_once '../vendor/autoload.php';
					$mongo = new MongoDB\Client;
					$db = $mongo->Classimax;
					$collectionName = $_SESSION['firstname']."".$_SESSION['lastname']."countitemsList";
					$collection = $db->$collectionName;
					$result = $collection->findOne(['_id' => 'searchforproduct.php']);
					$categories = array('books', 'electronics', 'stationary', 'teachers', 'courses');
					$counts = array($result['countBooks'], $result['countElectronics'], $result['countStationary'], $result['countTeachers'], $result['countCourses']);
					$maxIndex = array_search(max($counts), $counts);
					
					$collection = $db->itemsList;
					$result = $collection->findOne(['category' => $categories[$maxIndex]]);
					
					echo '<form action="../php/single.php" method="post"><input type="hidden" name="_id" value="' . $result["_id"] . '"><div class="product-item bg-light"><button name="update" type="submit"><div class="card"><div class="card"><div class="thumb-content"><div class="price">' . $result['price'] . '</div>
					<a href=""><img class="card-img-top img-fluid" src="data:image/jpeg;base64,' . $result['image'] . '" alt="Card image cap"></a>
					
					</div><div class="card-body"><h4 class="card-title"><a href="">' . $result['title'] . '</a></h4>
					<ul class="list-inline product-meta"><li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>' . $result['category'] . '</a></li>
					<li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i>' . $result['date'] . '</a></li>
					</ul><p class="card-text">' . $result['description'] . '</p>
					</div></div></button></div></form>';*/?>



				</div>


			</div>
		</div>
	</section>


	<!--==========================================
=            All Category Section            =
===========================================-->

	<section class=" section">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Section title -->
					<div class="section-title">
						<h2>All Categories</h2>
					</div>
					<div class="row">
						<!-- Category list -->
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block">
								<div class="header">
									<a href="../php/Electronics.php">
										<i class="fa fa-laptop icon-bg-1"></i>
										<h4>Electronics</h4>
									</a>
								</div>

							</div>
						</div> <!-- /Category List -->
						<!-- Category list -->
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block">
								<div class="header">
									<a href="../php/Books.php">
										<i class="fa fa-book icon-bg-2"></i>
										<h4>Books</h4>
									</a>
								</div>
							</div>
						</div> <!-- /Category List -->
						<!-- Category list -->
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block">
								<div class="header">
									<a href="../php/Stationary.php">
										<i class="fa fa-pencil icon-bg-3"></i>
										<h4>Stationery</h4>
									</a>
								</div>
							</div>
						</div> <!-- /Category List -->
						<!-- Category list -->
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block">
								<div class="header">
									<a href="../php/Courses.php">
										<i class="fa fa-exchange icon-bg-4"></i>
										<h4>Courses</h4>
									</a>
								</div>
							</div>
						</div> <!-- /Category List -->
						<!-- Category list -->
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
							<div class="category-block">
								<div class="header">
									<a href="../php/Teachers.php">
										<i class="fa fa-user icon-bg-5"></i>
										<h4>Teachers</h4>
									</a>
								</div>
							</div>
						</div> <!-- /Category List -->
						<!-- Category list -->



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
<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
	header("Location: ../php/login.php");
	exit;
}
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection1 = $db->customersFeedback;
$collection2 = $db->adminNotes;
$countFeedbacks = $collection1->count();
$countNotes = $collection2->count();
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
						<a class="navbar-brand" href="../php/admin.php">
							<img src="../images/logo.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav ">

								<li class="nav-item active">
									<a class="nav-link" href="../php/admin.php">Home</a>
								</li>
								<li class="nav-item active">
									<a class="nav-link" href="../">Dashboard</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../php/itemsList.php">Items List</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../php/customersList.php">Customers List</a>
								</li>
								<!--<li class="nav-item dropdown dropdown-slide">
									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Category <span><i class="fa fa-angle-down"></i></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="../php/Books.php">Books</a>
										<a class="dropdown-item" href="../php/Stationary.php">Stationery</a>
										<a class="dropdown-item" href="../php/Electronics.php">Electronics</a>
										<a class="dropdown-item" href="../php/Courses.php">Courses</a>
										<a class="dropdown-item" href="../php/Teachers.php">Teachers</a>
									</div>
								</li>-->

								<!--<li class="nav-item">
									<a class="nav-link" href="../php/contactus.php">Contact Us</a>
								</li>-->
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a class="nav-link login-button" href="../php/login.php">Logout</a>
								</li>
								<!--<li class="nav-item">
									<a class="nav-link add-button" href="../php/listing_form.php"><i class="fa fa-plus-circle"></i> Add Listing</a>
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
				<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
					<div class="sidebar">
						<!-- User Widget -->
						<div class="widget user-dashboard-profile">
							<!-- User Image -->
							<div class="profile-thumb">
								<!--<img src="../images/user/user-thumb.jpg" alt="" class="rounded-circle">-->
								<?php echo '<img class="rounded-circle" src="data:image/jpeg;base64,' . $_SESSION['myimage'] . '"/>'; ?>
							</div>
							<!-- User Name -->
							<!--<h5 class="text-center"><?php //echo $_SESSION['firstname'] . " " . $_SESSION['lastname']  
														?></h5>-->
							<h5 class="text-center">Wissam & Sabine</h5>
						</div>
						<!-- Dashboard Links -->
						<div class="widget user-dashboard-menu">
							<ul>
								<li>
									<a href="../php/readAdminNotes.php"><i class="fa fa-user"></i> My Notes<span><?php echo "(" . $countNotes . ")"; ?></span></a>
								</li>
								<li>
									<a href="../php/readCustomersFeedbacks.php"><i class="fa fa-bookmark-o"></i> Customers Feedback <span><?php echo "(" . $countFeedbacks . ")"; ?></span></a>
								</li>
								<!--<li>
									<a href="../php/login.php"><i class="fa fa-cog"></i> Logout</a>
								</li>-->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
					<!-- Edit Personal Info -->
					<div class="widget personal-info">
						<h3 class="widget-header user">Edit Personal Information</h3>
						<form action="../php/editadmininformation.php" method="POST" enctype="multipart/form-data">
							<!-- First Name 
							<div class="form-group">
								<label for="first-name">First Name</label>
								<input required type="text" class="form-control" id="first-name" name="firstname" value="<?php echo $_SESSION['firstname'] ?>">
							</div>
							<div class="form-group">
								<label for="last-name">Last Name</label>
								<input required type="text" class="form-control" id="last-name" name="lastname" value="<?php echo $_SESSION['lastname'] ?>">
							</div>-->
							<!-- Age -->
							<div class="form-group">
								<label for="age">Age</label>
								<input required type="text" class="form-control" id="age" name="age" value="<?php echo $_SESSION['age'] ?>">
							</div>
							<!-- Phone Number -->
							<div class="form-group">
								<label for="phonenumber">Phone Number</label>
								<input required type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $_SESSION['phonenumber'] ?>">
							</div>
							<!-- City -->
							<div class="form-group">
								<label for="city">City</label>
								<input required type="text" class="form-control" id="city" name="city" value="<?php echo $_SESSION['city'] ?>">
							</div>
							<!-- File chooser -->
							<div class="form-group choose-file">
								<i class="fa fa-user text-center"></i>
								<input type="file" class="form-control-file d-inline" id="myimage" name="myimage">
							</div>

							<!-- Submit button -->
							<button class="btn btn-transparent">Save My Changes</button>
						</form>

					</div>
					<!-- Change Password -->
					<!--<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form action="#">-->
					<!-- Current Password -->
					<!--<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="password" class="form-control" id="current-password">
							</div>-->
					<!-- New Password -->
					<!--<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" class="form-control" id="new-password">
							</div>-->
					<!-- Confirm New Password -->
					<!--<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" class="form-control" id="confirm-password">
							</div>-->
					<!-- Submit Button -->
					<!--<button class="btn btn-transparent">Change Password</button>
						</form>
					</div>-->
					<!-- Change Email Address -->

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
							<li>Lebanon</li>
							<!--<li><a href="#">Listed Ads</a></li>
							<li><a href="../html/category.html">Categories</a></li>-->
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
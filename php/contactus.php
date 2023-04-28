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
  <link href="../css/contactus.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/login.css">
  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    } */

    h1 {
      text-align: center;
      margin: 20px 0;
      font-size: 32px;
    }

    p {
      margin: 20px 0;
      line-height: 1.5;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 10px;
    }

    input,
    textarea {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    @media screen and (max-width: 600px) {
      body {
        width: fit-content;
        height: fit-content;
      }

      .form-container {
        font-size: small;
        padding: 1px;
        margin: 1px;
        margin-top: 40px;
        height: 600px;
        width: 400px;
      }

      input,
      textarea {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 2px;
        font-size: 10px;
        margin-bottom: 5px;
      }
    }

    @media screen and (min-width: 601px) and (max-width: 900px) {
      body {
        width: fit-content;
        height: fit-content;
      }

      .form-container {
        margin-top: 40px;
        height: 600px;
        width: 400px;
      }
    }

    @media screen and (min-width: 901px) {
      body {
        width: fit-content;
        height: fit-content;
      }

      .form-container {
        margin-top: 40px;
        height: 650px;
        width: 400px;
      }
    }
  </style>

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

                <li class="nav-item dropdown dropdown-slide">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category <span><i class="fa fa-angle-down"></i></span>
                  </a>
                  <!-- Dropdown list -->
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../php/Category.php">All</a>
                    <a class="dropdown-item" href="../html/Books.html">Books</a>
                    <a class="dropdown-item" href="../html/Stationery.html">Stationery</a>
                    <a class="dropdown-item" href="../html/Electronics.html">Electronics</a>
                    <a class="dropdown-item" href="../html/Courses.html">Courses</a>
                    <a class="dropdown-item" href="../html/Teachers.html">Teachers</a>
                  </div>
                </li>

                <!--<li class="nav-item active">
                  <a class="nav-link" href="../php/contactus.php">Contact Us</a>
                </li>-->
              </ul>
              <ul class="navbar-nav ml-auto mt-10">
                <li class="nav-item">
                  <a class="nav-link login-button" href="../php/login.php">Logout</a>
                </li>
                <!--<li class="nav-item">
                  <a class="nav-link add-button" href="../php/login.php"><i class="fa fa-plus-circle"></i> Add Listing</a>
                </li>-->
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


  <!--===========================================
=            Popular deals section            =
============================================-->
  <main>
    <div class="row-login">

      <div class="colm-form">
        <div class="form-container">
          <h2> Give Us Your Feedback</h2>
          <form action="contactus.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" pattern="^([A-Za-z]{1})+([A-Za-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}+$" required>
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <input type="submit" value="Send">
            <h2>Contact Us</h2>
            <p> Phone Number: +961 - 71212734</p>
            <p> Location: Lebanon</p>
          </form>
          <!-- HTML for rating form -->

        </div>

      </div>
    </div>

  </main>

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
<?php
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->customersFeedback;
if ($_POST) {
  $insert = array(
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'message' => $_POST['message'],
  );
  if ($collection->insertOne($insert)) {
    echo "<script>alert('Well Received!')</script>";
  } else {
    echo "<script>alert('Some Issues!')</script>";
  }
}
?>

</html>
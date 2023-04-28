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
    <link rel="stylesheet" href="../css/login.css">
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />

</head>

<body class="body-wrapper">


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg  navigation">
                        <a class="navbar-brand" href="#">
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

    <!--===============================
=            Hero Area            =
================================-->


    <!--===========================================
=            Popular deals section            =
============================================-->
    <main>
        <div class="row-login">
            <div class="colm-logo">
                <img src="../images/logo.png" alt="" id="image-logo">
                <h4 id="loginh2">ClassiMax is an advertisement site for books, stationery, courses, and teachers. Find what you’re searching for or make your very own advertisement for nothing!</h4>
            </div>
            <div class="colm-form">
                <div class="form-container">
                    <h2> Reset Password</h2>
                    <p>Enter the confirmation code sent to your email address and a new password:</p>
                    <form action="../php/resetpass.php" method="post">

                        <input type="text" id="code" name="code" placeholder="Confirmation Code" required>

                        <!--<input type="password" placeholder="Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" name="password">-->

                        <input type="password" placeholder="New Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" name="password">
                        <button type="button" id="view-password">👁</button>
                        <script>
                            const passwordInput = document.querySelector("input[name='password']");
                            const viewButton = document.querySelector("#view-password");

                            viewButton.addEventListener("click", function() {
                                if (passwordInput.type === "password") {
                                    passwordInput.type = "text";
                                } else {
                                    passwordInput.type = "password";
                                }
                            });
                        </script>
                        <input type="submit" value="Reset Password" class="btn-login">
                    </form>

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
                            <li>Lebanon</li>
                        </ul>
                    </div>
                </div>

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

<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the confirmation code and new password from the form
    $code = $_POST['code'];
    $password = $_POST['password'];
    require_once '../vendor/autoload.php';
    // Connect to the MongoDB server
    $client = new MongoDB\Client;
    $database = $client->Classimax;
    // Select the "password_resets" collection
    $collection = $database->password_resets;

    // Check if the confirmation code is valid
    $document = $collection->findOne(['confirm_code' => $code]);
    if ($document) {
        // Get the email address associated with the confirmation code
        $email = $document['email'];

        // Hash the new password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Update the password in the "users" collection
        $collection = $database->users;
        $updateResult = $collection->updateOne(
            ['email' => $email],
            ['$set' => ['password' => $password_hash]]
        );

        // Delete the confirmation code from the "password_resets" collection
        $deleteResult = $collection->deleteOne(['confirm_code' => $code]);

        // Redirect to the login page
        echo '<script>location.href="../php/login.php"</script>';
        exit;
    } else {
        // Display an error message
        echo '<p>Invalid confirmation code. Please try again.</p>';
    }
}

?>
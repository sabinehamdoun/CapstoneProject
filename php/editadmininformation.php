<?php
session_start();
// Check if the form has been submitted
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->users;
try {
    if ($_POST) {
        if (isset($_FILES['myimage']) && is_uploaded_file($_FILES['myimage']['tmp_name'])) {
            if (!getimagesize($_FILES['myimage']['tmp_name'])) {
                echo "<script>alert('File can only be an image!')</script>";
                echo ('<script>location.href="../php/admin-profile.php"</script>');
            } else {
                $data = file_get_contents($_FILES['myimage']['tmp_name']);
                $encodedData = base64_encode($data);
                $_SESSION['myimage'] = $encodedData;
                ////////////////////////////////////////////
                // Get the email address associated with the confirmation code
                $email = $_SESSION['email'];
                $_SESSION['firstname'] = $_POST['firstname'];
                $_SESSION['lastname'] = $_POST['lastname'];
                $updateResult = $collection->updateOne(
                    ['email' => $email],
                    ['$set' => ['firstname' => $_POST['firstname']]]
                );
                $updateResult = $collection->updateOne(
                    ['email' => $email],
                    ['$set' => ['lastname' => $_POST['lastname']]]
                );
                $updateResult = $collection->updateOne(
                    ['email' => $email],
                    ['$set' => ['age' => $_POST['age']]]
                );
                $updateResult = $collection->updateOne(
                    ['email' => $email],
                    ['$set' => ['phonenumber' => $_POST['phonenumber']]]
                );
                $updateResult = $collection->updateOne(
                    ['email' => $email],
                    ['$set' => ['city' => $_POST['city']]]
                );
                $updateResult = $collection->updateOne(
                    ['email' => $email],
                    ['$set' => ['myimage' => $encodedData]]
                );
                echo '<script>alert("Changes Successfull!")</script>';
                // Redirect to the login page
                header('Location: ../php/admin-profile.php');

                exit;
            }
        }
    }
} catch (Exception $e) {
    echo $e;
}

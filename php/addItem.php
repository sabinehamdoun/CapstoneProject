<?php
session_start();
use MongoDB\BSON\Binary;

require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$today = date("F j, Y");
if ($_POST) {
    if (isset($_FILES['inputfile']) && is_uploaded_file($_FILES['inputfile']['tmp_name'])) {
        if (!getimagesize($_FILES['inputfile']['tmp_name'])) {
            echo "<script>alert('File can only be an image!')</script>";
            echo ('<script>location.href="../php/listing_form.php"</script>');
        } else {
            // file is an image, you can proceed with your code
            $data = file_get_contents($_FILES['inputfile']['tmp_name']);
            $encodedData = base64_encode($data);
            // Store the encoded image data in the session
            $_SESSION['image'] = $encodedData;
            // create a binary object for the image data
            //$binary = new Binary($data, Binary::TYPE_GENERIC);
            $insert = array(
                'title' => $_POST['title'],
                'brand' => $_POST['brand'],
                'category' => $_POST['category'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'location' => $_POST['location'],
                'date' => $today,
                'image' => $encodedData,
                'email' => $_SESSION['email'],
            );
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['brand'] = $_POST['brand'];
            $_SESSION['category'] = $_POST['category'];
            $_SESSION['description'] = $_POST['description'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['location'] = $_POST['location'];
            $_SESSION['date'] = $today;
            if ($collection->insertOne($insert)) {
                //foreach ($result as $searchfor) {
                //}
                //echo "<script>alert('Saved!')</script>";
                echo ('<script>location.href="../php/dashboard.php"</script>');
            } else {
                echo "<script>alert('Some Issues!')</script>";
            }
        }
    }
}
?>
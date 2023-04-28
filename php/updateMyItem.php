<?php
session_start();
use MongoDB\BSON\Binary;
use MongoDB\BSON\ObjectId;
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
            $_SESSION['image']= $encodedData;
            // create an array with the updated fields
            $update = array(
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
            // define the _id of the item to update
            if(!isset($_SESSION['_id'])) {
                throw new Exception('Session _id is empty');
            }
            $id = new ObjectId($_SESSION['_id']);
            // update the item in the collection
            $updateResult = $collection->updateOne(['_id' => $id], ['$set' => $update]);
            if($updateResult->getModifiedCount()){
                echo ('<script>location.href="../php/dashboard.php"</script>');
            } else {
                echo "<script>alert('Some Issues!')</script>";
            }
        }
    }
}
?>

<?php
/*session_start();
use MongoDB\BSON\Binary;
use MongoDB\BSON\ObjectId;
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
            $_SESSION['image']= $encodedData;
            // create an array with the updated fields
            $update = array(
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
            // define the _id of the item to update
            $id = new ObjectId($_SESSION['noteId']);
            // update the item in the collection
            $updateResult = $collection->updateOne(['_id' => $id], ['$set' => $update]);
            if($updateResult->getModifiedCount()){
                echo ('<script>location.href="../php/dashboard.php"</script>');
            } else {
                echo "<script>alert('Some Issues!')</script>";
            }
        }
    }
}*/?>

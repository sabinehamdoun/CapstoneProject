<?php
session_start();
use MongoDB\BSON\Binary;
use MongoDB\BSON\ObjectId;
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
/////////
$result = $collection->find();
//$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
//$collection2 = $db->$tableName;
$today = date("F j, Y");
if ($_POST) {
    // create an array with the updated fields
    $update = array(
        'title' => $_POST['title'],
        'brand' => $_POST['brand'],
        'category' => $_POST['category'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'location' => $_POST['location'],
    );
    // define the _id of the item to update
    if(!isset($_SESSION['_id'])) {
        throw new Exception('Session _id is empty');
    }
    $id = new ObjectId($_SESSION['_id']);
    // update the item in the collection
    $updateResult = $collection->updateOne(['_id' => $id], ['$set' => $update]);
    if($updateResult->getModifiedCount()){
        echo ('<script>location.href="../php/itemsList.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }       
}
/*
session_start();
use MongoDB\BSON\Binary;
use MongoDB\BSON\ObjectId;
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;

$result = $collection->findOne(['_id' => new ObjectId($_SESSION['_id'])]);
$email = $result['email'];

$user = $db->users->findOne(['email' => $email]);
$firstname = $user['firstname'];
$lastname = $user['lastname'];

$collection2 = $db->{$firstname . $lastname . "itemsList"};

$today = date("F j, Y");
if ($_POST) {
    // create an array with the updated fields
    $update = array(
        'title' => $_POST['title'],
        'brand' => $_POST['brand'],
        'category' => $_POST['category'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'location' => $_POST['location'],
    );
    // find the item in the user-specific collection
    $item = $collection2->findOne([
        'title' => $result['title'],
        'brand' => $result['brand'],
        'category' => $result['category'],
        'description' => $result['description'],
        'price' => $result['price'],
        'location' => $result['location'],
        'date' => $result['date']
    ]);
    // update the item in the collection
    $updateResult2 = $collection2->updateOne(['_id' => $item['_id']], ['$set' => $update]);
    if($updateResult2->getModifiedCount()){
        echo ('<script>location.href="../php/itemsList.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }       
}*/
?>



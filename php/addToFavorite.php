<?php 
session_start();
use MongoDB\BSON\Binary;
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
$collection2 = $db->selectCollection($tableName);
$id = new MongoDB\BSON\ObjectId($_POST['_id']);
$item = $collection->findOne(['_id' => $id]);
$item2 = $collection2->findOne(['title' => $item['title'],'brand' => $item['brand'],'category' => $item['category'],'description' => $item['description'],'price' => $item['price'],'location' => $item['location']]);
// Check if the item is already in the user's favorite list
//$favItem = $collection2->findOne(['title' => $item['title'],'brand' => $item['brand'],'email' => $_SESSION['email']]);
if($item2){
    echo "<script>alert('Item already in favorite list!')</script>";
    echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
}



elseif(!$item || $item['email'] != $_SESSION['email']){
    $insert = array(
        'title' => $item['title'],
        'brand' => $item['brand'],
        'category' => $item['category'],
        'description' => $item['description'],
        'price' => $item['price'],
        'location' => $item['location'],
        'date' => $item['date'],
        'image' => $item['image'],
        'email' => $item['email'],
        'flag' => "true",
    );

    if ($collection2->insertOne($insert)) {
        echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }
}
else{
    echo "<script>alert('You can not add your own items!')</script>";
    echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
}

/*session_start();
use MongoDB\BSON\Binary;
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
$collection2 = $db->selectCollection($tableName);
$id = new MongoDB\BSON\ObjectId($_POST['_id']);
$item = $collection->findOne(['_id' => $id]);

// Check if the item is already in the user's favorite list
$favItem = $collection2->findOne(['_id' => $id]);
if($favItem){
    echo "<script>alert('Item already in favorite list!')</script>";
    echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
}elseif(!$item || $item['email'] != $_SESSION['email']){
    $insert = array(
        'title' => $item['title'],
        'brand' => $item['brand'],
        'category' => $item['category'],
        'description' => $item['description'],
        'price' => $item['price'],
        'location' => $item['location'],
        'date' => $item['date'],
        'image' => $item['image'],
        'email' => $item['email'],
        'flag' => "true",
    );

    if ($collection2->insertOne($insert)) {
        echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }
}
else{
    echo "<script>alert('You can not add your own items!')</script>";
    echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
}*/


?>


<?php
/*
session_start();
use MongoDB\BSON\Binary;
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
$collection2 = $db->selectCollection($tableName);
$id = new MongoDB\BSON\ObjectId($_POST['_id']);
$item = $collection->findOne(['_id' => $id]);
if(!$item || $item['email'] != $_SESSION['email'])
{
    $insert = array(
        'title' => $item['title'],
        'brand' => $item['brand'],
        'category' => $item['category'],
        'description' => $item['description'],
        'price' => $item['price'],
        'location' => $item['location'],
        'date' => $item['date'],
        'image' => $item['image'],
        'email' => $item['email'],
        'flag' => "true",
    );

    if ($collection2->insertOne($insert)) {
        echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }
}
else{
    echo "<script>alert('You can not add your own items!')</script>";
    echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
}*/
?>


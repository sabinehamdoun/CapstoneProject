<?php
session_start();
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$tableName = $_SESSION['firstname'] . $_SESSION['lastname'] . "itemsList";
$collection2 = $db->selectCollection($tableName);
$id = new MongoDB\BSON\ObjectId($_POST['_id']);
if ($_POST) {
    if ($collection2->deleteOne(['_id' => $id])) {
        echo ('<script>location.href="../php/dashboard-favourite-ads.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
    }
}
?>
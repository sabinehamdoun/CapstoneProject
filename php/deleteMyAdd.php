<?php
require_once '../vendor/autoload.php';

try {
    $mongo = new MongoDB\Client;
    $db = $mongo->Classimax;
    $collection = $db->itemsList;
    $noteId = $_POST['noteId'];
    if(empty($noteId)){
        throw new Exception('Note ID is empty');
    }
    $deleteResult = $collection->deleteOne(["_id" => new MongoDB\BSON\ObjectId($noteId)]);
    if($deleteResult->getDeletedCount() == 0){
        throw new Exception('Note not found in the database');
    }
    header("Location: ../php/dashboard.php");
    exit;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

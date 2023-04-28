<?php
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->adminNotes;

if ($_POST) {
    
    $insert = array(
        'adminNote' => $_POST['adminNote'],
        'adminID' => $_POST['adminNote'],
    );
    
    if ($collection->insertOne($insert)) {
        echo ('<script>location.href="../php/readAdminNotes.php"</script>');
    } else {
        echo "<script>alert('Some Issues!')</script>";
        echo ('<script>location.href="../php/readAdminNotes.php"</script>');
    }
}
?>
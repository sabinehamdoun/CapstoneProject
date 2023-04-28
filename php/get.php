<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <script src="../js/ajax.js"></script>
</body>

</html>
<?php
require_once '../vendor/autoload.php';

// Validate the title
/*if (!isset($_POST["title"]) || empty(trim($_POST["title"]))) {
    echo json_encode(array("error" => "Title is required"));
    exit;
}
$title = trim($_POST["title"]);

// Sanitize the title
$title = filter_var($title, FILTER_SANITIZE_STRING);*/

$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$collection = $db->itemsList;
//$newitem = $collection->findOne(array("title" => $title));
$newitem = $collection->find();
//echo $newitem;
echo json_encode($newitem);

//echo ('<script>location.href="../php/dashboard.php"</script>');
?>
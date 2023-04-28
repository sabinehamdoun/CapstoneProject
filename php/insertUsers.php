<?php
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$mylogin = $_POST['email'];
$mypassword = $_POST['password'];
$qry = array("email" => $mylogin);
$collection1 = $db->users;
$collection = $db->users;
session_start();
if (isset($_POST) > 0) {
    $result = $collection1->findOne($qry);
    if ($result) {
        echo "Email already exist";
        echo ('<script>location.href="../php/login.php"</script>');
    } else {
        if (isset($_POST)) {
            $tableName = $_POST['firstname'] . $_POST['lastname'] . "itemsList";
            $collection2 = $db->createCollection($tableName);
            $tableName2 = $_POST['firstname'] . $_POST['lastname'] . "countitemsList";
            $collection4 = $db->createCollection($tableName2);
            $data = file_get_contents($_FILES['myimage']['tmp_name']);
            $encodedData = base64_encode($data);
            $_SESSION['myimage'] = $encodedData;
            $password = $_POST['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            /*$_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['surname'] = $_POST['surname'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['mobilenumber'] = $_POST['mobilenumber'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['password'] = $hashed_password;
            $_SESSION['city'] = $_POST['city'];*/
            $insert = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'age' => $_POST['age'],
                'phonenumber' => $_POST['phonenumber'],
                'password' => $hashed_password,
                //'password' => $_POST['password'],
                'city' => $_POST['city'],
                'myimage' => $encodedData,
            );

            if ($collection->insertOne($insert)) {
                echo ('<script>location.href="../php/login.php"</script>');
            } else {
                echo "some issue";
            }
        } else {
            echo "no data to store";
        }
    }
}

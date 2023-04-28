<?php
session_start();
require_once '../vendor/autoload.php';
$mongo = new MongoDB\Client;
$db = $mongo->Classimax;
$myemail = $_POST['email'];
$mypassword = $_POST['password'];
$collection = $db->users;
$result = $collection->find(['email' => $_POST['email']]);
$flag = 0;

foreach ($result as $searchfor) {
  $storedEmail = $searchfor['email'];
  $storedPassword = $searchfor['password'];
  if ($myemail == $storedEmail && password_verify($mypassword, $storedPassword)) {
    $flag = 1;
    $_SESSION['firstname'] = $searchfor['firstname'];
    $_SESSION['lastname'] = $searchfor['lastname'];
    $_SESSION['email'] = $searchfor['email'];
    $_SESSION['age'] = $searchfor['age'];
    $_SESSION['phonenumber'] = $searchfor['phonenumber'];
    $_SESSION['city'] = $searchfor['city'];
    $_SESSION['myimage'] = $searchfor['myimage'];
  }
}
if ($flag == 1) {
  echo ('<script>location.href="../php/cookies.php"</script>');
}else{
    echo ('<script>location.href="../php/login.php"</script>');
}
?>
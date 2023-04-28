<?php 
session_start(); 
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../php/login.php");
    exit;
}
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classimax</title>
    <link rel="stylesheet" href="../css/read_add_notes.css">
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />
</head>

<body>
    <a class="navbar-brand" href="../php/admin-profile.php">
        <img src="../images/logo.png" alt="">
    </a>
    <h1 class="header">My Notes</h1>

    <form action="../php/addAdminNote.php" method="post">
        <label for="task" class="label">Notes: </label>
        <input type="text" class="form-control" name="adminNote" autofocus></input>
        <button class="addBtn">Add Todo</button>
    </form>

    <ul id="todoList">
        <?php
        require_once '../vendor/autoload.php';
        $mongo = new MongoDB\Client;
        $db = $mongo->Classimax;
        $collection = $db->adminNotes;
        $posts = $collection->find();
        $i = 1;
        foreach ($posts as $item) {
            echo  "<form action='../php/deleteAdminNote.php' method='post'>
                <input type='hidden' name='noteId' value='" . $item->_id . "'>
                <label><b> $i) </b>" . $item->adminNote . " <button name='delete' type='submit'>X</button>
            </form>";
            $i++;
        }
        ?>
    </ul>


</body>

</html>
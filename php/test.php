
<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />
</head>

<body>
    <h1>Reset Password</h1>
    <p>Enter the confirmation code sent to your email address and a new password:</p>
    <form action="resetpass.php" method="post">
        <label for="code">Confirmation Code:</label>
        <input type="text" id="code" name="code" required>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the confirmation code and new password from the form
    $code = $_POST['code'];
    $password = $_POST['password'];
    require_once '../vendor/autoload.php';
    // Connect to the MongoDB server
    $client = new MongoDB\Client;
    $database = $client->Classimax;
    // Select the "password_resets" collection
    $collection = $database->password_resets;

    // Check if the confirmation code is valid
    $document = $collection->findOne(['confirm_code' => $code]);
    if ($document) {
        // Get the email address associated with the confirmation code
        $email = $document['email'];

        // Hash the new password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Update the password in the "users" collection
        $collection = $database->users;
        $updateResult = $collection->updateOne(
            ['email' => $email],
            ['$set' => ['password' => $password_hash]]
        );

        // Delete the confirmation code from the "password_resets" collection
        $deleteResult = $collection->deleteOne(['confirm_code' => $code]);

        // Redirect to the login page
        header('Location: ../php/login.php');
        exit;
    } else {
        // Display an error message
        echo '<p>Invalid confirmation code. Please try again.</p>';
    }
}

?>
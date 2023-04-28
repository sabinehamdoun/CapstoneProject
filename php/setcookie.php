<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classimax</title>
    <link rel="icon" type="image/x-icon" href="../images/mylogo.png" />
</head>

<body>
    <?php
    // Set the expiration date to one week from now
    $expiry = time() + 60 * 60 * 24 * 7;

    // Set the cookie value
    $value = '<user_id>|<username>';

    // Set the cookie
    setcookie('classifieds_user', $value, $expiry);
    ?>
</body>

</html>
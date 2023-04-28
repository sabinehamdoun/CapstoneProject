
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email address from the form
    $email = $_POST['email'];
    require_once '../vendor/autoload.php';

    // Check if the email address is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Generate a random confirmation code
        $confirm_code = bin2hex(random_bytes(16));

        // Connect to the MongoDB server
        $client = new MongoDB\Client;
        $database = $client->Classimax;
        // Select the "password_resets" collection
        $collection = $database->password_resets;

        // Insert the confirmation code into the "password_resets" collection
        $insertResult = $collection->insertOne([
            'email' => $email,
            'confirm_code' => $confirm_code
        ]);

        // Send the password reset email (replace with your own email sending logic)
        //$reset_link = "http://localhost/classimax-master/php/resetpassword.php?code=$confirm_code";


        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'wissam8802@gmail.com';                     //SMTP username
            $mail->Password   = 'fwfbwhecncvokmlq';                               //SMTP password: taken from gmail account from settings
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('wissam8802@gmail.com', 'Classimax');
            $mail->addAddress($email);
            $mail->addReplyTo('no-reply@gmail.com', 'No reply');

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Confirmation Code';
            $mail->Body    = 'This is the configuration code: <b>'.$confirm_code.'</b>';

            $mail->send();
            
            //header('Location: ../php/resetpass.php');
            echo ('<script>location.href="../php/resetpass.php"</script>');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Redirect to the confirmation page
        exit;
    } else {
        // Display an error message
        echo '<p>Invalid email address. Please try again.</p>';
    }
}

?>


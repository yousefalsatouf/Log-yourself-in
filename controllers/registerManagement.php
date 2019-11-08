<?php

//require 'vendor/autoload.php';
include_once '../view/registration.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$username       = isset($_POST['username']) ? $_POST['username'] : "";
$rgPassword     = isset($_POST['rg-password']) ? $_POST['rg-password'] : "";
$rgEmail        = isset($_POST['rg-mail']) ? $_POST['rg-mail']    : "";
$verify         = isset($_POST['verify']) ? $_POST['verify']  : "";

if (!empty($_POST)) {
    if (empty($username) || empty($rgPassword) || empty($rgEmail) || empty($verify))
    {
        $class_alert = "alert-danger";
        $show_msg = "Sorry, Missing Information";

        if (empty($username))
            $fieldUsername = "<b>Username: </b>Must be Filled out! ";
        if (empty($rgEmail))
            $fieldEmail = "<b>Email: </b>Must be Filled out! ";
        if (empty($rgPassword))
            $fieldRgPassword = "<b>Password: </b>Must be Filled out! ";
        if (empty($verify))
            $fieldVerify = "<b>Verify: </b>Must be Filled out! ";

    } else {
        $class_alert = "alert-success";
        $show_msg = "Done, Succeed";
        /*$data = array(
            "First Name: "  => $firstName,
            "Last Name: "   => $lastName,
            "Email: "       => $email,
            "Gender: "      => $gender,
            "Country: "     => $country,
            "Subject: "     => $subj,
            "Message: "     => $msg
        );

        echo print_r($data);

        $mail =  new PHPMailer();*/

        /*try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'zartovmaroteov@gmail.com';
            $mail->Password = 'under087';

            $mail->setFrom('from@gfg.com', 'Name');
            $mail->addAddress($email, $lastName);

            $mail->isHTML(true);
            $mail->Subject = "Sent successfully";
            $mail->Body    = $msg;
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
            $email_gone = "Your Mail has been sent successfully, We will reply as soon as possible";
        } catch (Exception $e)
        {
            $email_isnot_gone =   "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       }*/
    }
}

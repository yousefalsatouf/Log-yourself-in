<?php

//require 'vendor/autoload.php';
include_once '../view/login.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$usrEmail   = isset($_POST['usr-email']) ? $_POST['usr-email'] : "";
$lgPassword = isset($_POST['lg-password']) ? $_POST['lg-password'] : "";



if (!empty($_POST)) {
    if (empty($usrEmail) || empty($lgPassword))
    {
        $class_alert = "alert-danger";
        $show_msg = "Sorry, Missing Information";

        if (empty($usrEmail))
            $fieldUsrEmail = "<b>Username Or Email: </b>Must be Filled out! ";
        if (empty($lgPassword))
            $fieldPassword = "<b>Password: </b>Must be Filled out! ";

    } else {
        $class_alert = "alert-success";
        $show_msg = "Done, !";
    }
}

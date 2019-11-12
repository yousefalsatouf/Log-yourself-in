<?php

//require 'vendor/autoload.php';
include_once '../view/login.php';
include_once  'UserManagement.php';

$usrEmail   = isset($_POST['usr-email']) ? $_POST['usr-email'] : "";
$lgPassword = isset($_POST['lg-password']) ? $_POST['lg-password'] : "";



if (!empty($_POST)) {
    if (empty($usrEmail) || empty($lgPassword))
    {
        if (empty($usrEmail))
            $fieldUsrEmail = "<b>Username Or Email: </b>Must be Filled out! ";
        if (empty($lgPassword))
            $fieldPassword = "<b>Password: </b>Must be Filled out! ";

        $class_alert = "alert-danger";
        $show_msg = "Sorry, Missing Information";
        $page_direction = "login.php";
    }
    else
    {

    }
}

//$user = new User();
//echo $user->getUsername();

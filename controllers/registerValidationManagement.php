<?php

//require 'vendor/autoload.php';
include_once '../view/register.php';

use App\ModelUser\User;

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

    }
    else {
        $now = new \Date();
        $user = new User();

        $user->setUsername($username);
        $user->setEmail($rgEmail);
        $user->setPassword($rgPassword);
        $user->setCreated($now);

        $getUsername = $user->getUsername();

        echo $getUsername;
    }
}

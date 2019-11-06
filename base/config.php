<?php

class ConnectionDB
{
    public static function connection()
    {
        $dbhost = "localhost";
        $dbName = "log-yourself-in";
        $dbuser = "root";
        $dbpass = "";
        $port = 3306;

        try
        {
            $pdo = new PDO("mysql:host=$dbhost:$port;dbname=$dbName", $dbuser, $dbpass);
            echo "<h1 style='color: #080;'>Connection Succeed!</h1>";
            return $pdo;
        }
        catch (Exception $ex)
        {
            echo "<h1 style='color: red'>Error failed !</h1>";
            return false;
        }
    }
}

$connect = new ConnectionDB();







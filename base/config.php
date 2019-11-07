<?php

class ConnectionDB
{
    public static function connection()
    {
        $dbhost = "remotemysql.com";
        $dbName = "pMPjp8OBbe";
        $dbuser = "pMPjp8OBbe";
        $dbpass = "dRhQmvAuu2";
        $port = 3306;

        try
        {
            $pdo = new PDO("mysql:host=$dbhost:$port;dbname=$dbName", $dbuser, $dbpass);
            echo "<h1 style='color: #080;'>Connection to database Succeed!</h1>";
            return $pdo;
        }
        catch (Exception $ex)
        {
            echo "<h1 style='color: red'>Failed, Error while connection !</h1>";
            return false;
        }
    }
}









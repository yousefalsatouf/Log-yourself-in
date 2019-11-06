<?php

function connectionDB()
{
    $dbhost = "remotemysql.com";
    $dbName = "pMPjp8OBbe";
    $dbuser = "pMPjp8OBbe";
    $dbpass = "hTShDF49dV";

    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbName", $dbuser, $dbpass);

    return $pdo;
}

try {
    $is_connect = connectionDB();
    echo "Connection Successed !";
} catch (Exception $e) {
    echo "Connection Failed !" . $e->getMessage();
    die();
}

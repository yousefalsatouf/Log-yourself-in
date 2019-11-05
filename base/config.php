<?php

function connectionDB()
{
    // Try to figure out what these should be for you
    $dbhost = "remotemysql.com";
    $dbName = "pMPjp8OBbe";
    $dbuser = "pMPjp8OBbe";
    $dbpass = "hTShDF49dV";

    // Try to understand what happens here
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbName", $dbuser, $dbpass);

    // Why we do this here
    return $pdo;
}

try {
    $is_connect = connectionDB();
    echo "Connection Successed !";
} catch (Exception $e) {
    echo "Connection Failed !" . $e->getMessage();
    die();
}

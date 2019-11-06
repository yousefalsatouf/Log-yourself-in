<?php

include ('../base/config.php');

Class User
{
    private $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection=$connection;
    }

}

$connect = new User($connect->connection());
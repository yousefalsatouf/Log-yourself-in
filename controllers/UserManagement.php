<?php

include '../base/config.php';
include '../model/User.php';

class UserManagement
{
    private $connection = null;

    public function setConnection($connection)
    {
        $this->connection=$connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getUser(int $id)
    {
        $sql = "SELECT username, password, email, first_name, last_name, linkedin, github
                FROM student
                WHERE id=$id";

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $showUser = $stmt->execute();

        if ($showUser)
            echo "<h3 style='background-color: green;'>List, Ok !</h3>";
        else
            echo "<h3 style='background-color: red;'>List, Not Ok !</h3>";

        while ($data=$stmt->fetch())
        {
            echo $data->getUsername();
        }
    }

}


$connect = new ConnectionDB();
$manager = new UserManagement();
$manager->setConnection($connect->connection());
$manager->getUser(1);





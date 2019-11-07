<?php

include '../base/config.php';
include '../model/User.php';

class UserManagement
{
    private $connection = null;

    public function __construct(PDO $connection)
    {
        $this->connection=$connection;
    }

    public function setConnection($connection)
    {
        $this->connection=$connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getAlluser()
    {
        $sql = "SELECT * FROM student";

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $showAll = $stmt->execute();

        if ($showAll)
            echo "<h3 style='background-color: green;'>List, Done</h3>";
        else
            echo "<h3 style='background-color: red;'>List, Failed</h3>";

        while ($data=$stmt->fetch())
        {
            echo $data->getId().") ";
            echo $data->getUsername()." | ";
            echo $data->getPassword()." | ";
            echo $data->getEmail()." | ";
            echo $data->getFirstName()." | ";
            echo $data->getLastName()." | ";
            echo $data->getLinkedIn()." | ";
            echo $data->getGithub()." | ";
        }
    }

}
$connect = new ConnectionDB();
$manager = new UserManagement($connect->connection());
$manager->getConnection($connect->connection());
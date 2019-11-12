<?php

namespace App\controllerUser;

include_once '../base/config.php';
include_once '../model/User.php';
include_once 'loginValidationManagement.php';

use App\ModelUser\User ;
use App\BaseUser\ConnectionDB;
use Cassandra\Date;

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
        $sql = "SELECT username, password, email, first_name, last_name, linkedin, github, created
                FROM student
                WHERE id=".$id;

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'User');
        $showUser = $stmt->execute();

        if ($showUser)
            echo "<h3 style='background-color: green;'>List, Ok !</h3>";
        else
            echo "<h3 style='background-color: red;'>List, Not Ok !</h3>";

        //$data = $stmt->fetch();

        while ($data = $stmt->fetch())
        {
            echo $data->getUsername();
        }

        //return $data;
    }

    public function insertUser(User $user)
    {

        $sql = "INSERT INTO `student`(id, `username`, `email`, `password`, `created`)
                          VALUES
                                      (2, :username, :email, :password, :now) ";

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':now', $user->getCreated());

        $insert = $stmt->execute();

        if ($insert)
            echo "<h3 style='background-color: green;'>Insert, Done</h3>";
        else {
            echo "<h3 style='background-color: #ff0000;'>Insert, Failed</h3>";
            //print_r($this->getConnection()->errorInfo());
        }
    }

    public function updateUser(User $user)
    {
        $sql =  "UPDATE `student` SET 
                `username`=:username,`email`=:email,`password`=:password,`first_name`=:firstName, `last_name`=:lastName,`linkedin`=:linkedin,`github`=:github,`created`=now, 
                 WHERE id=:id";

        $stmt = $this->getConnection()->prepare($sql);
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':firstName', $user->getFirstName());
        $stmt->bindValue(':lastName', $user->getLastName());
        $stmt->bindValue(':linkedin', $user->getLinkedIn());
        $stmt->bindValue(':github', $user->getGithub());
        $stmt->bindValue(':now', $user->getCreated());

        $update = $stmt->execute();
        if ($update)
            echo "<h3 style='background-color: green;'>Update, Done</h3>";
        else {
            echo "<h3 style='background-color: #ff0000;'>Update, Failed</h3>";
            //print_r($this->getConnection()->errorInfo());
        }
    }

    public function deleteUser(User $user)
    {
        $sql    = "DELETE FROM `student` WHERE id=".$user->getId();

        $delete = $this->getConnection()->exec($sql);
        if ($delete)
            echo "<h3 style='background-color: green;'>Delete, Done</h3>";
        else {
            echo "<h3 style='background-color: #ff0000;'>Delete, Failed</h3>";
            //print_r($this->getConnection()->errorInfo());
        }
    }

}


$connect = new ConnectionDB();
$manager = new UserManagement();
$manager->setConnection($connect->connection());
$manager->getUser(1);
//$manager->insertUser(new User());
//$manager->updateUser(new User());
//$manager->deleteUser(new User());










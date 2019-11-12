<?php

namespace App\ModelUser;

Class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $firstName;
    private $lastName;
    private $linkedIn;
    private $github;
    private $created;

    public function setId($id)
    {
        if (isset($id))
            $this->id=$id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        if (isset($username))
            $this->username=$username;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setPassword($pass)
    {
        if (isset($pass))
            $this->password=$pass;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setEmail($email)
    {
        if (isset($email))
            $this->email=$email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setFirstName($fName)
    {
        if (isset($fName))
            $this->firstName=$fName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setLastName($lName)
    {
        if (isset($lName))
            $this->lastName=$lName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLinkedIn($linkedin)
    {
        if (isset($linkedin))
            $this->linkedIn=$linkedin;
    }

    public function getLinkedIn()
    {
        return $this->linkedIn;
    }
    public function setGithub($github)
    {
        if (isset($github))
            $this->github=$github;
    }

    public function getGithub()
    {

        return $this->github;
    }

    public function setCreated($created)
    {
        if (isset($created))
            $this->created=$created;
    }

    public function getCreated()
    {

        return $this->created;
    }

}

new User();
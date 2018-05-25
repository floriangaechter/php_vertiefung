<?php

class User {
    private $name;
    private $email;
    private $passsword;

    public function __construct($username = false)
    {
        if ($username) {
            $statement = DB::get()->prepare('
              SELECT
                *
              FROM
                user
              WHERE
                username = :username');

            $statement->execute([':username' => $username]);
            $user = $statement->fetch();

            $this->setName($user['username']);
            $this->setEmail($user['email']);
            $this->setPasssword($user['password']);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPasssword()
    {
        return $this->passsword;
    }

    public function setPasssword($passsword)
    {
        $this->passsword = $passsword;
    }
}
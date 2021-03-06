<?php

class User
{
    private $id;
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

            $this->setId($user['id']);
            $this->setName($user['username']);
            $this->setEmail($user['email']);
            $this->setPasssword($user['password']);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function create()
    {
        $statement = DB::get()->prepare("
          INSERT INTO user 
            (username, 
             password, 
             email) 
          VALUES
            (:username, 
             :password, 
             :email)"
        );
        $statement->execute([
            ':username' => $this->getName(),
            ':password' => $this->getPasssword(),
            ':email'    => $this->getEmail()]
        );
    }

    public function getTasks()
    {
        $statement = DB::get()->prepare('
              SELECT
                id
              FROM
                task
              WHERE
                user_id = :id');

        $statement->execute([':id' => $this->getId()]);

        $tasks = [];

        foreach($statement->fetchAll() as $task) {
            $tasks[] = new Task($task['id']);
        }

        return $tasks;
    }
}
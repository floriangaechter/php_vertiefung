<?php

class Task
{
    private $id;
    private $user;
    private $name;
    private $description;
    private $state;
    private $due;

    public function __construct($id = false)
    {
        if ($id){
            $statement = DB::get()->prepare('
              SELECT
                *
              FROM
                task
              WHERE
                id = :id');

            $statement->execute([':id' => $id]);
            $task = $statement->fetch();

            $this->setId($task['id']);
            $this->setUser($task['user_id']);
            $this->setName($task['name']);
            $this->setDescription($task['description']);
            $this->setState($task['state_id']);
            $this->setDue(\Carbon\Carbon::parse($task['due']));
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getDue()
    {
        return $this->due;
    }

    public function setDue($due)
    {
        $this->due = $due;
    }

    public function update()
    {
        $statement = DB::get()->prepare('
            UPDATE
                task
            SET
                name = :name,
                description = :description,
                state_id = :state,
                due = :due
            WHERE
                id = :id
        ');

        $statement->execute([
            ':id' => $this->getId(),
            ':name' => $this->getName(),
            ':description' => $this->getDescription(),
            ':state' => $this->getState(),
            ':due' => $this->getDue(),
        ]);
    }

    public function create()
    {
        $statement = DB::get()->prepare('
            INSERT INTO task (
                user_id,
                name,
                description,
                state_id,
                due
            ) VALUES (
                :user_id,
                :name,
                :description,
                :state
                :due
            )
        ');

        $statement->execute([
            ':user_id' => $this->getUser(),
            ':name' => $this->getName(),
            ':description' => $this->getDescription(),
            ':state' => $this->getState(),
            ':due' => $this->getDue(),
        ]);

        // $task = new Task();
        // $task->setName('Mein neuer Task');
        // $task->create();
    }
}
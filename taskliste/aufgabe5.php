<?php

class Task
{
    private $title;

    public function __construct($task_title)
    {
        $this->title = $task_title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function erledigen()
    {
        return "Task '$this->title' erledigt";
    }
}

$task = new Task('Pause machen');

echo $task->erledigen();

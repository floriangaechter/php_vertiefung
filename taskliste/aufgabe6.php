<?php

use Carbon\Carbon;

require 'vendor/autoload.php';

class User
{
    private $name;
    private $created;


    public function __construct()
    {
        $this->created = Carbon::now();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getInformation()
    {
        return "Der Benutzer $this->name wurde dann erstellt: " . $this->created->format('d.m.Y H:i:s');
    }
}

$user = new User();
$user->setName('Rolf');
echo $user->getInformation();
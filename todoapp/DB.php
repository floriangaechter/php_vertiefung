<?php

class DB
{
    private static $PDO;

    public static function get()
    {
        return DB::$PDO ?: DB::$PDO = new PDO('mysql:host=localhost;dbname=todo_app;charset=utf8mb4', 'root', 'root');
    }
}
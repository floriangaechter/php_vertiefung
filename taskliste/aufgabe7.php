<?php

require_once 'DB.php';

$statement = DB::get()->query('SELECT * FROM task');
$all       = $statement->fetchAll();

foreach ($all as $row) {
    var_dump($row);
}

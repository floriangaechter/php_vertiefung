<?php

use Carbon\Carbon;

require 'vendor/autoload.php';

require 'tasks.php';

session_start();

if (isset($_GET['username'])) {
    $_SESSION['username'] = $_GET['username'];
}


function print_task($task)
{
    echo "$task[name]: $task[description] ($task[state_id] - $task[due])<br>";
    Carbon::setLocale($task['locale']);
    echo Carbon::parse($task['created'])->diffForHumans() . '<br>';
}

function getTimestamp($date, $format = 'Y-m-d H:i:s')
{
    return time() >= DateTime::createFromFormat($format, $date)->getTimestamp();
}

if (isset($_SESSION['username'])) {
    foreach ($tasks as $task) {
        if (getTimestamp($task['due']) && $task['state_id'] !== 'done') {
            print_task($task);
        }
    }
} else {
    echo 'Es ist niemand eingelogged';
}

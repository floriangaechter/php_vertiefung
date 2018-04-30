<?php

require 'tasks.php';

 foreach($tasks as $task) {
    echo $task['name'] . ': ' . $task['description'] .  '<br>';
}
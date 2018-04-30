<?php

use Carbon\Carbon;

require 'vendor/autoload.php';

$indexierterArray = ['eins', 'zwei', 'drei', 'vier'];

rsort($indexierterArray);

var_dump($indexierterArray);

$assoziativerArray = [
    'd' => 'Zitrone',
    'a' => 'Orange',
    'b' => 'Banane',
    'c' => 'Apfel',
];

ksort($assoziativerArray);

var_dump($assoziativerArray);

arsort($assoziativerArray);

var_dump($assoziativerArray);

require 'tasks.php';

function sortDue($a, $b)
{
    return Carbon::parse($a['due'])->gt(Carbon::parse($b['due'])) ? -1 : 1;
}

function sortDone($a, $b)
{
    return $a['state_id'] === 'open' ? -1 : 1;
}

usort($tasks, 'sortDue');

var_dump($tasks);
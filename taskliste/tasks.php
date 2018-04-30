<?php

use Carbon\Carbon;

require 'vendor/autoload.php';

$tasks = [
    [
        'id'          => 1,
        'user_id'     => 'Rolf',
        'name'        => 'Pflanzen giessen',
        'description' => 'In allen Zimmern die Pflanzen giessen',
        'state_id'    => 'open',
        'due'         => '2018-04-30 12:00:00',
        'created'     => '2018-04-27 19:07:03',
        'locale'      => 'de',
    ], [
        'id'          => 2,
        'user_id'     => 'Iris',
        'name'        => 'Katze füttern',
        'description' => 'Trockenfutter verwenden',
        'state_id'    => 'open',
        'due'         => '2018-01-01 18:00:00',
        'created'     => '2018-04-25 12:27:18',
        'locale'      => 'de',
    ], [
        'id'          => 3,
        'user_id'     => 'Flo',
        'name'        => 'Einkaufen',
        'description' => 'Einkaufsliste am Kühlschrank',
        'state_id'    => 'open',
        'due'         => '2018-04-30 17:30:00',
        'created'     => '2018-04-27 08:45:07',
        'locale'      => 'de',
    ], [
        'id'          => 4,
        'user_id'     => 'Flo',
        'name'        => 'WebPro Unterricht vorbereiten',
        'description' => 'Selber PHP nochmals repetieren',
        'state_id'    => 'in_progress',
        'due'         => '2018-04-27 18:15:00',
        'created'     => '2018-04-27 01:35:57',
        'locale'      => 'de',
    ], [
        'id'          => 5,
        'user_id'     => 'Veith',
        'name'        => 'Auto tanken',
        'description' => 'DIESEL!!!',
        'state_id'    => 'done',
        'due'         => '2018-04-12 10:12:12',
        'created'     => '2018-04-12 07:38:41',
        'locale'      => 'de',
    ],
];
<?php

require_once 'DB.php';

$id = 1;

$query = "
    UPDATE
        user
    SET
      username = 'webpro'
    WHERE
      id = " . $id;

$num = DB::get()->exec($query);

if ($num > 0) {
    echo "Erfolgreich Benutzer mit id = $id geändert.";
} else {
    echo "Benutzer nicht gefunden oder keine Änderung nötig.";
}
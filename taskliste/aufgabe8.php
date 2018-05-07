<?php

require_once 'DB.php';

$query = "
  INSERT INTO user 
    (username, 
     password, 
     firstname, 
     lastname, 
     email) 
  VALUES
    ('flo', 
     '" . password_hash('meinPasswort123', PASSWORD_DEFAULT) . "', 
     'Florian', 
     'Gächter', 
     'flo@frontify.com')";

$num = DB::get()->exec($query);

echo "Erfolgreich $num Benutzer erstellt mit id = " . DB::get()->lastInsertId();
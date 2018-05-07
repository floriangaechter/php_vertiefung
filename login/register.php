<?php

require_once 'DB.php';

$statement = DB::get()->prepare("
  INSERT INTO user 
    (username, 
     password, 
     firstname, 
     lastname, 
     email) 
  VALUES
    (:username, 
     :password, 
     :firstname, 
     :lastname, 
     :email)");

$num = $statement->execute([
    ':username'  => $_POST['username'],
    ':password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ':firstname' => $_POST['firstname'],
    ':lastname'  => $_POST['lastname'],
    ':email'     => $_POST['email'],
]);

if ($num > 0) {
    echo "Erfolgreich $num Benutzer erstellt mit id = " . DB::get()->lastInsertId();
} else {
    echo "Benutzer mit username \"$_POST[username]\" existiert bereits.";
}
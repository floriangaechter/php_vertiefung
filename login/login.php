<?php

require_once 'DB.php';

$statement = DB::get()->prepare("
    SELECT
      *
    FROM
      user
    WHERE
      username = :username
");

$statement->execute([
    ':username' => $_POST['username'],
]);

$data = $statement->fetch(PDO::FETCH_ASSOC);

if (password_verify($_POST['password'], $data['password'])) {
    header('Location: /login/tasklist.php', true, 301);
    die();
} else {
    header('Location: /login/login.html', true, 301);
    die();
}
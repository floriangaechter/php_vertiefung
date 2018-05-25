<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

$error = false;

if (isset($_SESSION['user'])) {
    header('Location: /todoapp/tasklist.php');
    die();
}

if ($_POST['username'] && $_POST['email'] && $_POST['password']) {
    $statement = DB::get()->prepare('
      SELECT
        *
      FROM
        user
      WHERE
        username = :username');

    $statement->execute([':username' => $_POST['username']]);
    $user = $statement->fetch();

    if ($user) {
        $error = 'Benutzer existiert bereits';
    } else {
        $statement = DB::get()->prepare("
          INSERT INTO user 
            (username, 
             password, 
             email) 
          VALUES
            (:username, 
             :password, 
             :email)"
        );
        $statement->execute([':username' => $_POST['username'], ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT), ':email' => $_POST['email']]);

        $statement = DB::get()->prepare('
          SELECT
            *
          FROM
            user
          WHERE
            username = :username');

        $statement->execute([':username' => $_POST['username']]);
        $user = $statement->fetch();

        $_SESSION['user'] = $user;
        header('Location: /todoapp/tasklist.php');
        die();
    }
}

?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrierung</title>
</head>
<body>
<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Registrieren</button>
    <?php
    if ($error) {
        echo $error;
    }
    ?>
</form>
</body>
</html>

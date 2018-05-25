<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

if ($_POST['logout']) {
    unset($_SESSION['user']);
}

$user = false;

if (isset($_SESSION['user'])) {
    $user = new User($_SESSION['user']);
} else {
    header('Location: /todoapp/login.php');
    die();
}

?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taskliste</title>
</head>
<body>
<form method="post">
    Hallo <?php echo $user->getName(); ?>.
    <button type="submit" name="logout" value="true">Logout</button>
</form>
</body>
</html>


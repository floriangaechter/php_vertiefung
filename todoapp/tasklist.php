<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
}

if (isset($_POST['setDone'])) {
    $task = new Task($_POST['setDone']);
    $task->setState('done');
    $task->update();
}

if (isset($_POST['setOpen'])) {
    $task = new Task($_POST['setOpen']);
    $task->setState('open');
    $task->update();
}

$user = false;

if (isset($_SESSION['user'])) {
    $user = new User($_SESSION['user']);
} else {
    header('Location: login.php');
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
    <ul>
    <?php
    foreach ($user->getTasks() as $task) {
        if ($task->getState() === 'open') {
            echo '<li>' . $task->getName() . ' (' . $task->getDue()->format('d.m.Y')  . ') <button type="submit" name="setDone" value="' . $task->getId() . '">Erledigt</button></li>';
        } else {
            echo '<li style="text-decoration: line-through">' . $task->getName() . ' (' . $task->getDue()->format('d.m.Y')  . ') <button type="submit" name="setOpen" value="' . $task->getId() . '">Unerledigen</button></li>';
        }
    }
    ?>
    </ul>
</form>
</body>
</html>


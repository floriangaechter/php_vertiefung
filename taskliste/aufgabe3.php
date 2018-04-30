<?php

session_start();

if (isset($_GET['username'])) {
    $_SESSION['username'] = $_GET['username'];
}

if (isset($_SESSION['username'])) {
    echo "Hallo $_SESSION[username]";
} else {
    echo 'Es ist niemand eingelogged';
}
<?php
    $host = 'localhost';
    $login = 'root';
    $passwd = '';
    $db = 'forum';

    $connect = mysqli_connect($host, $login, $passwd, $db);

    if(!$connect) {
        echo "ERROR";
    }
?>
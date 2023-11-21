<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'services';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
$login = $_POST['login'];
$query = "SELECT `login` FROM `users` WHERE `login` = '$login'";
$result = mysqli_query($connection, $query);
if ($result) {
    $login = mysqli_fetch_assoc($result)['login'];
    if ($login) {
        echo "FOUND";
    }
    else {
        echo "NOT FOUND";
    }
}
mysqli_close($connection);
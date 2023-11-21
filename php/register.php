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
$password = $_POST['password'];
$query = "SELECT `login` FROM `users` WHERE `login` = '$login'";
$result = mysqli_query($connection, $query);
if ($result && mysqli_num_rows($result) != 0) {
    echo "Name already exists in database";
} else {
    $query = "INSERT INTO users (login, password, isAdmin) VALUES ('$login', '$password', '0')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $login = mb_convert_encoding($login, 'UTF-8');
        setcookie("login", $login, time() + (3600 * 3), "/");
        echo "Success registration";
    } else {
        echo "Unknown error occured";
    }
}
mysqli_close($connection);
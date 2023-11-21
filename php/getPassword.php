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
$query = "SELECT `password` FROM `users` WHERE `login` = '$login'";
$result = mysqli_query($connection, $query);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['password'];
    }
}
mysqli_close($connection);
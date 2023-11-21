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
$query = "UPDATE `users` SET `password` = '$password' WHERE `login` = '$login'";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "success";
} else {
    echo "Unknown error occured. Error: " + $result;
}
mysqli_close($connection);

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
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$query = "UPDATE `users` SET `name` = '$name', `password` = '$password', `phone` = '$phone', `address` = '$address' WHERE `login` = '$login'";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "Success update";
} else {
    echo "Unknown error occured. Error: " + $result;
}
mysqli_close($connection);

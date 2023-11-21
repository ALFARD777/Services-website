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
$query = "SELECT `uuid` FROM `users` WHERE `login` = '$login'";
$result = mysqli_query($connection, $query);
if ($result) {
    $user = mysqli_fetch_assoc($result);
    $id = $user['uuid'];
    $query = "UPDATE `orders` SET `status` = 2 WHERE `user_id` = '$id' AND `status` = 1";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "success";
    }
    else {
        echo $result;
    }
}
mysqli_close($connection);
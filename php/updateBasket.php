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
    $uuid = $user['uuid'];
    $query = "SELECT * FROM `orders` WHERE `user_id` = '$uuid' AND `status` = 1";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $userBaskets = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $userBaskets[] = $row;
        }
        echo json_encode($userBaskets);
    }
    else {
        echo $result;
    }
}
mysqli_close($connection);
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
$user_id = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `uuid` FROM `users` WHERE `login` = '$login'"))['uuid'];
$query = "SELECT `user_login`, `product_name`, `quantity`, `price`, `updated_at` FROM `orders` WHERE `user_id` = '$user_id'";
$result = mysqli_query($connection, $query);
if ($result) {
    $data = array();
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
}
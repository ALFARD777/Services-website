<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'services';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
$query = "SELECT * FROM `orders` WHERE `status` = 2";
$result = mysqli_query($connection, $query);
if ($result) {
    $orders = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
    echo json_encode($orders);
}
mysqli_close($connection);

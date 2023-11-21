<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'services';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productName = $_POST["productName"];
    $uuid = $_POST["id"];
    $query = "UPDATE `orders` SET `status` = 0 WHERE `product_name` = '$productName' AND `status` = 1 AND user_id = '$uuid' LIMIT 1";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "success";
    } else {
        echo $result;
    }
}
mysqli_close($connection);

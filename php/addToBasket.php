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
    $positionName = $_POST["positionName"];
    $price = $_POST["price"];
    if (isset($_COOKIE['login'])) {
        $login = $_COOKIE['login'];
        $query = "SELECT `uuid` FROM `users` WHERE `login` = '$login'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $userid = $row['uuid'];
                $query = "INSERT INTO orders (user_id, user_login, product_name, quantity, price, status) VALUES ('$userid', '$login', '$positionName', 1, '$price', 1)";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    echo "success";
                }
                else {
                    echo $result;
                }
            }
        }
    }
}
mysqli_close($connection);

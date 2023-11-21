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
    $login = $_POST["login"];
    $query = "SELECT * FROM `users` WHERE `login` = '$login'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $uuid = $row['uuid'];
            $login = $row['login'];
            $name = $row['name'];
            $phone = $row['phone'];
            $address = $row['address'];
            $isAdmin = $row['isAdmin'];
            echo json_encode(array(
                'uuid' => $uuid,
                'login' => $login,  
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'isAdmin' => $isAdmin
            ));
        }
    }
}
mysqli_close($connection);

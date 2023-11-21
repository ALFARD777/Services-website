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
$query = "SELECT `login` FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
$result = mysqli_query($connection, $query);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $login = $row['login'];
        setcookie("login", $login, time() + (3600 * 3), "/");
        echo "Success authorization";
    } else {
        echo "Incorrect password";
    }
} else {
    echo "Unknown error occured";
}
mysqli_close($connection);
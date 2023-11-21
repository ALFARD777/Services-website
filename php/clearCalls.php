<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'services';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
$query = "DELETE FROM `calls`";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "success";
} else {
    echo "Unknown error occured: " + $result;
}
mysqli_close($connection);
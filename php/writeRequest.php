<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'services';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$comments = $_POST['comments'];
$query = "INSERT INTO calls (name, address, phone, comments) VALUES ('$name', '$address', '$phone', '$comments')";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "success";
} else {
    echo "Unknown error occured: " + $result;
}
mysqli_close($connection);

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'services';
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
$query = "SELECT * FROM calls";
$result = mysqli_query($connection, $query);
if ($result) {
    $calls = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $calls[] = $row;
    }
    echo json_encode($calls);
} else {
    echo "Unknown error occured: " + $result;
}
mysqli_close($connection);

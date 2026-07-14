<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "meeting_room_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
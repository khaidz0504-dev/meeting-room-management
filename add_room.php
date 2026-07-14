<?php
include "config/database.php";

if (isset($_POST['room_name'])) {

    $room_name = $_POST['room_name'];
    $capacity = $_POST['capacity'];
    $equipment = $_POST['equipment'];
    $status = $_POST['status'];

    $sql = "INSERT INTO rooms (room_name, capacity, equipment, status)
            VALUES ('$room_name', '$capacity', '$equipment', '$status')";

    if (mysqli_query($conn, $sql)) {

        header("Location: dashboard.php");
        exit();

    } else {

        die("Lỗi SQL: " . mysqli_error($conn));

    }
}
?>
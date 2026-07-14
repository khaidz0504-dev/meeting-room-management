<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include "config/database.php";

$result = mysqli_query($conn,
"SELECT * FROM rooms WHERE status='Hoạt động'");
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Phòng trống</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:Arial;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:230px;
    height:100%;
    background:#0d6efd;
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:25px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 20px;
}

.sidebar a:hover{
    background:rgba(255,255,255,.15);
}

.main{
    margin-left:230px;
}

.topbar{
    background:white;
    padding:20px 30px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.card{
    margin:30px;
    border:none;
    border-radius:15px;
    box-shadow:0 3px 15px rgba(0,0,0,.08);
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Meeting Room</h3>

<a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>

<a href="dashboard.php"><i class="bi bi-building"></i> Quản lý phòng</a>

<a href="history.php"><i class="bi bi-clock-history"></i> Lịch sử sử dụng</a>

<a href="available_rooms.php"><i class="bi bi-check2-square"></i> Phòng trống</a>

<a href="logout.php"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>

</div>

<div class="main">

<div class="topbar">

<h3>Danh sách phòng trống</h3>

</div>

<div class="card">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>STT</th>

<th>Tên phòng</th>

<th>Sức chứa</th>

<th>Thiết bị</th>

<th>Trạng thái</th>

</tr>

</thead>

<tbody>

<?php

$stt=1;

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?= $stt++ ?></td>

<td><?= $row['room_name'] ?></td>

<td><?= $row['capacity'] ?></td>

<td><?= $row['equipment'] ?></td>

<td>

<span class="badge bg-success">

Hoạt động

</span>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>
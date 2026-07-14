<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include "config/database.php";

$result = mysqli_query($conn, "SELECT * FROM booking_history ORDER BY meeting_date DESC, start_time DESC");
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Lịch sử sử dụng</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:Arial, Helvetica, sans-serif;
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
    padding:25px 0;
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

.card-box{
    margin:30px;
    background:white;
    border-radius:15px;
    padding:25px;
    box-shadow:0 3px 15px rgba(0,0,0,.08);
}

table{
    margin-top:20px;
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

<h3>Lịch sử sử dụng phòng</h3>

</div>

<div class="card-box">

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>STT</th>

<th>Tên phòng</th>

<th>Người đặt</th>

<th>Ngày họp</th>

<th>Bắt đầu</th>

<th>Kết thúc</th>

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

<td><?= $row['user_name'] ?></td>

<td><?= $row['meeting_date'] ?></td>

<td><?= $row['start_time'] ?></td>

<td><?= $row['end_time'] ?></td>

<td>

<?php

if($row['status']=="Đã hoàn thành"){

?>

<span class="badge bg-success">

Đã hoàn thành

</span>

<?php

}elseif($row['status']=="Đang họp"){

?>

<span class="badge bg-primary">

Đang họp

</span>

<?php

}else{

?>

<span class="badge bg-danger">

Đã hủy

</span>

<?php

}

?>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>

</html>
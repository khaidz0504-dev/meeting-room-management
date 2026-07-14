<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include "config/database.php";

$totalRooms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM rooms"))['total'];

$activeRooms = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM rooms WHERE status='Hoạt động'"))['total'];


$maintenanceRooms = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM rooms WHERE status='Bảo trì'"))['total'];
$result = mysqli_query($conn, "SELECT * FROM rooms");
?>
<!DOCTYPE html>
<html lang="vi">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Meeting Room Management</title>

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
    width:250px;
    height:100vh;
    background:#0d6efd;
}

.sidebar h3{
    color:white;
    text-align:center;
    padding:20px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 20px;
    transition:.3s;
}

.sidebar a:hover{
    background:#0b5ed7;
}

.main{
    margin-left:250px;
}

.topbar{
    background:white;
    height:70px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.content{
    padding:30px;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.card i{
    font-size:35px;
}

</style>

</head>

<body>

<div class="sidebar">

<h3>Meeting Room</h3>

<a href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>

<a href="dashboard.php">
    <i class="bi bi-building"></i> Quản lý phòng
</a>

<a href="history.php">
    <i class="bi bi-clock-history"></i> Lịch sử sử dụng
</a>

<a href="available_rooms.php">
    <i class="bi bi-calendar-check"></i> Phòng trống
</a>
<a href="logout.php">
    <i class="bi bi-box-arrow-right"></i> Đăng xuất
</a>

</div>

<div class="main">

<div class="topbar">

<h4 class="mb-0">

Dashboard

</h4>

<div>

Xin chào,

<b>Admin</b>

</div>

</div>

<div class="content">
<div class="row g-4">

<div class="col-md-3">

<div class="card">

<div class="card-body">

<div class="d-flex justify-content-between">

<div>

<h2><?= $totalRooms ?></h2>

<p class="text-secondary mb-0">Tổng phòng</p>

</div>

<i class="bi bi-building text-primary"></i>

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<div class="d-flex justify-content-between">

<div>

<h2><?= $activeRooms ?></h2>

<p class="text-secondary mb-0">Hoạt động</p>

</div>

<i class="bi bi-check-circle-fill text-success"></i>

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<div class="d-flex justify-content-between">

<div>

<h2><?= $maintenanceRooms ?></h2>

<p class="text-secondary mb-0">Bảo trì</p>

</div>

<i class="bi bi-tools text-warning"></i>

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<div class="d-flex justify-content-between">

<div>

<h2>85</h2>

<p class="text-secondary mb-0">Lượt sử dụng</p>

</div>

<i class="bi bi-bar-chart-fill text-danger"></i>

</div>

</div>

</div>

</div>

</div>

<br><br>
<div class="card">

<div class="card-header d-flex justify-content-between align-items-center">

<h5 class="mb-0">Danh sách phòng họp</h5>

<button class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#addRoomModal">

<i class="bi bi-plus-circle"></i>

Thêm phòng

</button>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>STT</th>

<th>Tên phòng</th>

<th>Sức chứa</th>

<th>Thiết bị</th>

<th>Trạng thái</th>

<th>Thao tác</th>

</tr>

</thead>

<tbody>

<?php
$stt = 1;

while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?= $stt++ ?></td>

<td><?= $row['room_name'] ?></td>

<td><?= $row['capacity'] ?></td>

<td><?= $row['equipment'] ?></td>

<td>

<?php if($row['status']=="Hoạt động"){ ?>

<span class="badge bg-success">
Hoạt động
</span>

<?php }else{ ?>

<span class="badge bg-warning text-dark">
Bảo trì
</span>

<?php } ?>

</td>

<td>

<a href="delete_room.php?id=<?= $row['id'] ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Bạn có chắc muốn xóa phòng này?')">

    <i class="bi bi-trash"></i>

</a>
<a href="edit_room.php?id=<?= $row['id'] ?>"
   class="btn btn-warning btn-sm">

    <i class="bi bi-pencil"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

<!-- Modal Thêm phòng -->
<div class="modal fade" id="addRoomModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="add_room.php" method="POST">

                <div class="modal-header">
                    <h5 class="modal-title">Thêm phòng họp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Tên phòng</label>
                        <input type="text" name="room_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Sức chứa</label>
                        <input type="number" name="capacity" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Thiết bị</label>
                        <input type="text" name="equipment" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Trạng thái</label>

                        <select name="status" class="form-select">

                           <option value="Hoạt động">Hoạt động</option>

                           <option value="Bảo trì">Bảo trì</option>

                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-primary">
                        Thêm phòng
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
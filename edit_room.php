<?php
include "config/database.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM rooms WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $room_name = $_POST['room_name'];
    $capacity = $_POST['capacity'];
    $equipment = $_POST['equipment'];
    $status = $_POST['status'];

    mysqli_query($conn,"UPDATE rooms
        SET room_name='$room_name',
            capacity='$capacity',
            equipment='$equipment',
            status='$status'
        WHERE id=$id");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Sửa phòng</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header">

<h3>Sửa phòng họp</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Tên phòng</label>

<input
type="text"
name="room_name"
class="form-control"
value="<?= $row['room_name']; ?>"
required>

</div>

<div class="mb-3">

<label>Sức chứa</label>

<input
type="number"
name="capacity"
class="form-control"
value="<?= $row['capacity']; ?>"
required>

</div>

<div class="mb-3">

<label>Thiết bị</label>

<input
type="text"
name="equipment"
class="form-control"
value="<?= $row['equipment']; ?>">

</div>

<div class="mb-3">

<label>Trạng thái</label>

<select
name="status"
class="form-select">

<option value="Hoạt động"
<?= $row['status']=="Hoạt động" ? "selected" : "" ?>>

Hoạt động

</option>

<option value="Bảo trì"
<?= $row['status']=="Bảo trì" ? "selected" : "" ?>>

Bảo trì

</option>

</select>

</div>

<button
type="submit"
name="update"
class="btn btn-primary">

Cập nhật

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

Quay lại

</a>

</form>

</div>

</div>

</div>

</body>

</html>
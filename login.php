<?php
session_start();
include "config/database.php";

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    if ($username == "admin" && $password == "123456") {

    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;

    echo "Đăng nhập thành công";
    exit();

}
    exit();
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "123456") {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Sai tài khoản hoặc mật khẩu!";

    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Đăng nhập</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:400px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,.15);
}

</style>

</head>

<body>

<div class="login-box">

<h2 class="text-center mb-4">
Quản lý phòng họp
</h2>

<?php if(isset($error)){ ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php } ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Tên đăng nhập
</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Mật khẩu
</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
type="submit"
name="login"
class="btn btn-primary w-100">

Đăng nhập

</button>

</form>

</div>

</body>

</html>
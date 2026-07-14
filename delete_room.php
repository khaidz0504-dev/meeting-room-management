<?php
include "config/database.php";

if(isset($_GET['id'])){

    $id = intval($_GET['id']);

    mysqli_query($conn, "DELETE FROM rooms WHERE id=$id");

}

header("Location: dashboard.php");
exit();
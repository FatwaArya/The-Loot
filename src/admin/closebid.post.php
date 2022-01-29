<?php
include "../util/conn.php";
$id = $_GET['id'];


$status = $_POST['status'];

$qry_update = "update lelang set status='" . $status . "' where id = '" .  $id . "'";
$update = mysqli_query($conn, $qry_update);

// echo '<pre>';
// var_dump($update);
// echo '</pre>';
header("location: dashboard.php");

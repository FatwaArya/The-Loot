<?php include "../util/conn.php";
include "../util/guard.php";


$user = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$sql = "insert into masyarakat (email, username,password,nama ,tlp) 
        values ('" . $email . "','" . $user . "','" . md5($password) . "','" . $name . "','" . $phone . "')";



$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: ../../login.php');
} else {
    printf('Gagal Menambah' . mysqli_error($conn));
    exit();
}

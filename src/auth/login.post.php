<?php
include "../util/guard.php";

if ($_POST) {

    include "../util/conn.php";
    $username = $_POST['username'];
    $password = $_POST['password'];


    //buat 2 tabel 
    //user table and admin tabel
    // so there is two queries
    $sql_user = mysqli_query($conn, "select * from masyarakat where username = '" . $username . "' and password = '" . md5($password) . "' ");
    $sql_admin = mysqli_query($conn, "select * from admin where username = '" . $username . "' and password = '" . $password . "' ");
    //validate user

    //validate admin


    //right here
    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        if (mysqli_num_rows($sql_admin) > 0) {


            $dt_login = mysqli_fetch_assoc($sql_admin);

            if ($dt_login['level'] === 'admin') {
                session_start();
                $_SESSION['id'] = $dt_login['id'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['name'] = $dt_login['nama'];
                $_SESSION['level'] = $dt_login['level'];
                $_SESSION['status_login'] = true;
                header('location: ../admin/dashboard.php');
            } elseif ($dt_login['level'] === 'staff') {
                session_start();

                $_SESSION['id'] = $dt_login['id'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['name'] = $dt_login['nama'];
                $_SESSION['level'] = $dt_login['level'];
                $_SESSION['status_login'] = true;
                header('location: ../admin/dashboard.php');
            }
        } elseif (mysqli_num_rows($sql_user) > 0) {
            // and here


            $dt_login = mysqli_fetch_assoc($sql_user);
            session_start();
            $_SESSION['id'] = $dt_login['id'];
            $_SESSION['username'] = $dt_login['username'];
            $_SESSION['name'] = $dt_login['nama'];
            $_SESSION['level'] = 'user';
            $_SESSION['status_login'] = true;
            header('location: ../user/dashboard.php');
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}

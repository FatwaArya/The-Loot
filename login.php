<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Loot Login</title>
    <?php include 'partials/tailwind.php' ?>
</head>

<body>
    <!-- <div class="grid grid-cols-2 "> -->
    <div class="w-4/6 absolute left-0 h-full bg-no-repeat bg-center" style="background-image: url(public/img/bust-of-neptune.jpg)">
        <!-- <img src="public/img/bust-of-neptune.jpg" alt=""> -->
    </div>

    <div class="w-2/6 absolute right-0 h-full flex flex-col justify-center ">

        <div class="mx-20">

            <a href="index.php"><img src="public/img/Asset 1@4x2.png" alt=""></a>

            <form class="" action="login.php" method="post">
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                    <input name="username" class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" required="">
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                    <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" type="password">
                </div>
                <div class="flex justify-between">

                    <button type="submit" class="text-gray-800 outline outline-1 border-black bg-white hover:bg-gray-800 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Sign In</button>
                    <a href="register.php" class="hover:text-blue-500">Register here</a>
                </div>
            </form>
        </div>


    </div>
    <!-- 
    </div> -->

</body>

</html>


<?php
include "src/util/guard.php";

if ($_POST) {

    include "src/util/conn.php";
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
                header('location: src/admin/dashboard.php');
            } elseif ($dt_login['level'] === 'staff') {
                session_start();

                $_SESSION['id'] = $dt_login['id'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['name'] = $dt_login['nama'];
                $_SESSION['level'] = $dt_login['level'];
                $_SESSION['status_login'] = true;
                header('location: src/admin/dashboard.php');
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
            header('location: src/user/dashboard.php');
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}
?>
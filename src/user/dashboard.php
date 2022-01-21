<?php include '../util/conn.php';
require_once '../util/guard.php';

session_start();
if ($_SESSION['status_login'] != true) {
    redirectTo(__DIR__ . "/login.php");
}

if (!$_SESSION['level'] === 'admin' || !$_SESSION['level'] === 'staff') {
    redirectTo(__DIR__ . "/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../partials/tailwind.php' ?>
    <title>TLA</title>
</head>

<body>
    <a href="../util/logout.php">log out</a>
    <h1>hello <?= $_SESSION['name'] ?></h1>

</body>

</html>
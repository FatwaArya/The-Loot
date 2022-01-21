<?php


function redirectTo($url)
{
    header("Location:" . $url);
    die();
}
function checkLogin()
{
    session_start();
    if ($_SESSION['status_login'] != true) {
        redirectTo(__DIR__ . "/login.php");
    }
}

function redirectToLogin()
{
    redirectTo(__DIR__ . "/login.php");
}
function allow_page_access_exclusive($roles)
{
    $access = false;

    if (gettype($roles) === "array") {
        foreach ($roles as $role) {
            if ($_SESSION['level'] === $role) {
                $access = true;
            }
        }
    } else {
        if ($_SESSION['level'] === $roles) {
            $access = true;
        }
    }

    if (!$access) {
        redirectToLogin();
    }
}

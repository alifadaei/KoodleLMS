<?php
//some configs
function is_authenticated()
{
    return isset($_SESSION['user']) && isset($_SESSION['user']['login']);
}

function redirect_login()
{
    header("location:" . "login.php");
    exit();
}
function redirect_panel()
{
    header("location:" . "courses.php");
    exit();
}

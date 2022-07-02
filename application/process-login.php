<?php
//security check
defined('APPLICATION_START') || die("Hacking attempt!");
//program
$error = false;
$msgs = [];


if (!empty($_POST['idNumber'])) {
    $id = $_POST['idNumber'];
} else {
    $error = true;
    $msgs[] = "the id field should be filled";
}

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $error = true;
    $msgs[] = "the password field should be filled";
}

if (!$error) {
    if (!$error) {
        require_once 'connect.php';
        require_once 'functions.php';
        if (strlen($id) == 7)
            $table = 'students';
        else $table = 'professors';
        $result = getUserByID($id, $db, $table);
        if ($result && password_verify($password, $result['password'])) {
            $_SESSION["user"]["name"] = $result["name"];
            $_SESSION["user"]["email"] = $result["email"];
            $_SESSION["user"]["mobile"] = $result["mobile"];
            $_SESSION["user"]["user_type"] = $table === 'students' ? 'Student' : 'Professor';
            $_SESSION["user"]["id"] = $table === 'students' ? $result["student_no"] : $result['professor_no'];
            $_SESSION["user"]["title"] = $result["title"];
            $_SESSION["user"]["department"] = $result["department"];
            $_SESSION["user"]["login"] = true;
            require_once('utils.php');
            redirect_panel();
        } else {
            $error = true;
            $msgs[] = "id or password incorrect";
        }
    }
}

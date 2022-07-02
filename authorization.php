<?
if (session_status() == PHP_SESSION_NONE)
    session_start();

require_once './application/utils.php';
switch ($_SESSION['user']['user_type']) {
    case 'Student':
        $level = 1;
        break;
    case 'Professor':
        $level = 2;
        break;
}
// echo 'level: ' . $level;

<?
if (session_status() == PHP_SESSION_NONE)
    session_start();

require_once './application/utils.php';
if (!is_authenticated())
    redirect_login();

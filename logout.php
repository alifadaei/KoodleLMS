<?php
session_start();
$_SESSION["user"] = null;
require_once './application/utils.php';
redirect_login();
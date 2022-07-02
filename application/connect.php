<?php
defined('APPLICATION_START') || die("Hacking attempt!");

try {

    $db = new PDO('mysql:server=localhost;dbname=lms_koodle;', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR!:' . $e->getMessage();
}

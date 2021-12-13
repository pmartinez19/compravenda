<?php
if(!isset($_SESSION)) {
    session_start();
}
$host = 'localhost';
$user = 'pedro';
$pass = 'pedro';
$db = 'compravende';
$conn = new mysqli($host, $user, $pass, $db);
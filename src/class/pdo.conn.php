<?php
if(!isset($_SESSION)) {
    session_start();
}
$host = 'localhost';
$user = 'pedro';
$pass = 'pedro';
$db = 'compravende';

$conn_pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

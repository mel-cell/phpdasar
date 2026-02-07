<?php
// includes/db.php
$host = '127.0.0.1';
$user = 'root';
$pass = 'root';
$dbname = 'school_system';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

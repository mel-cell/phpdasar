<?php
require_once 'db.php';
session_start();

function login($u, $p) {
    global $pdo;
    $s = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $s->execute([$u]);
    $user = $s->fetch();
    if ($user && password_verify($p, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        return true;
    }
    return false;
}

function auth() {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }
}

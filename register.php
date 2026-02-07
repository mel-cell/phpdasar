<?php
require_once 'includes/db.php';
if ($_POST) {
    $s = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $s->execute([$_POST['u'], password_hash($_POST['p'], PASSWORD_DEFAULT)]);
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"><title>Register</title></head>
<body>
<div class="auth-container"><div class="card">
    <h1>Register</h1>
    <form method="POST">
        <input type="text" name="u" placeholder="Username" required><br><br>
        <input type="password" name="p" placeholder="Password" required><br><br>
        <button type="submit" class="btn btn-primary" style="width:100%">Register</button>
    </form>
    <a href="login.php">Login</a>
</div></div>
</body>
</html>

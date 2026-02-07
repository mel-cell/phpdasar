<?php
require_once 'includes/auth.php';
if ($_POST) {
    if (login($_POST['u'], $_POST['p'])) header("Location: index.php");
    else $err = "Invalid login";
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"><title>Login</title></head>
<body>
<div class="auth-container"><div class="card">
    <h1>Login</h1>
    <?php if(isset($err)) echo "<p style='color:red'>$err</p>"; ?>
    <form method="POST">
        <input type="text" name="u" placeholder="Username" required><br><br>
        <input type="password" name="p" placeholder="Password" required><br><br>
        <button type="submit" class="btn btn-primary" style="width:100%">Login</button>
    </form>
    <p><a href="register.php">Register</a></p>
</div></div>
</body>
</html>

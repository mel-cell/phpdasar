<?php
require_once 'includes/auth.php';
require_once 'includes/services.php';
auth();

if (isset($_GET['del_st'])) q("DELETE FROM students WHERE id=?", [$_GET['del_st']]);
if (isset($_POST['add_st'])) q("INSERT INTO students (name, class_id) VALUES (?,?)", [$_POST['name'], $_POST['class_id']]);
if (isset($_POST['add_cl'])) q("INSERT INTO classes (name) VALUES (?)", [$_POST['name']]);
if (isset($_POST['add_sub'])) q("INSERT INTO subjects (name) VALUES (?)", [$_POST['name']]);

$st = getAll('students');
$cl = getAll('classes');
$sub = getAll('subjects');
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"><title>Dashboard</title></head>
<body>
<div class="container">
    <div class="nav"><h1>School System</h1><a href="logout.php">Logout</a></div>
    
    <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
        <div class="card">
            <h3>Add Class/Subject</h3>
            <form method="POST"> <input type="text" name="name" placeholder="Name" required> 
                <button name="add_cl" class="btn btn-primary">Add Class</button>
                <button name="add_sub" class="btn btn-primary">Add Subject</button>
            </form>
        </div>
        <div class="card">
            <h3>Add Student</h3>
            <form method="POST"> 
                <input type="text" name="name" placeholder="Student Name" required>
                <select name="class_id"> <?php foreach($cl as $c) echo "<option value='{$c['id']}'>{$c['name']}</option>"; ?> </select>
                <button name="add_st" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

    <div class="card" style="margin-top:20px">
        <h3>Students</h3>
        <table>
            <tr><th>Name</th><th>Class</th><th>Action</th></tr>
            <?php foreach($st as $s): ?>
            <tr><td><?=$s['name']?></td><td><?=$s['class_name']?></td><td><a href="?del_st=<?=$s['id']?>">Del</a></td></tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>

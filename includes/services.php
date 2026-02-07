<?php
require_once 'db.php';

function q($sql, $p = []) {
    global $pdo;
    $s = $pdo->prepare($sql);
    $s->execute($p);
    return $s;
}

function getAll($tbl) {
    if ($tbl == 'students') return q("SELECT s.*, c.name as class_name FROM students s LEFT JOIN classes c ON s.class_id = c.id ORDER BY s.name")->fetchAll();
    return q("SELECT * FROM $tbl ORDER BY name")->fetchAll();
}

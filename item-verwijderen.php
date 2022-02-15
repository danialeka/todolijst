<?php

$pdo = new PDO("mysql:host=localhost;dbname=todo_applicatie", "root", "");

$query = $pdo->prepare('DELETE * FROM todo_items WHERE  id=:id');
$query->execute([
    'id' => $_GET['id']
]);
header('location: index.php');
exit;

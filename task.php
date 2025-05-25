<?php
include 'db.php';
$title = $_POST['title'];
$desc = $_POST['description'];
$date = $_POST['due_date'];
$conn->query("INSERT INTO tasks (title, description, due_date) VALUES ('$title', '$desc', '$date')");
header("Location: index.php");
?>

<?php
// DB connection
include 'db_conn.php';

$title = $_POST['title'];
$body = $_POST['body'];

$stmt = $conn->prepare("INSERT INTO posts (title, body) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $body);
$stmt->execute();

echo "success"; // AJAX reads this

?>
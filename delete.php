<?php
// DB connection
include 'db_conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete post from database
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "success";
}


?>
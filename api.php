<?php

header('Content-Type: application/json');
include 'db_conn.php';


$result = $conn->query("SELECT * FROM posts");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode([
    "data" => $data   // DataTables requires "data" key
]);


?>
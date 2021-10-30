<?php

include("./db/config.php");
include("./db/opendb.php");




$sql = "SELECT id, masge FROM todos";
$stmt = $dbaselink->prepare($sql);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $rows =  $result->fetch_all(MYSQLI_ASSOC);
    if ($stmt->num_rows() > 0) {
        http_response_code(404);
        echo json_encode(['error' => "No todos found"]);
    } else {
        http_response_code(200);
        echo json_encode($rows);
    }
} else {
    http_response_code(500);
    echo json_encode(['error' => "Server Error"]);
};

include("db/closedb.php");

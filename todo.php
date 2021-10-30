<?php

include("./db/config.php");
include("./db/opendb.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        getTodo($dbaselink);
        break;

    case 'POST':
      

    case 'DELETE':    


    case 'PATCH':

    
    default:
    echo "in progress";
}


function getTodo($dbaselink)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT id, masge FROM todos where id = ?";
        $stmt = $dbaselink->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $rows =  $result->fetch_all(MYSQLI_ASSOC);

            if ($result->num_rows == 0) {
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
    } else {
        $sql = "SELECT id, masge FROM todos";
        $stmt = $dbaselink->prepare($sql);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $rows =  $result->fetch_all(MYSQLI_ASSOC);
            if ($result->num_rows == 0) {
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
    }
}




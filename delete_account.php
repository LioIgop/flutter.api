<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rutaco_mysql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['user_ID'];

$sql = "DELETE FROM account_tbl WHERE user_ID=$user_ID";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "success", "message" => "Record deleted successfully"));
} else {
    echo json_encode(array("status" => "error", "message" => "Error deleting record: " . $conn->error));
}

$conn->close();
?>
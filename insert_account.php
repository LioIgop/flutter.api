<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rutaco_mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

// Get data from the POST request
$data = json_decode(file_get_contents("php://input"), true);

$user_ID = $data['user_ID'];
$username = $data['username'];
$password = $data['password'];
$email = $data['email'];

$sql = "INSERT INTO account_tbl (user_ID,username,password, email) VALUES ('$user_ID', '$username', '$password' , '$email')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "success", "message" => "New record created successfully"));
} else {
    echo json_encode(array("status" => "error", "message" => "Error: " . $sql . " " . $conn->error));
}

//$conn->close();
?>
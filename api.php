<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root"; // default username
$password = ""; // default password for root user is empty
$dbname = "rutaco_mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

$sql = "SELECT user_ID, username, password, email FROM account_tbl"; // Replace with your actual table and columns
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "error", "message" => "No results found"));
}

$conn->close();
?>


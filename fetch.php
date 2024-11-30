<?php
header('Content-Type: application/json');

// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_database";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch records
$sql = "SELECT name, age, email FROM records";
$result = $conn->query($sql);

$records = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

echo json_encode($records);

$conn->close();
?>

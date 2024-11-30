<?php
// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "my_database";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $sql = "INSERT INTO records (name, age, email) VALUES ('$name', '$age', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

// Redirect back to the main page after submission
header("Location: index.html");
exit;
?>

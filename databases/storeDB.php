<?php
$servername = "localhost";
$username = "roberto";
$password = "password";


$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully\n";

$sql = "CREATE DATABASE IF NOT EXISTS storeDB";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS storeDB.StoreUsers2(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    username VARCHAR(30),
    password VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

mysqli_close($conn);
?>
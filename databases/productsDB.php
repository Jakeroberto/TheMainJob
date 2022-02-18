<?php
$servername = "localhost";
$username = "roberto";
$password = "password";


$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE TABLE IF NOT EXISTS storeDB.Products(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(30) NOT NULL,
    Category VARCHAR(30) NOT NULL,
    Brand VARCHAR(50),
    Manufacturer VARCHAR(30),
    Price VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

mysqli_close($conn);
?>
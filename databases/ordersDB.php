<?php
$servername = "localhost";
$username = "roberto";
$password = "password";


$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE TABLE IF NOT EXISTS storeDB.Orders(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Item VARCHAR(30),
   Quantity VARCHAR(30),
   Cost VARCHAR(30),
   PaymentMethod VARCHAR(30),
   DeliveryAdress VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

mysqli_close($conn);
?>
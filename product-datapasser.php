<html>
<body>

<?php
$servername = "localhost";
$username = "roberto";
$password = "password";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully\n";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$ProductName = $Category = $Brand = $Manufacturer = $Price = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ProductName = test_input($_POST["ProductName"]);
    $Category = test_input($_POST["Category"]);
    $Brand = test_input($_POST["Brand"]);
    $Manufacturer = test_input($_POST["Manufacturer"]);
    $Price = test_input($_POST["Price"]);
}


$sql = "INSERT INTO storeDB.Products (ProductName, Category, Brand, Manufacturer, Price)
VALUES ('" . $ProductName . "', '" . $Category . "', '" . $Brand . "', '" . $Manufacturer . "', '" . $Price . "')";

$conn->query($sql);




mysqli_close($conn);
?>



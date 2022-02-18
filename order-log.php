<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$ProductName = $Category = $Brand = $Manufacturer = $Price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$Item = test_input($_POST)["ProductName"];
$Quantity = test_input($_POST)["Category"];
$Cost= test_input($_POST)["Brand"];
$PaymentMethod = test_input($_POST)["Manufacturer"];
$DeliveryAdress = test_input($_POST)["Price"];

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
}
?>

<form action="product-datapasser.php" method="post">
Product: <input type="text" name="ProductName"><br>
Category: <input type="text" name="Category"><br>
Brand: <input type="text" name="Brand"><br>
Manufacturer: <input type="text" name="Manufacturer"><br>
Price: <input type="text" name="Price"><br>
Add Product to DataBase <input type="submit">
</form>
</body>
</html>
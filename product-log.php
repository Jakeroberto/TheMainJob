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
$ProductName = test_input($_POST)["ProductName"];
$Category = test_input($_POST)["Category"];
$Brand = test_input($_POST)["Brand"];
$Manufacturer = test_input($_POST)["Manufacturer"];
$Price = test_input($_POST)["Price"];
$img = test_input($_POST)["img"];
$Review1 = test_input($_POST)["Review1"];
$Review2 = test_input($_POST)["Review2"];
$Review3 = test_input($_POST)["Review3"];

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
Review1: <input type="text" name="Review1"><br>
Review2: <input type="text" name="Review2"><br>
Review3: <input type="text" name="Review3"><br>
Img : <input type="text" name="img"><br>
Add Product to DataBase <input type="submit">

</form>
</body>
</html>
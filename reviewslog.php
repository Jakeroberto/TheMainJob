<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$Product = $Review1 = $Review2 = $Review3 =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$Product = test_input($_POST)["Product"];
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

<form action="reviews-data-passer.php" method="post">
Product: <input type="text" name="Product"><br>
Review1 <input type="text" name="Review1"><br>
Review2: <input type="text" name="Review2"><br>
Review3: <input type="text" name="Review3"><br>
Add Product to DataBase <input type="submit">
</form>
</body>
</html>
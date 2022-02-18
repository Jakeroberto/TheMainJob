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

$Product = $Review1 = $Review2 = $Review3 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Product = test_input($_POST["Product"]);
    $Review1 = test_input($_POST["Review1"]);
    $Review2 = test_input($_POST["Review2"]);
    $Review3 = test_input($_POST["Review3"]);
    
}


$sql = "INSERT INTO storeDB.Reviews (Product, Review1, Review2, Review3,)
VALUES ('" . $Product . "', '" . $Review1 . "', '" . $Review2 . "', '" . $Review3 . "')";

$conn->query($sql);




mysqli_close($conn);
?>

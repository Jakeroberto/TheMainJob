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

$firstname = $lastname = $email = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = test_input($_POST["firstname"]);
    $surname = test_input($_POST["surname"]);
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
}

echo $password;


$sql = "INSERT INTO storeDB.StoreUsers2 (firstname, surname, email, username, password)
VALUES ('" . $firstname . "', '". $surname . "', '" . $email . "', '" . $username . "', '" . $password . "')";

echo $sql;
$conn->query($sql);




mysqli_close($conn);
?>



</body>

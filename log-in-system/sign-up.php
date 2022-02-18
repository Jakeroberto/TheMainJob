<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$firstname = $surname = $email = $username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$firstname = test_input($_POST)["firstname"];
$surname = test_input($_POST)["surname"];
$email = test_input($_POST)["email"];
$username = test_input($_POST["username"]);
$password = test_input($_POST["password"]);

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
}
?>

<form action="sign-up-datapasser.php" method="post">
First Name: <input type="text" name="firstname"><br>
Surname: <input type="text" name="surname"><br>
Email: <input type="text" name="email"><br>
Username: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit">
</form>

</body>
</html>
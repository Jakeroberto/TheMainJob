<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "roberto";
$password = "password";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$username = $password = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);

}
  ?>
  <form action="" method="post">
Username: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit">
</form>


<?php
 if(isset($_POST['submit'])) {
     $sql = mysqli_query($conn,
     "SELECT * FROM storeDB.StoreUsers2 WHERE 
     username='" . $_POST["username"] . "' AND
    password='" . $_POST["password"] . "'    ");
     $num = mysqli_num_rows($sql); 
     if($num > 0) {
      $row = mysqli_fetch_array($sql);
      header("location:index.html");
      exit();
  }
     else {
 ?> 
<hr>
<font color="red"><b>
        <h3>Incorrect username or password
           </h3>
    </b>
</font>
<hr>

<?php
      }
    }
    mysqli_close($conn);
    ?>
  
  





</body>
</html>
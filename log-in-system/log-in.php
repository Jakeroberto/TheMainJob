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
$error = "incorrect log in credentials";
  ?>


<div class="log-in-div">
  <img id="logo" src="/TheMainJob/store-logo.png">
  <form action="" method="post">
<p id="username-text">Username: </p><input type="text" name="username" id="username"><br>
<p id="password-text">Password: </p><input type="text" name="password" id="password"><br>
<input id="submit-button" type="submit"> 
</form>
</div>

<style>
  body{
    color:white;
    background:black;
  }

  #logo{
  position:absolute;
  top:20px;
  left:180px;
  }
  .log-in-div{
    height:700px;
    width:600px;
    border:5px solid white;
    position:absolute;
    top:10vh;
    left:35vw;
  }
  #username{
  position:absolute;
  top:300px;
  left:200px;
  }
  #password{
    position:absolute;
    top:430px;
    left:200px;
  }
  #username-text{
    position:absolute;
    top:250px;
    left:200px;
  }

  #password-text{
    position:absolute;
    top:380px;
    left:200px;
  }

  #submit-button{
    position:absolute;
    top:520px;
    left:240px;
    height:50px;
    width:100px;
    background-color:black;
    color:white;
  }
  </style>




<?php
 if(isset($_POST['username'])) {
     $sql = mysqli_query($conn,
     "SELECT * FROM storeDB.StoreUsers2 WHERE 
     username='" . $_POST["username"] . "' AND password= '" . $_POST["password"] . "' ");
     $num = mysqli_num_rows($sql); 
     if($num > 0) {
      $row = mysqli_fetch_array($sql);
      header("location:/TheMainJob/index.html");
      exit();
  }
     else {
       echo $error;
     }
    }
 ?> 

<?php
      
    mysqli_close($conn);
    ?>
  
  





</body>
</html>
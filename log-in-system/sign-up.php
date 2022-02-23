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
$Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])){
    $Err = "Required field*";
  } else {
    $firstname = test_input($_POST)["firstname"];
  }

  if (empty($_POST["surname"])){
    $Err = "Required field*";
  } else {
    $surname = test_input($_POST)["surname"];
  }

  if (empty($_POST["email"])){
    $Err = "Required field*";
  } else {
    $email = test_input($_POST)["email"];
  }

  if (empty($_POST["username"])){
    $Err = "Required field*";
  } else {
    $username = test_input($_POST)["username"];
  }

  if (empty($_POST["password"])){
    $Err = "Required field*";
  } else {
    $password = test_input($_POST)["password"];
  }



    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
}
?>

<div class="sign-up-div">
    <img id="logo" src="/TheMainJob/store-logo.png">
<form action="sign-up-datapasser.php" method="post">
<p id="first-name-text"> First Name: </p> <input id="first-name" type="text" name="firstname"><br>
<span class="error">* <?php echo $Err;?></span>
<br><br>
<p id="surname-text"> Surname: </p> <input id="surname" type="text" name="surname"><br>
<span class="error">* <?php echo $Err;?></span>
<br><br>
<p id="email-text"> Email: </p> <input id="email" type="text" name="email"><br>
<span class="error">* <?php echo $Err;?></span>
<br><br>
<p id="username-text"> Username: </p> <input id="username" type="text" name="username"><br>
<span class="error">* <?php echo $Err;?></span>
<br><br>
<p id="password-text"> Password: </p> <input id="password" type="password" name="password"><br>
<span class="error">* <?php echo $Err;?></span>
<br><br>
<input id="submit-button" type="submit">
</form>
<p style="position:absolute; bottom:10px; left:190px;" >Already have an account? <a href="log-in.php"> Log-in </a> </p>
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
  .sign-up-div{
    height:700px;
    width:600px;
    border:5px solid white;
    position:absolute;
    top:10vh;
    left:35vw;
  }
  #first-name{
      position:absolute;
      top:230px;
      left:200px;
  }
  #surname{
      position:absolute;
      top:300px;
      left:200px;
  }
  #email{
      position:absolute;
      top:370px;
      left:200px;
  }
  #username{
  position:absolute;
  top:440px;
  left:200px;
  }
  #password{
    position:absolute;
    top:510px;
    left:200px;
  }
  #first-name-text{
      position:absolute;
      top:180px;
      left:200px;
  }
  #surname-text{
      position:absolute;
      top:250px;
      left:200px;
  }
  #email-text{
      position:absolute;
      top:320px;
      left:200px;
  }
  #username-text{
    position:absolute;
    top:390px;
    left:200px;
  }

  #password-text{
    position:absolute;
    top:470px;
    left:200px;
  }

  #submit-button{
    position:absolute;
   bottom:80px;
    left:240px;
    height:50px;
    width:100px;
    background-color:black;
    color:white;
  }
  .error{
    color:white;
  }
  </style>

</body>
</html>

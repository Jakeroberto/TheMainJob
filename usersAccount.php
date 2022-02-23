<?php 
session_start();
//echo $_SESSION["username"];
//exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="workingcss.css">
        <title>Document</title>

<script>   


    function priceTotal(prodId, qty, itemPrice) {
	total = qty * itemPrice;
	document.getElementById("price" + prodId).innerText = total;
   }

    function qtyDec(prodId, itemPrice) {
	val = document.getElementById("quantity" + prodId).value;
	document.getElementById("quantity" + prodId).value = --val;
	priceTotal(prodId, val, itemPrice)
    }

    
    

    function qtyInc(prodId, itemPrice){
        val = document.getElementById("quantity" + prodId).value;
        document.getElementById("quantity" + prodId).value = ++val;
        priceTotal(prodId, val, itemPrice)
            }
</script>
<script>
    function addToBasket(prodId, itemPrice, itemName, itemImg){
        cartValue = document.getElementById("cartQty").value;
        document.getElementById("cartQty").value = ++cartValue; 
    }

   
</script>
</head>
<body>

    <style>
        button:hover{
            background:black;
            color:white;
        }
        #log-in-button:hover{
            background:black;
            color:white;
        }
        #sign-up-button:hover{
            background:black;
            color:white;
        }
        a{
            color:black;
        }
        a:hover{
            color:white;;
        }
      
        .add-to-basket{
             position:absolute;
             bottom:0px;
             right:0px;
             height:40px;
             width:60px;
         }

        .quantity{
            display:flex;
            justify-content: center;
            position:absolute;
            bottom:0px;

        }
        
        .quantity button{
            width:30px;
            height:30px;
            border: 1 px solid black;
            border-radius:0;
        }
        
        .quantity input{
            border-top: 1px solid black;
            border-bottom:1px solid black;
            text-align: center;
            width:44px;
            height:25.5px;
            font-size:20px;
            position:absolute;
            bottom:40px;
            left:25px;
        }
        
        .total-price{
            text-align:center;
            font-size:20px;
            position:absolute;
            bottom:5px;
        }

        .minus-btn{
            position:absolute;
            bottom:40px;
            left:0px;

        }

        .plus-btn{
            position:absolute;
            bottom:40px;
            left:77px;
        }

    @keyframes Intro {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}

body {  
  animation: 1s ease-out 0s 1 Intro;
}

    </style>

<header>

        <img style="float:left; height:150px; width:200px;" src="store-logo.png">
         Robertos Liquore Store 

        <form action ="search-logged-in.php" method="post">
         <input id="search-bar" type="text" name="search" placeholder="Search for your favourite brands">
         <button type="submit" name="submit" id="searchButton">Search</button>
         </form>
         <p style="color:white; font-size:20px; position:absolute; top:5px; right:250px;">  <?php echo  $_SESSION['username']; ?> </p>
	 <img src="<?php echo $_SESSION["ProfileImg"]; ?>"  style="position:absolute; top:20px; right:175px;"/>
         <button id="log-in-button"><b><a href="index.php">Log-out</a></b></button>
         <button id="sign-up-button"><b><a href="cart.php"><img style="height:50px; width:100px; position:absolute; top: -1.5px; right:-1px;"src="img/cart.jpeg"></a></b></button>
         <input type="text" id="cartQty<?php echo $row["id"];?>" value="0" style="position:absolute; top:80px; right:12px; height:15px; width:15px; border-radius:50%;">
         <button id="categories-button"><b>Categories</b></button>
         <button id="brands-button"><b>Brands</b></button>
    </header>

<?php
$servername = "localhost";
$username = "roberto";
$password = "password";
$dbname = "storeDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, ProductName, img, Price FROM Products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<div class=grid>";
    while ($row = $result->fetch_assoc()) {
    ?>
       <div class="item-box">
           <p class="item-details"><?php echo $row["ProductName"] ?></p>
           <img style="position:absolute; top:70px; left:60px; height:150px; width:150px;" src="<?php echo $row["img"]?>">
           <div class="quantity">
                 <button class="btn minus-btn disabled" type="button" onclick="qtyDec(<?php echo $row["id"].",".$row["Price"];?>)">-</button>
                 <input type="text" id="quantity<?php echo $row["id"];?>" value="1">
                 <button class="btn plus-btn disabled" type="button" onclick= "qtyInc(<?php echo $row["id"].",".$row["Price"];?>)">+</button>
           <p class="Price">
                <span><i class="fa fa-pounds"></i></span>
                <span id="price<?php echo $row["id"];?>"  style="position:absolute; bottom:10px; left:30px; font-size:20px;" > <?php echo $row["Price"]?></span>
                </p>
                <button class="addToBasket<?php echo $row["id"]?>" type="submit" style="position:absolute; bottom:0px; left:255px; height:50px; width:50px;" onclick="addToBasket(<?php echo $row["id"];?>)">Add to cart</button> 
    </div>
    </div>
    <?php
    }
    echo "</div>";
} else {
    echo  "HAHA TRY AGAIN";
}

$conn->close();
?>






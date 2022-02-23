<html>
  <head>
    <link rel="stylesheet" href="workingcss.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<body>

<script>
  function priceTotal(prodId, qty, itemPrice){
    total = qty * itemPrice;
    document.getElementById("price" + prodId).innerText = total;

  }

    function qtyDec(prodId, itemPrice){
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



<header>

       <a href="usersAccount.php"> <img style="float:left; height:150px; width:200px;" src="store-logo.png"> </a>
         Robertos Liquore Store 

        <form action ="search-logged-in.php" method="post">
         <input id="search-bar" type="text" name="search" placeholder="Search for your favourite brands">
         <button type="submit" name="submit" id="searchButton">Search</button>
         </form>
         <p style="color:white; font-size:20px; position:absolute; top:5px; right:150px;">  <?php echo  $_SESSION['username']; ?> </p>
	 <img src="TheMainJob/<?php echo $_SESSION["ProfileImg"]; ?>" style="position:absolute; top:100px; right:175;" />
         <button id="log-in-button"><b><a href="index.php">Log-out</a></b></button>
         <button id="sign-up-button"><b><a href="cart.php"><img style="height:50px; width:100px; position:absolute; top: -1.5px; right:-1px;"src="img/cart.jpeg"></a></b></button>
         <input type="text" id="cartQty<?php echo $row["id"];?>" value="0" style="position:absolute; top:80px; right:12px; height:15px; width:15px; border-radius:50%;">
         <button id="categories-button"><b>Categories</b></button>
         <button id="brands-button"><b>Brands</b></button>
    </header>


    
    <div class="ad1 active" id="ad1">
      <button id="closeAd">close ad X</button>
        <h1> More from Robertos </h1>
        <p> <a href="bookstore.html"><img id="adImg"style="height:200px; width:200px;" src="img/books.jpg"></a> </p>
    </div>


  <?php 
$servername = "localhost";
$username = "roberto";
$password = "password";


$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$search = $_POST['search'];

$sql = "SELECT * FROM storeDB.Products WHERE ProductName LIKE '%$search%' OR Category LIKE '%$search%' OR Brand LIKE '%$search%'
 OR Manufacturer LIKE '%$search%'";

 $results = mysqli_query($conn, $sql);
 $count = mysqli_num_rows($results);
 if ($count> 0){
     while ($row = mysqli_fetch_assoc($results)) {
         $id = $row['id'];
         $ProductName = $row['ProductName'];
         $Category = $row ['Category'];
         $Brand = $row ['Brand'];
         $Manufacturer = $row['Manufacturer'];
         $img = $row['img'];
         $Review1 = $row['Review1'];
         $Review2 = $row['Review2'];
         $Review3 = $row['Review3'];
         ?>



<div class="grid" style="padding:250px;">
<div style="position:absolute;left:330px; border:5px solid black; height:495px; width:1000px;">
<p><img style="height:150px; width:700px;" src="<?php echo $Review1; ?>"></p> <p><img style="height:150px; width:700px;" src="<?php echo $Review2; ?>">  <p><img style="height:150px; width:700px;" src="<?php echo $Review3; ?>"></p>  </p>
 </div>
<div class="info-box" style="position:absolute; left:15px; width:310px;">
  <p> Category: <?php echo $Category; ?></p>
  <p> Brand: <?php echo $Brand; ?></p>
  <p> Manufacturer: <?php echo $Manufacturer; ?> </p>
</div>
<div class="item-box" style="position:absolute; top:125px; left:15px; height:360px;">
      <img  style="position:absolute; top:62.5px; left:50px;" src="<?php echo $img; ?>">
      <p class="item-details"> <?php echo $ProductName; ?></p>
<div class="quantity">
      <button class="btn minus-btn disabled" style=" position:absolutel bottom:10px; left:-5px;" type="button" onclick="qtyDec(<?php echo $row["id"].",".$row["Price"];?>)">-</button>
      <input type="text" style="height:30px; width:55px;" id="quantity<?php echo $row["id"]?>" value="1">
      <button class="btn plus-btn disabled" type="button" onclick="qtyInc(<?php echo $row["id"].",".$row["Price"];?>)">+</button>
</div>
      <p class="total-price">
      <span><i class="fa fa-pounds"></i></span>
      <span id="price<?php echo $row["id"];?>"style="position:absolute; bottom:-15px; left:25px; font-size:20px;"  ><?php echo $row["Price"];?></span>
      </p>
      <button class="add-to-basket" type="submit" id="add-to-basket1" style="position:absolute; bottom:0px; left:255px; height:50px; width:50px;">Add to basket</button> 
     </div>
</div>
</div> 

          
         
         <?php
     }
      }else{
         echo "<div class='Err'> 
         there is no product matching your search
         </div>";
     }


?>



<style>
img{
  height:200px;
  width:200px;
}

.info-box{
  border:5px solid black;
}

.ad1{
  float:right;
  height:500px;
  width:300px;
  border:3px solid black;
  position:relative;
}

#closeAd{
float:right;
}

h1{
  position:absolute;
  left:10px;
  top:20px;
}

.hidden{
  display:none;
}
.show{
  display:block;
}
#adImg{
  position:absolute;
  top:150px;
  left:50px;
}
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

    .Err{
      font-size:40px;
      position:absolute;
      top:200px;
      left:300px;
    }
</style>


<script>
  const closeAd = document.getElementById("closeAd");
  const ad1 = document.getElementById("ad1");

  closeAd.addEventListener('click', () => {
    ad1.classList.remove('active');
    ad1.classList.add('hidden');
  })
</script>
          </body>
</html>
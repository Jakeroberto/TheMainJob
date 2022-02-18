<html>
  <head>
    <link rel="stylesheet" href="workingcss.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<header>
        <a href="index.html"><img style="float:left; height:150px; width:200px;" src="store-logo.png"></a>
         Robertos Liquore Store 

        <form action ="search.php" method="post">
         <input id="search-bar" type="text" name="search" placeholder="Search for your favourite brands">
         <button type="submit" name="submit" id="searchButton">Search</button>
         </form>

         <button id="log-in-button"><b><a href="log-in-system/log-in.php">Log in</a></b></button>
         <button id="sign-up-button"><b><a href="log-in-system/sign-up.php">Sign-up</a></b></button>
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
      <button class="btn minus-btn disabled type=button">-</button>
      <input type="text" id="quantity" value="1">
      <button class="btn plus-btn disabled" type="button">+</button>
</div>
      <p class="total-price">
      <span><i class="fa fa-pounds"></i></span>
      <span id="price">13.99</span>
      </p>
      <button class="order" type="submit">Add to basket</button> 
     </div>
</div>
</div> 

          
         
         <?php
     }
      }else{
         echo "<div class='alert alert-danger'> 
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
</style>

<script>
            document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
        
            var valueCount
        
            var price = document.getElementById("price").innerText;
        
            function priceTotal()
            {
                var total = valueCount * price;
                document.getElementById("price").innerText = total
            }
        
            document.querySelector(".plus-btn").addEventListener("click", function()
            {
                valueCount = document.getElementById("quantity").value;
        
                valueCount++;
        
                document.getElementById("quantity").value = valueCount
        
                if (valueCount > 0){
                    document.querySelector(".minus-btn").removeAttribute("disabled")
                    document.querySelector(".minus-btn").classList.remove("disabled")
                }
        
                priceTotal()
            })
        
            document.querySelector(".minus-btn").addEventListener("click", function()
            {
                valueCount = document.getElementById("quantity").value;
                
                valueCount--;
        
                document.getElementById("quantity").value = valueCount
        
                if(valueCount == 0){
                    document.querySelector(".minus-btn").setAttribute("disabled","disabled")
                }
                priceTotal()
            })
</script>

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
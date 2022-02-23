<head>
    <link rel="stylesheet" href="workingcss.css">
    <link rel="stylesheet" href="homepage.css">
</head>
<style>
    .cartRows{
        border:5px solid black;
    }
</style>
<body>

<header>

        <a href="usersAccount.php"> <img style="float:left; height:150px; width:200px;" src="store-logo.png"> </a>
         Robertos Liquore Store 

        <form action ="search-logged-in.php" method="post">
         <input id="search-bar" type="text" name="search" placeholder="Search for your favourite brands">
         <button type="submit" name="submit" id="searchButton">Search</button>
         </form>
         <p style="color:white; font-size:20px; position:absolute; top:5px; right:250px;">  <?php echo  $_SESSION['username']; ?> </p>
	 <img src="<?php echo $_SESSION["ProfileImg"]; ?>"  style="position:absolute; top:20px; right:175px;"/>
         <button id="log-in-button"><b><a href="index.php">Log-out</a></b></button>
         <button id="sign-up-button"><b><a href="basket.php"><img style="height:50px; width:100px; position:absolute; top: -1.5px; right:-1px;"src="img/cart.jpeg"></a></b></button>
         <input type="text" id="cartQty<?php echo $row["id"];?>" value="0" style="position:absolute; top:80px; right:12px; height:15px; width:15px; border-radius:50%;">
         <button id="categories-button"><b>Categories</b></button>
         <button id="brands-button"><b>Brands</b></button>
    </header>

<div class="cartRows">
    <img src="<?php echo $row["img"] ?>"/>
<p><?php echo $row["ProductName"]?></p>
<p><?php echo $row["Price"]?>
<!-- echo the  quantity value -->
</div>

</body>
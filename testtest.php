<!DOCTYPE html>
<html>
<head>
    <style>
        .grid{
            border:5px solid black;
            height:350px;
            width:300px;
        }
        </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "roberto";
$password = "password";
$dbname = "storeDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ProductName, img, Price FROM Products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div>";
    while($row = $result->fetch_assoc()) {
    ?>
        <div class="grid" name="grid" id="grid">
        <div class="item-box">
                <p class="item-details"><b><?php echo $row("ProductName")?> </b></p>
                 <img style="position:absolute; top:62.5px; left:50px;" <?php echo $row("img")?>>
        <div class="quantity">
                 <button class="btn minus-btn disabled type=button">-</button>
                 <input type="text" id="quantity" value="1">
                 <button class="btn plus-btn disabled" type="button">+</button>
        </div>
                <p class="total-price">
                <span><i class="fa fa-pounds"></i></span>
                <span id="price"><?php echo $row("Price") ?></span>
                </p>
                <button id="add-to-basket" type="submit">Add to basket</button> 
           
    </div>
    <?php
    }
    echo "</div>";
} else {
    echo  "HAHA TRY AGAIN";
}



$conn->close();
?>

</body>
</html>
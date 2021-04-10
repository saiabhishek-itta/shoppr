<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppr";
session_start();

if (!isset($_SESSION['email']) )
   {
      header("location: login.html");
   }

if(isset($_POST['sell_shopname'])){
$sell_mailid=$_SESSION['email'];
$sell_shopname=$_POST['sell_shopname'];
$sell_shopaddress=$_POST['sell_shopaddress'];
$sell_shopmobile=$_POST['sell_shopmobile'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error ) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO seller_shopdata (sell_mailid,sell_shopname,sell_shopaddress,sell_shopmobile)
VALUES ('$sell_mailid','$sell_shopname','$sell_shopaddress','$sell_shopmobile')";

if ( $conn->query($sql) === TRUE) {
  echo "<div id='test'><h1>Your request for registering a shop is placed succesfully</h1></div><br>";
  echo"<a href='seller_home.php'>HOME</a>";
} else {
  echo "An Error occured in placing your request";
}

$conn->close();

}

?>



<html>

<head> <h1>WELCOME TO SHOP REGISTRATION PORTAL</h1> </head>



<body>
    <form action="" method="post">

        <label for="cust_name">Shop Name: </label>
        <input type="text" name="sell_shopname" id="sell_shopname" required><br>

        <label for="sell_address">Shop Address: </label>
        <input type="textarea" name="sell_shopaddress" id="sell_shopaddress" required><br>

        <label for="sell_mobileno">Shop Mobile Number : </label>
        <input type="" name="sell_shopmobile" id="sell_shopmobile" required><br>

        
        
    <input type="submit" value="Register">
    </form>
</body>



<div id="test"></div>



</html>
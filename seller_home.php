<?php
session_start();
if (!isset($_SESSION['email'])||!isset($_SESSION['account_type']) )
   {
      header("location: login.html");
   }
echo $_SESSION['account_type'];echo" : ";
echo $_SESSION['email'];echo"<br>";

echo "<br><a href='logout.php'>LOGOUT</a>";


echo"<br>";echo"<br>";echo"<br>";

echo"<a href='shop_register.php'>Register a new shop</a>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppr";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

echo"<h1>YOUR SHOPS</h1>";

$email=$_SESSION['email'];













$sql = "SELECT * FROM seller_shopdata WHERE sell_mailid = '$email' and review = '1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo 
        "<b>Shop ID: </b>" . $row['sell_shopid']. 
        "<br><b> Shop Name: </b>" . $row['sell_shopname']. 
        "<br><b>Shop Address: </b>" . $row['sell_shopaddress']. 
        "<br><b>Mobile: </b>".$row['sell_shopmobile'].
        "<br><br>";
    }
  } else {
    echo "NO ACTIVE SHOPS FOUND";
  }
  ?>
<html>
<form action="shop_manage.php" method="post">
  <h3>Manage your shop</h3>
        <label for="Shopid">Enter Shop ID: </label>
        <input type="text" name="shopid" id="shopid" required>
        <input type="submit" value="Submit">
    </form>
</html>

  <?php
  echo"<h1>PENDING FOR REGISTRATION</h1>";

  
  $sql = "SELECT * FROM seller_shopdata WHERE sell_mailid = '$email' and review = '0'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo 
        "<b>Request ID: </b>" . $row['sell_shopid']. 
        "<br><b> Shop Name: </b>" . $row['sell_shopname']. 
        "<br><b>Shop Address: </b>" . $row['sell_shopaddress']. 
        "<br><b>Mobile: </b>".$row['sell_shopmobile'].
        "<br><b>Status: </b>".$row['status'].
        "<br><br>";
      }
    } else {
      echo "NO ACTIVE REQUESTS FOUND";
    }



?>
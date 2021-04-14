<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !is_null($_POST["shopid"]))
{
$_SESSION['shopid'] = $_POST['shopid']; 
}

if (is_null($_SESSION["shopid"]))
   {
      header("location: seller_home.php");
   }

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "shoppr";
   $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   } 


 

$shopid=$_SESSION["shopid"];

echo "<h1>STORE MANAGER</h2><h3>Store ID :".$shopid."</h2>";

echo"<a href='add_product.php'>Add New Product to Store</a>";

echo"<h3>Current Items in your store</h3>";
   $sql = "SELECT * FROM shop_stock WHERE sell_shopid = '$shopid'";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           echo 
         
           "<b>Item Name: </b>" . $row['item_name']. 
           "<br><b>Current Stock: </b>" . $row['item_currentstock']. 
           "<br><b>Price per unit: </b>".$row['item_priceperunit'].
           "<br><b>Unit: </b>".$row['unit_type'].
           "<br><br>";
       }
     } else {
       echo "NO PRODUCTS FOUND";
     }





   ?>
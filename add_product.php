<?php


session_start();
if (!isset($_SESSION['shopid']))
   {
      header("location: shop_manage.php");
   }


   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "shoppr";


   if(isset($_POST['item_name'])){

    $shopid=$_SESSION['shopid'];
    $item_name=$_POST['item_name'];
    $item_currentstock=$_POST['item_currentstock'];
    $item_priceperunit=$_POST['item_priceperunit'];
    $unittype=$_POST['unittype'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error ) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    
    $sql = "INSERT INTO shop_stock (sell_shopid,item_name,item_currentstock,item_priceperunit,unit_type)
    VALUES ('$shopid','$item_name','$item_currentstock','$item_priceperunit','$unittype')";
    
    if ( $conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['shopid'] = $shopid; 
        header("location: shop_manage.php");
    } else {
      echo "An Error occured in placing your request";
      echo"<a href='seller_home.php'>HOME</a>";
    }


   }





?>


<form action="" method="post">
        <label for="item_name">Product Name: </label>
        <input type="text" name="item_name" id="item_name" required><br>
        
        <label for="item_currentstock">Cuttent Stock: </label>
        <input type="text" name="item_currentstock" id="item_currentstock" required><br>
        
        <label for="item_priceperunit">Price per Unit: </label>
        <input type="text" name="item_priceperunit" id="item_priceperunit" required><br> 
        
        <label for="unittype">Unit Type: </label>
        <select name="unittype" id="unittype">
            <option value="PER-PEICE">PER-PEICE</option>
            <option value="KILOGRAM">KILOGRAM</option>
            <option value="LITER">LITER</option>       
        </select>
        
        <br>
    <input type="submit" value="ADD Product">
    </form>
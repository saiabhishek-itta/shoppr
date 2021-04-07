<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppr";

if (!isset($_POST["sell_mailid"]))
   {
      header("location: seller_register.html");
   }


$sell_name=$_POST['sell_name'];
$sell_shopname=$_POST['sell_shopname'];
$sell_mailid=$_POST['sell_mailid'];
$sell_password=$_POST['sell_password'];
$sell_address=$_POST['sell_address'];
$sell_mobileno1=$_POST['sell_mobileno1'];
$sell_mobileno2=$_POST['sell_mobileno2'];
$sell_landline=$_POST['sell_landline'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error ) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO sellerdata (sell_name,sell_shopname,sell_mailid,sell_password,sell_address,sell_mobileno1,sell_mobileno2,sell_landline)
VALUES ('$sell_name','$sell_shopname','$sell_mailid','$sell_password','$sell_address','$sell_mobileno1','$sell_mobileno2','$sell_landline')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>You are Successfully Registered as a seller</h1>
  <a href='login.html'>Click Here to Login</a>
  ";
} else {
  echo "An Account is already registered with ".$sell_mailid;
  echo"<br><a href='login.html'>Click Here to Login</a>";
}

$conn->close();
?>
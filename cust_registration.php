<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppr";

$cust_name=$_POST['cust_name'];
$cust_mailid=$_POST['cust_mailid'];
$cust_password=$_POST['password'];
$cust_address=$_POST['cust_address'];
$cust_mobileno=$_POST['cust_mobileno'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customerdata (cust_name,cust_mailid,cust_password,cust_address,cust_mobileno)
VALUES ('$cust_name','$cust_mailid','$cust_password','$cust_address','$cust_mobileno')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>You are Successfully Registered as a Customer</h1>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
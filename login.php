<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoppr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

session_start();
$email = $_POST['email'];
$password = $_POST['password']; 
$accounttype = $_POST['accounttype'];
if($accounttype == "seller") {
    $sql = "SELECT * FROM sellerdata WHERE email = '$email' and password = '$password'";
}
else {
    $sql = "SELECT * FROM customerdata WHERE email = '$email' and password = '$password'";
}
$result = $conn->query($sql);


if($result->num_rows > 0) {
    $_SESSION['userlogin'] = $email;
    header("location: http://localhost/shoppr/home.html");
}
else {
    echo "Your email or password is invalid";
}
mysqli_close($conn);
?>
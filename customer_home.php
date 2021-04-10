<?php
session_start();
if (!isset($_SESSION['email'])||!isset($_SESSION['account_type']) )
   {
      header("location: login.html");
   }
echo $_SESSION['email'];
echo $_SESSION['account_type'];
echo "<br><a href='logout.php'>LOGOUT</a>";
?>
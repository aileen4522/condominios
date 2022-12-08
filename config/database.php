<?php
$hostname     = "localhost"; // Enter Your Host Name
$username     = "root";      // Enter Your Table username
$password     = "4470292";          // Enter Your Table Password
$databasename = "test"; // Enter Your database Name


$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ="brief7";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed ");
}

?>
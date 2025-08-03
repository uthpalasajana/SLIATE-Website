<?php
  
$dbServer = "localhost";
$dbuser = "root";
$dbpass = "uthpala";
$database = "webcompetition";

//Connect

$conn = mysqli_connect($dbServer, $dbuser, $dbpass, $database);

if (!$conn) {
    die("Connection Faild : " . mysqli_connect_error());
}

?>

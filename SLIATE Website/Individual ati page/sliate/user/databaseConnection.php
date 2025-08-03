<?php
  
$dbServer = "localhost";
$dbuser = "root";
$dbpass = "uthpala";
$database = "webCompetition";

//Connect

$conn = mysqli_connect($dbServer, $dbuser, $dbpass, $database);

if (!$conn) {
    die("Connection Faild : ");
}

?>

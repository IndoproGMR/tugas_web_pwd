<?php
$servernamedb = "Localhost";
$usernamedb = "root";
$passworddb = "";
$dbname = "test";
// Create connection
$conn = mysqli_connect($servernamedb, $usernamedb, $passworddb, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully" . "<br>";

$iplink = "139.99.118.72:7089";
$thn = "2022-";

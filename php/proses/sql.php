<? ob_start(); ?>

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

// variabel untuk link farm dan donatur
$iplink = "139.99.118.72:7089";
$thn = 2022;

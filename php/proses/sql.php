<?php
$servernamedb = "Localhost";
$usernamedb = "id17648367_indoprogmr";
$passworddb = "R9{^Y%_H_58Uj\SS";
$dbname = "test";
// Create connection
$conn = mysqli_connect($servernamedb, $usernamedb, $passworddb, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully" . "<br>";

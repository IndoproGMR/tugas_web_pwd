<? ob_start(); ?>

<?php
$servernamedb = "Localhost"; // lokasi server sql
$usernamedb = "root";
$passworddb = "";
$dbname = "test";
// $usernamedb = "id17648367_indoprogmr";
// $passworddb = "R9{^Y%_H_58Uj\SS";
// $dbname =  "id17648367_furcaf";
// Create connection
$conn = mysqli_connect($servernamedb, $usernamedb, $passworddb, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // koneksi error (biasa nya typo nama db dan username,password)
}
// echo "Connected successfully" . "<br>";

// variabel untuk link farm dan donatur
$iplink = "139.99.118.72:7089"; // link map
$thn = 2022; // thn untuk donatur

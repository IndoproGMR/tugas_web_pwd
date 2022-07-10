<!DOCTYPE html>
<html lang="en">

<!-- NAMA KELOMPOK -->
<!-- 2010651170 ACHMAD NAJI -->
<!-- 2010651165 VIRA SAFITRI SARI -->

<head>
    <link rel="icon" href="foto/favicon.ico" />
    <script src="js/bergerres.js"></script>
    <link rel="stylesheet" href="style/style2.css" />
    <script src="https://kit.fontawesome.com/90facb6ab3.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Input database Server</title>
</head>

<body>
    <?php
    require("../php/proses/nav.php")
    ?>

    <H2>Selamat datang pada Laman utama Furcaf</H2>
    <hr>
    <p>dimana Anda dapat menginputkan data melihat data</p>
    <p>pertama mohon untuk memasukan data sql dangan nama databese "test"</p>
    <p>kedua mohon untuk login terlebih dahulu pada tab akun</p>
    <p>bila mengalami kendala pada login mohon untuk tidak memblok cookie</p>
    <p>bila login tetap bermasalah ada kemungkinan masalah ada pada link</p>
    <p>http://localhost<b>/php/home.php</b></p>
    <p>link yang seharus nya seperti diatas</p>

    <br>
    <br>

    <h4>NAMA KELOMPOK</h4>
    <p>2010651170 ACHMAD NAJI</p>
    <p>2010651165 VIRA SAFITRI SARI</p>




</body>

</html>

<?
require("../php/proses/uuid4.php");
// echo $uuid4;
$string = "SEPTEMBER 2022";
echo $string;
echo "<br>";

$newstring = date("Ym", strtotime($string));
echo "<br>";

echo $newstring;
echo "<br>";


$date =  date("Ym");
echo $date;
echo "<br>";
$time = strtotime("+18 month");
echo date("Ym", $time);
?>
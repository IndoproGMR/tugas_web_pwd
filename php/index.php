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


    <a href="../php/daftar/tempo.php">tempo</a>

</body>

</html>

<?
require("../php/proses/uuid4.php");
// echo $uuid4;
$string = "202201";
echo $string;
echo "<br>";

$newstring = date("m Y", strtotime($string));
echo "<br>";

echo $newstring;
echo "<br>";

$originalDate = "2022-03";
echo "<br>";
echo $originalDate;
$newDate = date("F Y", strtotime($originalDate));
echo "<br>";
echo $newDate;
echo "<br>";


$v1 = "2023-02";
$v2 = "2023-05";

if ($v1 < $v2) {
    echo "jalan1";
} elseif ($v1 > $v2) {
    echo "jalan2";
} else {
    echo "tidak jalan";
}



echo "<br>";

// echo $test;
echo "<br>";

$time = strtotime("+13 month");
echo date("Y-m", $time);
echo "<br>";

echo date("2022-04", $time);

echo "<br>";


$tgl = "2022-";
$test = $tgl . "03";

$month = 2;

$newtimestamp = strtotime("$test + $month month");
echo date('Y-m', $newtimestamp);
echo "<br>";

$tgl = "2022-";
if ($tgl . "03" > "2022-04") {
    echo "jalan";
} else {
    echo "tidak jalan";
}
echo "<br>";
echo "<br>";



// $date =  date("");
// echo $date;
// echo "<br>";
// $time = strtotime("+18 month");
// echo date("Ym", $time);
?>
<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Donatur</title>
</head>

<body>
    <h1>Daftar Donatur</h1>
    <hr>
    <br>
    <!-- --------------- -->
    <link rel="stylesheet" href="../style/table.css">
    <link rel="stylesheet" href="../style/input.css" />
    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/donatur.php" class="btmhome">Input</a>
    <a href="../update/donatur.php" class="btmhome">Update</a>
    <a href="../delete/donatur.php" class="btmhome">Delete</a>
    <a href="../daftar/tempo.php" class="btmhome">Jadwa Tempo</a>
    <button onclick="cetak()" id="btm" class="btmhome">cetak</button>
    <script src="../js/print.js"></script>
    <!-- --------------- -->


    <form action="" method="POST" class="btmhome">
        Bulan:
        <? require("../proses/caribulan.php") ?>


        <input type="submit">

    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Jumlah</th>
            <th>Bulan</th>
        </tr>
        <?php
        require("../proses/ceklogin.php");

        if ($valid) { // menerima signyal validasi dari ceklogin
            if (isset($_POST["bulan"])) {
                $bulan = $_POST["bulan"];

                $cek = $bulan;
                require("../proses/cekinput.php");
                if ($bersih) {

                    if ($bulan !== "*") {
                        echo "<H1>$bulan</H1>";
                        $sql = "SELECT NAME,JUMLAH_DONASI,BULAN FROM DONATUR WHERE `BULAN` = '$bulan' ORDER BY `JUMLAH_DONASI` ASC";
                    } else {
                        echo "<H1>Menampilkan semua Danatur</H1>";
                        $sql = "SELECT NAME,JUMLAH_DONASI,BULAN FROM DONATUR WHERE `BULAN`LIKE '%' ORDER BY `BULAN` ASC";
                    }


                    require("../proses/sql.php");
                    if ($result = mysqli_query($conn, $sql)) { // mencari data

                        if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                            while ($row = mysqli_fetch_array($result)) { // print data 

                                $nama =  htmlspecialchars($row['NAME']);
                                $jumlah =  htmlspecialchars($row['JUMLAH_DONASI']);
                                $jumlah = number_format($jumlah, 2, ",", ".");
                                $bulan = date("F Y", strtotime(htmlspecialchars($row['BULAN'])));

                                echo "<tr>";

                                echo "<td>" . $nama . "</td>";
                                echo "<td> Rp. " . $jumlah . "</td>";
                                echo "<td>" . $bulan . "</td>";

                                echo "</tr>";
                            }
                        }
                    }

                    //
                } else {
                    header("Location: ../login/logout.php");
                }
            }
        } else {
            header("Location: /php/login");
        }
        ?>
    </table>

</body>

</html>
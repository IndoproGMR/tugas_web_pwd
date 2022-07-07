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
    <button onclick="cetak()" id="btm" class="btmhome">cetak</button>
    <script src="../js/print.js"></script>
    <!-- --------------- -->


    <form action="" method="POST" class="btmhome">
        Bulan:
        <div>
            <select name="bulan" id="bulan">
                <option value="*">Tampilakan Semua Donatur</option>
                <option value="MARET 2022">MARET 2022</option>
                <option value="APRIL 2022">APRIL 2022</option>
                <option value="MEI 2022">MEI 2022</option>
                <option value="JUNI 2022" selected>JUNI 2022</option>
                <option value="JULI 2022">JULI 2022</option>
                <option value="AGUSTUS 2022">AGUSTUS 2022</option>
                <option value="SEPTEMBER 2022">SEPTEMBER 2022</option>
                <option value="OKTOBER 2022">OKTOBER 2022</option>
                <option value="NOVEMBER 2022">NOVEMBER 2022</option>
                <option value="DESEMBER 2022">DESEMBER 2022</option>
                <option value="JANUARI 2023">JANUARI 2023</option>
                <option value="FEBRUARI 2023">FEBRUARI 2023</option>
                <option value="MARET 2023">MARET 2023</option>
            </select>
        </div>

        <input type="submit">

    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>jumlah</th>
            <th>bulan</th>
        </tr>
        <?php
        // require("../proses/ceklogin.php");
        if (isset($_POST["bulan"])) {
            $bulan = $_POST["bulan"];
            if ($bulan !== "*") {
                echo "<H1>$bulan</H1>";
                $sql = "SELECT NAME,JUMLAH_DONASI,BULAN FROM DONATUR WHERE `BULAN` = '$bulan' ORDER BY `JUMLAH_DONASI` ASC";
            } else {
                echo "<H1>Menampilkan semua Danatur</H1>";
                $sql = "SELECT NAME,JUMLAH_DONASI,BULAN FROM DONATUR WHERE `BULAN`LIKE '% 2022' ORDER BY `TGL_DONASI` ASC";
            }

            require("../proses/sql.php");
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $nama =  htmlspecialchars($row['NAME']);
                        $jumlah =  htmlspecialchars($row['JUMLAH_DONASI']);
                        $bulan = htmlspecialchars($row['BULAN']);

                        echo "<tr>";

                        echo "<td>" . $nama . "</td>";
                        echo "<td> Rp. " . $jumlah . "</td>";
                        echo "<td>" . $bulan . "</td>";

                        echo "</tr>";
                    }
                }
            }
        }

        ?>
    </table>

</body>

</html>
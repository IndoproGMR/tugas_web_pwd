<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Farm</title>
</head>

<body>
    <h1>Daftar Farm</h1>
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
        Nama: <? require("../proses/carinama.php") ?>
        Bulan:
        <div>
            <select name="world" id="world">
                <option value="*" selected>Tampilakan Semua Map</option>
                <option value="_overworld">OverWorld</option>
                <option value="_nether">Nether</option>
                <option value="_the_end">The End</option>
            </select>
        </div>

        <input type="submit">

    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Nama Farm</th>
            <th>Jenis Farm</th>
            <th>Ukuran</th>

            <th>World</th>
            <th>Diskripsi</th>
            <th>pajak</th>
            <th>Link</th>
        </tr>
        <?php
        if (isset($_POST["world"]) || isset($_POST['namaplayer'])) {

            $nama = $_POST['namaplayer'];
            $world = $_POST['world'];

            $cek = $nama;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $world;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }


            $sqllink = "SELECT NAME, NAMA_FARM, NAMA_JENIS_FARM, DESKRIPSI, UKURAN, WORLD , Z, X, PAJAK
            FROM FARM F INNER JOIN JENIS_FARM J
            ON (F.ID_JENIS_FARM = J.ID_JENIS_FARM)
            WHERE ";

            echo "<br>";

            if ($nama !== "1542") {
                $sqllink = $sqllink . "F.NAME = '$nama' AND ";
            }

            if ($world === "*") {
                $sql = $sqllink . "F.WORLD LIKE '_%';";
            } else {
                $sql = $sqllink . "F.WORLD = '$world';";
            }
            // echo $sql;
            require("../proses/sql.php");


            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $nama =  htmlspecialchars($row['NAME']);
                        $nf =  htmlspecialchars($row['NAMA_FARM']);
                        $jf =  htmlspecialchars($row['NAMA_JENIS_FARM']);
                        $ukuran =  htmlspecialchars($row['UKURAN']);

                        $world =  htmlspecialchars($row['WORLD']);
                        $diskr =  htmlspecialchars($row['DESKRIPSI']);
                        $pajak =  htmlspecialchars($row['PAJAK']);


                        $Z =  htmlspecialchars($row['Z']);
                        $X =  htmlspecialchars($row['X']);

                        $link = "http://" . $iplink . "/?worldname=DUNIA%20DALAM%20BERITA" . $world . "&mapname=flat&zoom=4&x=" . $X . "&y=64&z=" . $Z;

                        echo "<tr>";

                        echo "<td>" . $nama . "</td>";
                        echo "<td>" . $nf . "</td>";
                        echo "<td>" . $jf . "</td>";
                        echo "<td>" . $ukuran . "</td>";

                        echo "<td>" . $world . "</td>";
                        echo "<td>" . $pajak . "</td>";
                        echo "<td>" . $diskr . "</td>";

                        echo "<td> <a href='$link' target='_blank'>Link</a> </td>";

                        echo "</tr>";
                    }
                }
            }


            /////
        }








        // // require("../proses/ceklogin.php");

        // }

        ?>
    </table>

</body>

</html>
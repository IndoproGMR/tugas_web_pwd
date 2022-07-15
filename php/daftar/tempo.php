<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Level</title>
</head>

<body>




    <link rel="stylesheet" href="../style/input.css" />


    <style>
        table {
            padding: 1rem 0.5rem;
            width: 100%;
            border: 1px solid #cccccc;
        }

        tr {
            margin: 8px 0;
            padding: 10px;
            border: 1px solid #cccccc;
            text-align: center;
            width: 50%;
        }

        .Y>td {
            color: #cccccc;
            background-color: red;
        }

        th {
            font-size: 25px;
            padding: 10px;
            background-color: #aaffff;
            border: 1px solid #cccccc;
        }

        td {
            font-size: 15px;
            padding: 10px;
            border: 1px solid #cccccc;
            background-color: #aaaaff;
        }

        .ijo {
            background-color: #2dbe10;
        }

        .grey {
            background-color: #dbdbdb;
        }

        .red {
            background-color: #ff9d9d;
        }

        th {
            font-size: small;
            width: 30px;
        }

        td {
            font-size: small;

            width: 30px;
        }
    </style>

    <div class="table" style>

        <h1>Daftar Jadwal Tagihan</h1>
        <hr>
        <!-- --------------- -->
        <link rel="stylesheet" href="../style/table.css">
        <link rel="stylesheet" href="../style/input.css" />
        <a href="../home.php" class="btmhome">home</a>
        <a href="../input/donatur.php" class="btmhome">Input</a>
        <a href="../update/donatur.php" class="btmhome">Update</a>
        <a href="../delete/donatur.php" class="btmhome">Delete</a>
        <a href="../daftar/donatur.php" class="btmhome">Daftar</a>
        <button onclick="cetak()" id="btm" class="btmhome">cetak</button>
        <script src="../js/print.js"></script>
        <!-- --------------- -->
        <!-- <br>
    <a href="../home.php" class="btmhome">home</a>
    <br>
    <br> -->


        <table>
            <tr>
                <th>Nama</th>

                <th>January</th>
                <th>febuary</th>
                <th>Maret</th>
                <th>April</th>
                <th>Mei</th>
                <th>Juni</th>

                <th>Juli</th>
                <th>Agustus</th>
                <th>September</th>
                <th>Oktober</th>
                <th>Novermber</th>
                <th>Desember</th>

                <!-- <th>Donasi</th> -->
                <!-- <th>tempo</th> -->
                <!-- <th>bulan</th> -->


            </tr>

            <?php
            require("../proses/ceklogin.php");

            if ($valid) { // menerima signyal validasi dari ceklogin



                $bulanini = date("Ym");

                require("../proses/sql.php");
                $sql = "SELECT NAME FROM DONATUR GROUP BY NAME";
                $namaar = array();
                if ($result = mysqli_query($conn, $sql)) { // mencari data

                    if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                        while ($row = mysqli_fetch_assoc($result)) { // print data 
                            $namaar[] = $row['NAME'];
                        }
                        // echo count($namaar);
                        for ($i = 0; $i < count($namaar); $i++) {
                            // echo $namaar[$i];
                            $sql = "select NAME, BULAN, JUMLAH_DONASI, ID_DONASI
                                from DONATUR
                                where ID_DONASI = (
                                SELECT ID_DONASI
                                FROM DONATUR
                                WHERE NAME = '$namaar[$i]'
                                ORDER by BULAN desc limit 1
                                )";

                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) { // bila data diatas 0
                                    while ($row = mysqli_fetch_array($result)) { // print data 
                                        $nama =  htmlspecialchars($row['NAME']);
                                        $bulan =  htmlspecialchars($row['BULAN']);
                                        $jum =  htmlspecialchars($row['JUMLAH_DONASI']);
                                        $id =  htmlspecialchars($row['ID_DONASI']);




                                        // $temporound = (round($jum, -4) / 10000) - 1;
                                        $temporound = floor($jum / 10000) - 1;
                                        // echo "<br>";
                                        // echo $temporound;
                                        // echo "<br>";



                                        $newtimestamp = strtotime("$bulan + $temporound month");
                                        $tempo = date('Ym', $newtimestamp);
                                        $tempo = intval($tempo);


                                        // debug
                                        // $bulanini = 202512;
                                        // $thn = 2021;


                                        echo "<tr>";

                                        echo "<td>" . $nama . "</td>";

                                        // januari
                                        if ("$thn" . "01" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            // echo "<td class='ijo'>$jum</td>";
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "01" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "01" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // febuary
                                        if ("$thn" . "02" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            // echo "<td class='ijo'>$tempo</td>";
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "02" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "02" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // maret
                                        if ("$thn" . "03" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            // echo "<td class='ijo'>$temporound</td>";
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "03" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "03" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // april
                                        if ("$thn" . "04" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "04" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "04" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // mei
                                        if ("$thn" . "05" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "05" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "05" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // juni
                                        if ("$thn" . "06" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "06" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "06" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // juli
                                        if ("$thn" . "07" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "07" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "07" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // agustus
                                        if ("$thn" . "08" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "08" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "08" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // sebtember
                                        if ("$thn" . "09" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "09" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "09" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // oktober
                                        if ("$thn" . "10" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "10" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "10" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // Novermber
                                        if ("$thn" . "11" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "11" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "11" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }

                                        // desember
                                        if ("$thn" . "12" <= $tempo) { // bila bulan lebih kecil dari tempo maka beri tanda hijau
                                            echo "<td class='ijo'></td>";
                                        } elseif ("$thn" . "12" > $bulanini) {
                                            echo "<td class='grey'></td>";
                                        } elseif ("$thn" . "12" >= $tempo) { // bila bulan lebih besar dari tempo maka beri tanda merah
                                            echo "<td class='red'></td>";
                                        }


                                        // debug
                                        // echo "<td>" . $jum . "</td>";

                                        // echo "<td>" . $tempo . "</td>";
                                        // echo "<td>" . $bulan . "</td>";
                                        // echo "<td>" . $id . "</td>";

                                        echo "</tr>";
                                    }
                                }
                            }
                        }
                        // ku garap ginian mau nangis TwT
                    }
                }
            } else {
                header("Location: ../login");
            }
            ?>
        </table>
    </div>

</body>

</html>
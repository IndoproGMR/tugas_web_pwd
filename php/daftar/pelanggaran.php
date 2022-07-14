<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggaran</title>
</head>

<body>
    <h1>Daftar Pelanggaran</h1>
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

        <input type="submit">

    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Rule yang di langgar</th>
            <th>Sangsi</th>
            <th>Lama Hukuman</th>
        </tr>
        <?php
        if (isset($_POST['namaplayer'])) {

            $nama = $_POST['namaplayer'];

            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) {


                $sqllink = "SELECT NAME, RULENAME, HUKUMAN, LAMA
            FROM PELANGGARAN P
            INNER JOIN RULE R
            ON P.IDRULE = R.IDRULE
            INNER JOIN HUKUMAN H
            ON P.IDHUKUM = H.IDHUKUM ";
                // WHERE P.NAME = 'RiveraMaxwell'
                //ORDER BY P.NAME";

                echo "<br>";

                if ($nama !== "1542") {
                    $sql = $sqllink . "WHERE P.NAME = '$nama' ORDER BY P.NAME ";
                } else {
                    $sql = $sqllink . "ORDER BY P.NAME;";
                }
                // echo $sql;
                require("../proses/sql.php");


                if ($result = mysqli_query($conn, $sql)) { // mencari data

                    if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                        while ($row = mysqli_fetch_array($result)) { // print data 

                            $nama =  htmlspecialchars($row['NAME']);
                            $rn =  htmlspecialchars($row['RULENAME']);
                            $sangsi =  htmlspecialchars($row['HUKUMAN']);
                            $lama =  htmlspecialchars($row['LAMA']);


                            echo "<tr>";

                            echo "<td>" . $nama . "</td>";
                            echo "<td>" . $rn . "</td>";
                            echo "<td>" . $sangsi . "</td>";
                            echo "<td>" . $lama . "</td>";


                            echo "</tr>";
                        }
                    }
                }
            } else {
                header("Location: ../login/logout.php");
            }

            /////
        }








        // // require("../proses/ceklogin.php");

        // }

        ?>
    </table>

</body>

</html>
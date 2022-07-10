<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Donatur</title>
</head>

<body>
    <h1>Ubah Donatur</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama Donatur: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='idlevel' id='lvl' value=''>";
            $sql = "SELECT ID_DONASI, NAME, NAMATINGKATAN, BULAN, JUMLAH_DONASI FROM DONATUR D INNER JOIN DONATUR_LVL L ON (D.IDDLVL = L.IDDLVL) ORDER BY D.NAME";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['ID_DONASI']);
                        $nama = htmlspecialchars($row['NAME']);
                        $level = htmlspecialchars($row['NAMATINGKATAN']);
                        $bulan = htmlspecialchars($row['BULAN']);
                        $jumlah = htmlspecialchars($row['JUMLAH_DONASI']);
                        $jumlah = number_format($jumlah, 2, ",", ".");



                        if ($nama == $nama) {
                            echo "<option value='$ID'>$nama - ($level) - ($bulan) - (Rp. $jumlah)</option>";
                        } else {
                            echo "<option value='$ID'>$nama - ($level) - ($bulan) - (Rp. $jumlah)</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Donatur Level:
        <div>
            <?php
            require("../proses/sql.php");
            echo "<select name='lvl' id='lvl' value=''>";
            $sql = "SELECT * FROM DONATUR_LVL";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $IDDLVL = htmlspecialchars($row['IDDLVL']);
                        $nama = htmlspecialchars($row['NAMATINGKATAN']);

                        if ($nama == $nama) {
                            echo "<option value='$IDDLVL'>$nama</option>";
                        } else {
                            echo "<option value='$IDDLVL'>$nama</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Bulan:
        <? require("../proses/caribulan.php") ?>
        Jumlah Donasi:
        <input type="number" name="donasi" placeholder="50000">
        <br>
        <input type="submit" value="update">
    </form>



    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/donatur.php" class="btmhome">Input</a>
    <a href="../daftar/donatur.php" class="btmhome">Daftar</a>
    <a href="../delete/donatur.php" class="btmhome">Delete</a>





    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        // echo "1";


        if (isset($_POST["idlevel"]) && isset($_POST["donasi"]) && isset($_POST["bulan"]) && isset($_POST["lvl"])) {
            // echo "2";

            $idlevel = $_POST["idlevel"];
            $donasi = $_POST['donasi'];
            $lvl = $_POST['lvl'];
            $bulan = $_POST["bulan"];


            $cek = $idlevel;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $donasi;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $lvl;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $bulan;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }


            if ($idlevel != 1542) {

                if ($donasi !== '') {
                    $donasia = ", JUMLAH_DONASI = '$donasi'";
                } else {
                    $donasia = "";
                }

                if ($lvl != "1542") {
                    if ($lvl !== '') {
                        $lvla = ", IDDLVL = '$lvl'";
                    }
                } else {
                    $lvla = "";
                }


                if ($bulan !== '') {
                    $bulana = " BULAN = '$bulan'";
                } else {
                    $bulana = "";
                }


                // echo $nicka;
                // $sql = "UPDATE `DONATUR` SET `SOFTBAN`= '$softban' $nicka WHERE ID_DONASI = '$ID'";

                $sql = "UPDATE `DONATUR` SET $bulana $donasia $lvla WHERE ID_DONASI = '$idlevel'";


                // echo $sql;

                // echo "jalan";
                if ($conn->query($sql) === TRUE) {
                    echo "Player <strong>" . $nama . "</strong> telah di Update ke dalam database" . "<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            //////////////
        }
    } else {
        header("Location: /php/login");
    }
    ?>


</body>

</html>
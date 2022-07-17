<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Donatur</title>
</head>

<body>
    <h1>Delete Donatur</h1>
    <hr>
    <form action="" method="post">
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
        <? require('../proses/confirm.php') ?>
        <br>
        <input type="submit">
    </form>
    <!-- <script src="../js/select.js"></script> -->


    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/donatur.php" class="btmhome">Input</a>
    <a href="../update/donatur.php" class="btmhome">Update</a>
    <a href="../daftar/donatur.php" class="btmhome">Daftar</a>




    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo $_POST["confirmasi"];

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (isset($_POST["confirmasi"])) {
            $confirm = $_POST["confirmasi"];
            if ($confirm === "true") {

                if (isset($_POST['idlevel'])) {
                    $nama = $_POST['idlevel'];

                    $cek = $nama;
                    require("../proses/cekinput.php");
                    if (!$bersih) {
                        header("Location: /php/login/logout.php");
                    }

                    if ($nama != 1542) {

                        $delete = "DELETE FROM `DONATUR` WHERE ID_DONASI='$nama'";

                        // echo $delete;

                        if ($conn->query($delete) === TRUE) {
                            echo "Player <strong>" . $nama . "</strong> telah di hapus dari database" . "<br>";
                        } else {
                            echo "Error: " . $delete . "<br>" . $conn->error;
                        }
                    } else {
                        header("Location: ../delete/donatur.php?masukan_nama");
                    }
                }
            } else {
                echo "<h3>Mohon Centang confirmasi</h3>";
            }
        } else {
            echo "<h3>Mohon Centang confirmasi</h3>";
        }
    } else {
        header("Location: /php/login/logout.php");
    }
    // require('../daftar/player.php');
    ?>



</body>

</html>
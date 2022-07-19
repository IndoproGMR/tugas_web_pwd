<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Donatur lvl</title>
</head>

<body>
    <h1>Delete Donatur lvl</h1>
    <hr>
    <form action="" method="post">
        Nama lvl: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='donasi' id='lvl' value=''>";
            $sql = "SELECT * FROM DONATUR_LVL";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['IDDLVL']);
                        $nama = htmlspecialchars($row['NAMATINGKATAN']);
                        $diskr = htmlspecialchars($row['DISKRIPSI']);

                        echo "<option value='$ID'>$ID - ($nama) - ($diskr)</option>";
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


    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/donatur_lvl.php" class="btmhome">Input</a>
    <a href="../update/donatur_lvl.php" class="btmhome">Update</a>
    <a href="../daftar/donatur_lvl.php" class="btmhome">Daftar</a>

    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (isset($_POST["confirmasi"])) {
            $confirm = $_POST["confirmasi"];
            if ($confirm === "true") {

                if (isset($_POST['donasi'])) {
                    $nama = $_POST['donasi'];

                    $cek = $nama;
                    require("../proses/cekinput.php");
                    if (!$bersih) {
                        header("Location: /php/login/logout.php");
                    }

                    if ($nama != 1542) {

                        $delete = "DELETE FROM `DONATUR_LVL` WHERE IDDLVL='$nama'";

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
    ?>



</body>

</html>
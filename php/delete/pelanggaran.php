<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pelanggaran</title>
</head>

<body>
    <h1>Delete Pelanggaran</h1>
    <hr>
    <form action="" method="post">
        Nama Pelanggar: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='idp' id='lvl' value=''>";
            $sql = "SELECT ID_PELANGGARAN, NAME, RULENAME, HUKUMAN, LAMA FROM PELANGGARAN P INNER JOIN RULE R ON P.IDRULE = R.IDRULE INNER JOIN HUKUMAN H ON P.IDHUKUM = H.IDHUKUM ORDER BY P.NAME";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['ID_PELANGGARAN']);
                        $nama = htmlspecialchars($row['NAME']);
                        $rn = htmlspecialchars($row['RULENAME']);
                        $huk = htmlspecialchars($row['HUKUMAN']);
                        $lama = htmlspecialchars($row['LAMA']);

                        echo "<option value='$ID'>$nama - ($rn) - ($huk) - ($lama)</option>";
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
    <a href="../input/pelanggaran.php" class="btmhome">Input</a>
    <a href="../update/pelanggaran.php" class="btmhome">Update</a>
    <a href="../daftar/pelanggaran.php" class="btmhome">Daftar</a>

    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (isset($_POST["confirmasi"])) {
            $confirm = $_POST["confirmasi"];
            if ($confirm === "true") {

                if (isset($_POST['idp'])) {
                    $nama = $_POST['idp'];

                    $cek = $nama;
                    require("../proses/cekinput.php");
                    if (!$bersih) {
                        header("Location: /login/logout.php");
                    }

                    if ($nama != 1542) {

                        $delete = "DELETE FROM `PELANGGARAN` WHERE ID_PELANGGARAN='$nama'";
                        // echo $delete;

                        if ($conn->query($delete) === TRUE) {
                            echo "Player <strong>" . $nama . "</strong> telah di hapus dari database" . "<br>";
                        } else {
                            echo "Error: " . $delete . "<br>" . $conn->error;
                        }
                    }
                }

                /////
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
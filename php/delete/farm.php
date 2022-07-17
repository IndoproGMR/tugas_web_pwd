<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete farm</title>
</head>

<body>
    <h1>Delete farm</h1>
    <hr>
    <form action="" method="post">
        Nama Pemilik: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='namaplayer' id='' value=''>";
            $sql = "SELECT * FROM FARM";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['UUID_FARM']);
                        $nama = htmlspecialchars($row['NAME']);
                        $idfarm = htmlspecialchars($row['ID_JENIS_FARM']);
                        $nf = htmlspecialchars($row['NAMA_FARM']);
                        $diskr = htmlspecialchars($row['DESKRIPSI']);
                        $ukuran = htmlspecialchars($row['UKURAN']);
                        $world = htmlspecialchars($row['WORLD']);
                        $Z = htmlspecialchars($row['Z']);
                        $X = htmlspecialchars($row['X']);

                        echo "<option value='$ID'>$nama - ($idfarm) - ($nf) - ($diskr) - ($ukuran) - ($world) - ($Z)($X)</option>";
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
    <a href="../input/farm.php" class="btmhome">Input</a>
    <a href="../update/farm.php" class="btmhome">Update</a>
    <a href="../daftar/farm.php" class="btmhome">Daftar</a>




    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (isset($_POST["confirmasi"])) {
            $confirm = $_POST["confirmasi"];
            if ($confirm === "true") {




                if (isset($_POST['namaplayer'])) {
                    $nama = $_POST['namaplayer'];

                    $cek = $nama;
                    require("../proses/cekinput.php");
                    if (!$bersih) {
                        header("Location: /login/logout.php");
                    }

                    if ($nama != 1542) {
                        // echo "4 ";
                        // echo "jalan";
                        // echo $nama;

                        $delete = "DELETE FROM `FARM` WHERE UUID_FARM='$nama'";
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
    // require('../daftar/player.php');
    ?>



</body>

</html>
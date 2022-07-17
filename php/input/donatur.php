<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Donatur</title>
</head>

<body>
    <h1>Input Donatur</h1>
    <hr>
    <form action="" method="post">
        Nama: <span class="required">*</span>
        <? require_once("../proses/carinama.php"); ?>
        Donatur Level: <span class="required">*</span>
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
        Bulan: <span class="required">*</span>
        <? require_once("../proses/caribulan.php") ?>

        Jumlah Donasi: <span class="required">*</span>
        <input type="number" name="donasi" placeholder="50000" required>
        <br>


        <input type="submit">

        </div>


    </form>
    <script src="../js/select.js"></script>


    <a href="../home.php" class="btmhome">home</a>
    <a href="../update/donatur.php" class="btmhome">Update</a>
    <a href="../delete/donatur.php" class="btmhome">Delete</a>
    <a href="../daftar/donatur.php" class="btmhome">Daftar</a>


    ..

    <?php
    require("../proses/ceklogin.php");
    if ($valid) { // menerima signyal validasi dari ceklogin
        if (
            isset($_POST["namaplayer"]) &&
            isset($_POST["lvl"]) &&
            isset($_POST["bulan"]) &&
            isset($_POST["donasi"])
        ) {
            $nama = $_POST['namaplayer'];
            $lvl = $_POST['lvl'];
            $bulan = $_POST['bulan'];
            $donasi = $_POST["donasi"];

            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $lvl;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $bulan;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        $cek = $donasi;
                        require("../proses/cekinput.php");
                        if ($bersih) {

                            $idrandom = random_int(0, 99999999);

                            // echo "jalan";
                            $sql = "INSERT INTO DONATUR (ID_DONASI,IDDLVL,NAME, BULAN, JUMLAH_DONASI,TGL_DONASI)
                                    VALUES ('$idrandom', '$lvl','$nama', '$bulan','$donasi',NOW())";

                            // echo $sql;
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database dengan jumlah Rp <strong>" . $donasi . "</strong><br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }


                            ////////
                        } else {
                            header("Location: ../login/logout.php");
                        }
                    } else {
                        header("Location: ../login/logout.php");
                    }
                } else {
                    header("Location: ../login/logout.php");
                }
            } else {
                header("Location: ../login/logout.php");
            }
        }
    } else {
        header("Location: ../login/");
    }
    ?>


</body>

</html>
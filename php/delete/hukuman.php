<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Hukuman</title>
</head>

<body>
    <h1>Delete Hukuman</h1>
    <hr>
    <form action="" method="post">
        Nama Sangsi:
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='sangsi' id='lvl' value=''>";
            $sql = "SELECT * FROM HUKUMAN";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['IDHUKUM']);
                        $nama = htmlspecialchars($row['HUKUMAN']);
                        $diskr = htmlspecialchars($row['DISKRIPSI_HUKUMAN']);

                        if ($nama == $nama) {
                            echo "<option value='$ID'>$ID - ($nama) - ($diskr)</option>";
                        } else {
                            echo "<option value='$ID'>$ID - ($nama) - ($diskr)</option>";
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

    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/hukuman.php" class="btmhome">Input</a>
    <a href="../update/hukuman.php" class="btmhome">Update</a>
    <a href="../daftar/hukuman.php" class="btmhome">Daftar</a>




    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (isset($_POST["confirmasi"])) {
            $confirm = $_POST["confirmasi"];
            if ($confirm === "true") {




                if (isset($_POST['sangsi'])) {
                    $nama = $_POST['sangsi'];

                    $cek = $nama;
                    require("../proses/cekinput.php");
                    if (!$bersih) {
                        header("Location: /login/logout.php");
                    }

                    if ($nama != 1542) {
                        // echo "4 ";
                        // echo "jalan";
                        // echo $nama;

                        $delete = "DELETE FROM `HUKUMAN` WHERE IDHUKUM='$nama'";
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
        header("Location: /login/");
    }
    // require('../daftar/player.php');
    ?>



</body>

</html>
<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Player</title>
</head>

<body>
    <h1>Delete player</h1>
    <hr>
    <form action="" method="post">
        nama: <? require("../proses/carinama.php") ?>
        <br>
        <? require('../proses/confirm.php') ?>
        <br>
        <input type="submit">
    </form>
    <!-- <script src="../js/select.js"></script> -->


    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/player.php" class="btmhome">Input</a>
    <a href="../update/player.php" class="btmhome">Update</a>
    <a href="../daftar/player.php" class="btmhome">Daftar</a>




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

                        $delete = "DELETE FROM `PLAYER` WHERE NAME='$nama'";
                        echo $delete;



                        // if ($conn->query($delete) === TRUE) {
                        //     echo "Player <strong>" . $nama . "</strong> telah di hapus dari database" . "<br>";
                        // } else {
                        //     echo "Error: " . $delete . "<br>" . $conn->error;
                        // }
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
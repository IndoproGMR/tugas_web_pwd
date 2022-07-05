<!DOCTYPE html>
<html lang="en">

<head>
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
        <!-- uuid: <input type="text" name="UUID" id="UUID" placeholder="2b430-1wa..." required> -->
        <? require('../proses/confirm.php') ?>
        <br>
        <input type="submit">
    </form>
    <!-- <script src="../js/select.js"></script> -->


    <a href="../home.php" class="btmhome">home</a>




    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo $_POST["confirmasi"];


    if (isset($_POST["confirmasi"])) {
        $confirm = $_POST["confirmasi"];
        if ($confirm === "true") {
            // echo "string";


            // <code>







            // echo "0";

            if ($valid) { // menerima signyal validasi dari ceklogin
                // echo "1";


                // if (isset($_POST["nama"]) && isset($_POST["uuid"])) {
                // echo "2";
                if (isset($_POST['namaplayer'])) {
                    // echo "3";
                    $nama = $_POST['namaplayer'];
                    // $uuid = $_POST['uuid'];
                    // $softban = $_POST["softban"];


                    $cek = $nama;
                    require("../proses/cekinput.php");
                    if ($bersih) { // cek nama
                        if ($nama != 1542) {
                            // echo "4 ";
                            // echo "jalan";
                            // echo $nama;

                            $delete = "DELETE FROM `PLAYER` WHERE NAME='$nama'";
                            if ($conn->query($delete) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di hapus dari database" . "<br>";
                            } else {
                                echo "Error: " . $delete . "<br>" . $conn->error;
                            }
                        }
                    }
                }
                // }
            } else {
                header("Location: /php/login");
            }
        } else {
            echo "<h3>Mohon Centang confirmasi</h3>";
        }
    } else {
        echo "<h3>Mohon Centang confirmasi</h3>";
    }
    require('../daftar/player.php');
    ?>



</body>

</html>
<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Player</title>
</head>

<body>
    <h1>Ubah player</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama: <? require_once("../proses/carinama.php") ?>
        Nickname: <input type="text" name="nick" placeholder="Player Name" maxlength="64">
        <br>
        SoftBan:
        <div class="custom-select">
            <select name="softban">
                <option value="N" selected>Softban ? (default: no)</option>
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
        </div>
        <br>
        <input type="submit" value="update">
    </form>
    <script src="../js/select.js"></script>


    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/player.php" class="btmhome">Input</a>
    <a href="../daftar/player.php" class="btmhome">Daftar</a>
    <a href="../delete/player.php" class="btmhome">Delete</a>





    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (
            isset($_POST["namaplayer"]) &&
            isset($_POST["softban"]) &&
            isset($_POST["nick"])
        ) {

            $nama = $_POST['namaplayer'];
            $nick = $_POST['nick'];
            $softban = $_POST["softban"];

            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $nick;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $softban;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        if ($nama != 1542) {

                            if ($nick !== '') {
                                $nicka = ", NICKNAME = '$nick'";
                            } else {
                                $nicka = "";
                            }
                            $sql = "UPDATE `PLAYER` SET `SOFTBAN`= '$softban' $nicka WHERE NAME = '$nama'";
                            // echo $sql;
                            // echo "jalan";
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di Update ke dalam database" . "<br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            header("Location: ../update/player.php?masukan_nama");
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
            //////////////
        }
    } else {
        header("Location: /php/login");
    }
    ?>


</body>

</html>
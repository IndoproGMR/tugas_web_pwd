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
        Nama: <? require("../proses/carinama.php") ?>
        Nickname: <input type="text" name="nick" placeholder="Player Name">
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
        <input type="submit">
    </form>
    <script src="../js/select.js"></script>


    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/player.php" class="btmhome">Input</a>
    <a href="../daftar/player.php" class="btmhome">Daftar</a>
    <a href="../delete/player.php" class="btmhome">Delete</a>





    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        // echo "1";


        if (isset($_POST["namaplayer"]) && isset($_POST["softban"]) && isset($_POST["nick"])) {
            // echo "2";


            $nick = $_POST['nick'];
            $nama = $_POST['namaplayer'];
            $softban = $_POST["softban"];


            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) { // cek nama

                // echo "4";
                $cek = $softban;
                require("../proses/cekinput.php");
                if ($bersih) { // cek softban

                    // echo "5";
                    $cek = $nick;
                    require("../proses/cekinput.php");
                    if ($bersih) { // cek nick

                        if ($nama != 1542) {





                            if ($nick !== '') {
                                $nicka = ", NICKNAME = '$nick'";
                            } else {
                                $nicka = "";
                            }


                            // echo $nicka;
                            $sql = "UPDATE `PLAYER` SET `SOFTBAN`= '$softban' $nicka WHERE NAME = '$nama'";

                            // echo $sql;

                            // echo "jalan";
                            //$sql = "INSERT INTO PLAYER (NAME, UUID, SOFTBAN,NICKNAME) VALUES ('$nama', '$uuid', '$softban','$nick')";
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di Update ke dalam database" . "<br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        //////////////
                    } else {
                        header("Location: /php/login/logout.php"); //awto logout
                        echo " kotor 4 ";
                    }
                } else {
                    header("Location: /php/login/logout.php"); //awto logout
                    echo " kotor 3 ";
                }
            } else {
                header("Location: /php/login/logout.php"); //awto logout
                echo " kotor ";
            }
        }
    } else {
        header("Location: /php/login");
    }
    ?>


</body>

</html>
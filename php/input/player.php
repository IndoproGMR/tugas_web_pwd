<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Player</title>
</head>

<body>
    <h1>Input player baru</h1>
    <hr>
    <form action="" method="post">
        Nickname: <input type="text" name="nick" placeholder="Player Name">
        <br>
        Nama: <input type="text" name="nama" placeholder="Player Name" required>
        <br>
        UUID: <input type="text" name="uuid" placeholder="2b430-1wa..." required>
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
    <a href="../daftar/player.php" class="btmhome">Daftar</a>




    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        // echo "1";


        if (isset($_POST["nama"]) && isset($_POST["uuid"]) && isset($_POST["nick"])) {
            // echo "2";


            $nick = $_POST['nick'];
            $nama = $_POST['nama'];
            $uuid = $_POST['uuid'];
            $softban = $_POST["softban"];


            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) { // cek nama

                // echo "3";
                $cek = $uuid;
                require("../proses/cekinput.php");
                if ($bersih) { // cek uudi

                    // echo "4";
                    $cek = $softban;
                    require("../proses/cekinput.php");
                    if ($bersih) { // cek softban

                        // echo "5";
                        $cek = $nick;
                        require("../proses/cekinput.php");
                        if ($bersih) { // cek nick

                            // echo "jalan";
                            $sql = "INSERT INTO PLAYER (NAME, UUID, SOFTBAN,NICKNAME)
                            VALUES ('$nama', '$uuid', '$softban','$nick')";
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database" . "<br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
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
                    echo " kotor 2 ";
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
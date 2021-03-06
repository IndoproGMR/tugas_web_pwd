<? ob_start(); ?>

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
        Nickname:
        <input type="text" name="nick" placeholder="Player Name" maxlength="64">
        <br>
        Nama: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Player Name" maxlength="64" required>
        <br>
        UUID: <span class="required">*</span>
        <input type="text" name="uuid" placeholder="2d162166-1wa..." maxlength="40" required>
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
    <a href="../update/player.php" class="btmhome">Update</a>
    <a href="../delete/player.php" class="btmhome">Delete</a>
    <a href="../daftar/player.php" class="btmhome">Daftar</a>




    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin


        if (
            isset($_POST["nama"]) &&
            isset($_POST["uuid"]) &&
            isset($_POST["nick"])
        ) {

            $nick = $_POST['nick'];
            $nama = $_POST['nama'];
            $uuid = $_POST['uuid'];
            $softban = $_POST["softban"];

            $cek = $nick;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $nama;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $uuid;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        $cek = $softban;
                        require("../proses/cekinput.php");
                        if ($bersih) {

                            // echo "jalan";
                            $sql = "INSERT INTO PLAYER (NAME, UUID, SOFTBAN,NICKNAME)
                            VALUES ('$nama', '$uuid', '$softban','$nick')";
                            // echo $sql;
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database" . "<br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
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
            } else {
                header("Location: ../login/logout.php");
            }
            ////
        }
    } else {
        header("Location: ../login");
    }
    ?>


</body>

</html>
<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah LVl</title>
</head>

<body>
    <h1>Ubah Donatur level</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama lvl: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='donasi' id='lvl' value=''>";
            $sql = "SELECT * FROM DONATUR_LVL";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['IDDLVL']);
                        $nama = htmlspecialchars($row['NAMATINGKATAN']);
                        $diskr = htmlspecialchars($row['DISKRIPSI']);

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
        Nama Donasi: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Nama Level (Donatur +)" required>
        <br>
        Diskripsi:
        <textarea name="diskr" placeholder="Donatur +  yang telah berdonasi diatas 100k"></textarea>
        <br>
        <input type="submit" value="update">
    </form>


    <a href=" ../home.php" class="btmhome">home</a>
    <a href="../input/donatur_lvl.php" class="btmhome">Input</a>
    <a href="../daftar/donatur_lvl.php" class="btmhome">Daftar</a>
    <a href="../delete/donatur_lvl.php" class="btmhome">Delete</a>





    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (
            isset($_POST["donasi"]) &&
            isset($_POST["nama"]) &&
            isset($_POST["diskr"])
        ) {
            $donasi = $_POST['donasi'];
            $nama = $_POST['nama'];
            $diskr = $_POST["diskr"];

            $cek = $donasi;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $nama;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $diskr;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        if ($donasi != 1542) {

                            if ($diskr !== '') {
                                $diskr = ", DISKRIPSI = '$diskr'";
                            } else {
                                $diskr = "";
                            }

                            $sql = "UPDATE `DONATUR_LVL` SET NAMATINGKATAN = '$nama' $diskr WHERE IDDLVL = '$donasi'";

                            // echo $sql;

                            // echo "jalan";
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $donasi . "</strong> telah di Update ke dalam database" . "<br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            header("Location: ../update/donatur_lvl.php?masukan_nama");
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
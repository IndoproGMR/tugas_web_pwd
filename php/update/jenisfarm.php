<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah JenisFarm</title>
</head>

<body>
    <h1>Ubah Jenis Farm</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama Jenis Farm: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='idfarm' id='lvl' value=''>";
            $sql = "SELECT * FROM JENIS_FARM";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['ID_JENIS_FARM']);
                        $nama = htmlspecialchars($row['NAMA_JENIS_FARM']);
                        $diskr = htmlspecialchars($row['BIAYA']);

                        echo "<option value='$ID'>$ID - ($nama) - (Rp. $diskr)</option>";
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Nama jenis: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Nama hukuman" required>
        <br>
        biaya Per 10 block:
        <input type="number" name="biaya" id="" placeholder="1000">
        <br>
        <input type="submit" value="update">
    </form>


    <a href=" ../home.php" class="btmhome">home</a>
    <a href="../input/jenisfarm.php" class="btmhome">Input</a>
    <a href="../daftar/jenisfarm.php" class="btmhome">Daftar</a>
    <a href="../delete/jenisfarm.php" class="btmhome">Delete</a>





    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        // echo "1";

        if (isset($_POST["idfarm"]) && isset($_POST["nama"]) && isset($_POST["biaya"])) {
            // echo "2";


            $idfarm = $_POST['idfarm'];
            $nama = $_POST['nama'];
            $biaya = $_POST["biaya"];


            $cek = $idfarm;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $nama;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $biaya;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            if ($idfarm != 1542) {

                if ($biaya !== '') {
                    $biaya = ", BIAYA = '$biaya'";
                } else {
                    $biaya = "";
                }

                $sql = "UPDATE `JENIS_FARM` SET NAMA_JENIS_FARM = '$nama' $biaya WHERE ID_JENIS_FARM = '$idfarm'";

                // echo $sql;

                // echo "jalan";
                if ($conn->query($sql) === TRUE) {
                    echo "Player <strong>" . $idfarm . "</strong> telah di Update ke dalam database" . "<br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            //////////////
        }
    } else {
        header("Location: /php/login");
    }
    ?>


</body>

</html>
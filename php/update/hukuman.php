<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Sangsi</title>
</head>

<body>
    <h1>Ubah Sangsi Hukumana</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama Sangsi: <span class="required">*</span>
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
        Nama Hukuman: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Nama hukuman" required>
        <br>
        Diskripsi:
        <textarea name="diskr" placeholder="Diban secara Permanen"></textarea>
        <br>
        <input type="submit" value="update">
    </form>


    <a href=" ../home.php" class="btmhome">home</a>
    <a href="../input/hukuman.php" class="btmhome">Input</a>
    <a href="../daftar/hukuman.php" class="btmhome">Daftar</a>
    <a href="../delete/hukuman.php" class="btmhome">Delete</a>





    <?php
    require("../proses/ceklogin.php");
    if ($valid) { // menerima signyal validasi dari ceklogin

        if (
            isset($_POST["sangsi"]) &&
            isset($_POST["nama"]) &&
            isset($_POST["diskr"])
        ) {

            $sangsi = $_POST['sangsi'];
            $nama = $_POST['nama'];
            $diskr = $_POST["diskr"];

            $cek = $sangsi;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $nama;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $diskr;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        if ($sangsi != 1542) {

                            if ($diskr !== '') {
                                $diskr = ", DISKRIPSI_HUKUMAN = '$diskr'";
                            } else {
                                $diskr = "";
                            }

                            $sql = "UPDATE `HUKUMAN` SET HUKUMAN = '$nama' $diskr WHERE IDHUKUM = '$sangsi'";

                            // echo $sql;

                            // echo "jalan";
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $sangsi . "</strong> telah di Update ke dalam database" . "<br>";
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            header("Location: ../update/hukuman.php?masukan_nama");
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
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Rule</title>
</head>

<body>
    <h1>Ubah Rule</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama Sangsi: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='idrule' id='lvl' value=''>";
            $sql = "SELECT * FROM RULE";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['IDRULE']);
                        $nama = htmlspecialchars($row['RULENAME']);
                        $diskr = htmlspecialchars($row['DISKRIPSI_RULE']);

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
    <a href="../input/rule.php" class="btmhome">Input</a>
    <a href="../daftar/rule.php" class="btmhome">Daftar</a>
    <a href="../delete/rule.php" class="btmhome">Delete</a>





    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        // echo "1";

        if (isset($_POST["idrule"]) && isset($_POST["nama"]) && isset($_POST["diskr"])) {
            // echo "2";


            $idrule = $_POST['idrule'];
            $nama = $_POST['nama'];
            $diskr = $_POST["diskr"];


            $cek = $idrule;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $nama;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $diskr;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            if ($idrule != 1542) {

                if ($diskr !== '') {
                    $diskr = ", DISKRIPSI_RULE = '$diskr'";
                } else {
                    $diskr = "";
                }

                $sql = "UPDATE `RULE` SET RULENAME = '$nama' $diskr WHERE IDRULE = '$idrule'";

                // echo $sql;

                // echo "jalan";
                if ($conn->query($sql) === TRUE) {
                    echo "Player <strong>" . $idrule . "</strong> telah di Update ke dalam database" . "<br>";
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
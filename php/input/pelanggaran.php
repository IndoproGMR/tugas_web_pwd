<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pelanggaran</title>
</head>

<body>
    <h1>Input Pelanggaran</h1>
    <hr>
    <form action="" method="post">
        Nama: <span class="required">*</span>
        <? require("../proses/carinama.php"); ?>
        Rule yang Dilanggar: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='rule' id='lvl' value=''>";
            $sql = "SELECT * FROM RULE";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['IDRULE']);
                        $nama = htmlspecialchars($row['RULENAME']);

                        if ($nama == $nama) {
                            echo "<option value='$ID'>$nama</option>";
                        } else {
                            echo "<option value='$ID'>$nama</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Sangki yang diterima: <span class="required">*</span>
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

                        if ($nama == $nama) {
                            echo "<option value='$ID'>$nama</option>";
                        } else {
                            echo "<option value='$ID'>$nama</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Lama hukuman: <span class="required">*</span>
        <input type="date" name="lama" id="">




        <br>
        <br>
        <br>
        <input type="submit">

    </form>



    <a href="../home.php" class="btmhome">home</a>
    <a href="../update/pelanggaran.php" class="btmhome">Update</a>
    <a href="../delete/pelanggaran.php" class="btmhome">Delete</a>
    <a href="../daftar/pelanggaran.php" class="btmhome">Daftar</a>
    <br>

    <br>




    <?php
    require("../proses/ceklogin.php");
    if ($valid) {
        /////
        if (
            isset($_POST['namaplayer']) &&
            isset($_POST['rule']) &&
            isset($_POST['sangsi']) &&
            isset($_POST['lama'])
        ) {
            // echo $_POST['lama'];

            $nama = $_POST['namaplayer'];
            $rule = $_POST['rule'];
            $sangsi = $_POST['sangsi'];
            $lama = $_POST['lama'];


            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $rule;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $sangsi;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        $cek = $lama;
                        require("../proses/cekinput.php");
                        if ($bersih) {

                            $idrandom = random_int(0, 99999999);


                            $sql = "INSERT INTO `PELANGGARAN` (`ID_PELANGGARAN`, `IDRULE`, `NAME`, `IDHUKUM`, `LAMA`, `TIMESTAMP_P`)
                            VALUES ('$idrandom', '$rule', '$nama', '$sangsi', '$lama', current_timestamp())";

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
        }
    } else {
        header("Location: ../login");
    }
    ?>


</body>

</html>
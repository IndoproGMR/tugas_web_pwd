<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah pelanggaran</title>
</head>

<body>
    <h1>Ubah pelanggaran</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama Pelanggar: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='idp' id='lvl' value=''>";
            $sql = "SELECT ID_PELANGGARAN, NAME, RULENAME, HUKUMAN, LAMA FROM PELANGGARAN P INNER JOIN RULE R ON P.IDRULE = R.IDRULE INNER JOIN HUKUMAN H ON P.IDHUKUM = H.IDHUKUM ORDER BY P.NAME";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['ID_PELANGGARAN']);
                        $nama = htmlspecialchars($row['NAME']);
                        $rn = htmlspecialchars($row['RULENAME']);
                        $huk = htmlspecialchars($row['HUKUMAN']);
                        $lama = htmlspecialchars($row['LAMA']);



                        if ($nama == $nama) {
                            echo "<option value='$ID'>$nama - ($rn) - ($huk) - ($lama)</option>";
                        } else {
                            echo "<option value='$ID'>$nama - ($rn) - ($huk) - ($lama)</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Rule yang Dilanggar:
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
        Sangki yang diterima:
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
        Lama hukuman:
        <input type="date" name="lama" id="">
        <input type="submit" value="update">
    </form>



    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/pelanggaran.php" class="btmhome">Input</a>
    <a href="../daftar/pelanggaran.php" class="btmhome">Daftar</a>
    <a href="../delete/pelanggaran.php" class="btmhome">Delete</a>





    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin

        if (
            isset($_POST["idp"]) &&
            isset($_POST["rule"]) &&
            isset($_POST["sangsi"]) &&
            isset($_POST["lama"])
        ) {

            $idp = $_POST["idp"];
            $rule = $_POST['rule'];
            $sangsi = $_POST['sangsi'];
            $lama = $_POST["lama"];

            $cek = $idp;
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

                            if ($idp != 1542) {
                                if ($rule != "1542") {
                                    if ($rule !== '') {
                                        $rule = ", IDRULE = '$rule'";
                                    }
                                } else {
                                    $rule = "";
                                }

                                if ($sangsi != "1542") {
                                    if ($sangsi !== '') {
                                        $sangsi = ", IDHUKUM = '$sangsi'";
                                    }
                                } else {
                                    $sangsi = "";
                                }


                                if ($lama !== '') {
                                    $lama = " LAMA = '$lama'";
                                } else {
                                    $lama = " LAMA = '2000-01-01'";
                                }

                                $sql = "UPDATE `PELANGGARAN` SET $lama $rule $sangsi WHERE ID_PELANGGARAN = '$idp'";

                                // echo $sql;

                                // echo "jalan";
                                if ($conn->query($sql) === TRUE) {
                                    echo "Player <strong>" . $nama . "</strong> telah di Update ke dalam database" . "<br>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            } else {
                                header("Location: ../update/pelanggaran.php?masukan_nama");
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
            //////////////
        }
    } else {
        header("Location: /php/login");
    }
    ?>


</body>

</html>
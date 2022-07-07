<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Donatur</title>
</head>

<body>
    <h1>Input Donatur</h1>
    <hr>
    <form action="" method="post">
        Nama:<? require("../proses/carinama.php"); ?>
        Donatur Level:
        <div>
            <?php
            require("../proses/sql.php");
            echo "<select name='lvl' id='lvl' value=''>";
            $sql = "SELECT * FROM DONATUR_LVL";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $IDDLVL = htmlspecialchars($row['IDDLVL']);
                        $nama = htmlspecialchars($row['NAMATINGKATAN']);

                        if ($nama == $nama) {
                            echo "<option value='$IDDLVL'>$nama</option>";
                        } else {
                            echo "<option value='$IDDLVL'>$nama</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Bulan:
        <div>
            <select name="bulan" id="bulan">
                <option value="MARET 2022">MARET 2022</option>
                <option value="APRIL 2022">APRIL 2022</option>
                <option value="MEI 2022">MEI 2022</option>
                <option value="JUNI 2022" selected>JUNI 2022</option>
                <option value="JULI 2022">JULI 2022</option>
                <option value="AGUSTUS 2022">AGUSTUS 2022</option>
                <option value="SEPTEMBER 2022">SEPTEMBER 2022</option>
                <option value="OKTOBER 2022">OKTOBER 2022</option>
                <option value="NOVEMBER 2022">NOVEMBER 2022</option>
                <option value="DESEMBER 2022">DESEMBER 2022</option>
                <option value="JANUARI 2023">JANUARI 2023</option>
                <option value="FEBRUARI 2023">FEBRUARI 2023</option>
                <option value="MARET 2023">MARET 2023</option>
            </select>
        </div>
        Jumlah Donasi: <input type="number" name="donasi" placeholder="50000" required>
        <br>


        <input type="submit">

        </div>


    </form>
    <script src="../js/select.js"></script>


    <a href="../home.php" class="btmhome">home</a>
    <a href="../daftar/donatur.php" class="btmhome">Daftar</a>




    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        // echo "1";


        if (isset($_POST["namaplayer"]) && isset($_POST["lvl"]) && isset($_POST["bulan"]) && isset($_POST["donasi"])) {
            // echo "2";


            $nama = $_POST['namaplayer'];
            $lvl = $_POST['lvl'];
            $bulan = $_POST['bulan'];
            $donasi = $_POST["donasi"];


            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) { // cek nama

                // echo "3";
                $cek = $lvl;
                require("../proses/cekinput.php");
                if ($bersih) { // cek uudi

                    // echo "4";
                    $cek = $bulan;
                    require("../proses/cekinput.php");
                    if ($bersih) { // cek softban

                        // echo "5";
                        $cek = $donasi;
                        require("../proses/cekinput.php");
                        if ($bersih) { // cek nick
                            $idrandom = random_int(0, 99999999);


                            // echo "jalan";
                            $sql = "INSERT INTO DONATUR (ID_DONASI,IDDLVL,NAME, BULAN, JUMLAH_DONASI,TGL_DONASI)
                            VALUES ('$idrandom', '$lvl','$nama', '$bulan','$donasi',NOW())";

                            // echo $sql;
                            if ($conn->query($sql) === TRUE) {
                                echo "Player <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database dengan jumlah Rp <strong>" . $donasi . "</strong><br>";
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
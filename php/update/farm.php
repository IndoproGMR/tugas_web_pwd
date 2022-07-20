<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Farm</title>
</head>

<body>
    <h1>Ubah Farm Data</h1>
    <hr>
    <form action="" method="post">
        <br>
        Nama Pemilik: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='namaplayer' id='' value=''>";
            $sql = "SELECT * FROM FARM";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['UUID_FARM']);
                        $nama = htmlspecialchars($row['NAME']);
                        $idfarm = htmlspecialchars($row['ID_JENIS_FARM']);
                        $nf = htmlspecialchars($row['NAMA_FARM']);
                        $diskr = htmlspecialchars($row['DESKRIPSI']);
                        $ukuran = htmlspecialchars($row['UKURAN']);
                        $world = htmlspecialchars($row['WORLD']);
                        $Z = htmlspecialchars($row['Z']);
                        $X = htmlspecialchars($row['X']);

                        echo "<option value='$ID'>$nama - ($idfarm) - ($nf) - ($diskr) - ($ukuran) - ($world) - ($Z)($X)</option>";
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Nama Farm: <span class="required">*</span>
        <input type="text" name="nf" placeholder="Gold Farm 1000" maxlength="64" require>
        <br>
        jenis Farm: <span class="required">*</span>
        <div>
            <?
            require("../proses/sql.php");
            echo "<select name='jenisfarm' id='lvl' value=''>";
            $sql = "SELECT * FROM JENIS_FARM";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    echo "<option selected value='1542'>Pilih LVL</option>";
                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID = htmlspecialchars($row['ID_JENIS_FARM']);
                        $nama = htmlspecialchars($row['NAMA_JENIS_FARM']);
                        $biaya = htmlspecialchars($row['BIAYA']);

                        if ($nama == $nama) {
                            echo "<option value='" . $ID . "|" . $biaya . "'>$nama</option>";
                        } else {
                            echo "<option value='" . $ID . "|" . $biaya . "'>$nama</option>";
                        }
                    }
                }
            }
            echo "<select>";
            ?>
        </div>
        Diskripsi:
        <textarea name="diskr" placeholder="Menghasilkan GOLD YANG SANGATTTTTT BANYAAAAAAKKKKKKK" maxlength="300"></textarea>
        <br>
        Ukuran farm: <span class="required">*</span>
        <input type="number" name="ukuran" placeholder="titik 1 ke titik 2 (pakai world edit untuk mempermudah)" maxlength="15" require>
        <br>
        world: <span class="required">*</span>
        <select name="world" id="">
            <option value="_overworld" selected>Orverworld</option>
            <option value="_nether">Nether</option>
            <option value="_the_end">The End</option>
        </select>
        <div>
            <strong>Lokasi: </strong><span class="required">*</span>
            <br>
            <span>&nbsp; X: </span> <input type="number" name="X" placeholder="titik tengah farm" maxlength="11" require>
            <span>&nbsp; Z: </span> <input type="number" name="Z" placeholder="titik tengah farm" maxlength="11" require>
        </div>
        <input type="submit" value="update">
    </form>


    <a href=" ../home.php" class="btmhome">home</a>
    <a href="../input/farm.php" class="btmhome">Input</a>
    <a href="../daftar/farm.php" class="btmhome">Daftar</a>
    <a href="../delete/farm.php" class="btmhome">Delete</a>




    <?php
    require("../proses/ceklogin.php");
    if ($valid) {
        if (
            isset($_POST["namaplayer"]) &&
            isset($_POST["jenisfarm"])  &&
            isset($_POST["nf"]) &&
            isset($_POST["diskr"]) &&
            isset($_POST["ukuran"]) &&
            isset($_POST["world"]) &&
            isset($_POST["Z"]) &&
            isset($_POST["X"])
        ) {

            $nama = $_POST['namaplayer'];
            if ($nama === "1542") {
                header("Location: ../update/farm.php?Input_Error");
            }
            $jf = $_POST["jenisfarm"];
            if ($jf === "1542") {
                header("Location: ../update/farm.php?Input_Error");
            }


            $nf = $_POST["nf"];
            $diskr = $_POST["diskr"];

            $ukuran = $_POST["ukuran"];
            $world = $_POST["world"];
            $Z = $_POST["Z"];
            $X = $_POST["X"];

            $jf = explode('|', $jf);

            $jf0 = $jf[0]; // id jenis farm
            $jf1 = $jf[1]; // biaya farm per 10 block

            $cek = $nama;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $jf0;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $cek = $jf1;
                    require("../proses/cekinput.php");
                    if ($bersih) {

                        $cek = $nf;
                        require("../proses/cekinput.php");
                        if ($bersih) {

                            $cek = $diskr;
                            require("../proses/cekinput.php");
                            if ($bersih) {

                                $cek = $ukuran;
                                require("../proses/cekinput.php");
                                if ($bersih) {

                                    $cek = $world;
                                    require("../proses/cekinput.php");
                                    if ($bersih) {

                                        $cek = $Z;
                                        require("../proses/cekinput.php");
                                        if ($bersih) {

                                            $cek = $X;
                                            require("../proses/cekinput.php");
                                            if ($bersih) {


                                                // echo "jalan";

                                                if ($diskr !== '') {
                                                    $diskr = ", DESKRIPSI = '$diskr'";
                                                } else {
                                                    $diskr = "";
                                                }

                                                if ($world !== '') {
                                                    $world = ", WORLD = '$world'";
                                                } else {
                                                    $world = "";
                                                }

                                                if ($Z !== '') {
                                                    $Z = ", Z = '$Z'";
                                                } else {
                                                    $Z = "";
                                                }
                                                if ($X !== '') {
                                                    $X = ", X = '$X'";
                                                } else {
                                                    $X = "";
                                                }


                                                if ($jf1 && $ukuran !== '') {
                                                    $pajak = $jf1 * $ukuran / 3;
                                                    $pajak = floor($pajak);
                                                    $pajak = ", PAJAK = '$pajak'";
                                                    $ukuran = ", `UKURAN` = '$ukuran'";
                                                } else {
                                                    $pajak = "";
                                                }


                                                $sql = "UPDATE `FARM` SET `NAMA_FARM` = '$nf' $diskr $world $Z $X $ukuran $pajak WHERE `FARM`. `UUID_FARM` = '$nama'";
                                                // echo $sql;

                                                if ($conn->query($sql) === TRUE) {
                                                    echo "Farm <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database" . "<br>";
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
            } else {
                header("Location: ../login/logout.php");
            }
            ////////
        }
    } else {
        header("Location: /php/login");
    }
    ?>


</body>

</html>
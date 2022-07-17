<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Farm</title>
</head>

<body>
    <h1>Input Farm Player</h1>
    <hr>
    <form action="" method="post">
        Nama: <span class="required">*</span>
        <? require_once("../proses/carinama.php"); ?>
        jenis Farm:
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
        Nama Farm: <span class="required">*</span>
        <input type="text" name="nf" placeholder="Gold Farm 1000" require>
        <br>
        Diskripsi:
        <textarea name="diskr" placeholder="Menghasilkan GOLD YANG SANGATTTTTT BANYAAAAAAKKKKKKK"></textarea>
        <br>
        Ukuran farm: <span class="required">*</span>
        <input type="number" name="ukuran" placeholder="titik 1 ke titik 2 (pakai world edit untuk mempermudah)">
        <br>
        world: <span class="required">*</span>
        <select name="world" id="">
            <option value="_overworld">Orverworld</option>
            <option value="_nether">Nether</option>
            <option value="_the_end">The End</option>
        </select>
        <div>
            <strong>Lokasi: <span class="required">*</span></strong>
            <br>
            <span>&nbsp; X: </span> <input type="number" name="X" placeholder="titik tengah farm" required>
            <span>&nbsp; Z: </span> <input type="number" name="Z" placeholder="titik tengah farm" required>
        </div>




        <br>
        <br>
        <br>
        <input type="submit">

    </form>



    <a href="../home.php" class="btmhome">home</a>
    <a href="../update/farm.php" class="btmhome">Update</a>
    <a href="../delete/farm.php" class="btmhome">Delete</a>
    <a href="../daftar/farm.php" class="btmhome">Daftar</a>
    <br>

    <br>




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
            /////

            $nama = $_POST['namaplayer'];
            if ($nama === "1542") {
                header("Location: ../input/farm.php?Input_Error");
            }
            $jf = $_POST["jenisfarm"];
            if ($jf === "1542") {
                header("Location: ../input/farm.php?Input_Error");
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

                                                require("../proses/uuid4.php");
                                                // echo "jalan";

                                                $pajak = $jf1 * $ukuran / 3;

                                                $pajak = floor($pajak);



                                                $sql = "INSERT INTO `FARM` (`UUID_FARM`, `NAME`, `ID_JENIS_FARM`, `NAMA_FARM`, `DESKRIPSI`, `UKURAN`, `WORLD`, `Z`, `X`, `PAJAK`)
                                                    VALUES ('$uuid4', '$nama', '$jf0', '$nf', '$diskr', '$ukuran', '$world', '$Z', '$X', '$pajak');";

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
            ///
        }
        ////
    } else {
        header("Location: ../login/");
    }
    ?>


</body>

</html>
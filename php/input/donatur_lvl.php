<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input lvl</title>
</head>

<body>
    <h1>Input Donatur level</h1>
    <hr>
    <form action="" method="post">
        ID: <span class="required">*</span>
        <input type="number" name="idl" placeholder="Id rule (1002 = Donatur +)" required>
        <br>
        Nama Level: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Nama Level (Donatur +)" required>
        <br>
        Diskripsi:
        <textarea name="diskr" placeholder="Donatur +  yang telah berdonasi diatas 100k"></textarea>
        <br>
        <br>
        <input type="submit">
    </form>

</body>

</html>

<a href="../home.php" class="btmhome">home</a>
<a href="../update/donatur_lvl.php" class="btmhome">Update</a>
<a href="../delete/donatur_lvl.php" class="btmhome">Delete</a>
<a href="../daftar/donatur_lvl.php" class="btmhome">Daftar</a>

<button onclick="show()" id="btm" class="btmhome">tampilkan Daftar</button>
<?php require_once("../daftar/donatur_lvl.php"); ?>
<script src="../js/show.js"></script>

<?php
require("../proses/ceklogin.php");
if ($valid) { // menerima signyal validasi dari ceklogin
    if (
        isset($_POST["nama"]) &&
        isset($_POST["idl"]) &&
        isset($_POST["diskr"])
    ) {
        $nama = $_POST['nama'];
        $idl = $_POST['idl'];
        $diskr = $_POST['diskr'];

        // echo $nama;
        // echo $idr;
        // echo $diskr;

        $cek = $nama;
        require("../proses/cekinput.php");
        if ($bersih) {



            $cek = $idl;
            require("../proses/cekinput.php");
            if ($bersih) {



                $cek = $diskr;
                require("../proses/cekinput.php");
                if ($bersih) {



                    // echo "jalan";
                    $sql = "INSERT INTO DONATUR_LVL (NAMATINGKATAN, IDDLVL, DISKRIPSI)
                    VALUES ('$nama', '$idl', '$diskr')";
                    // echo $sql;
                    if ($conn->query($sql) === TRUE) {
                        echo "Rule <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database" . "<br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    ////
                } else {
                    header("Location: ../login/logout.php");
                }
                /////
            } else {
                header("Location: ../login/logout.php");
            }
            //////
        } else {
            header("Location: ../login/logout.php");
        }
    }
} else {
    header("Location: ../login/");
}
?>
<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Hukuman</title>
</head>

<body>
    <h1>Input Hukuman kepada Pelanggar</h1>
    <hr>
    <form action="" method="post">
        ID: <span class="required">*</span>
        <input type="number" name="idh" placeholder="idhukuman (1001 = temp ban)" maxlength="6" required>
        <br>
        Nama Hukuman: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Nama hukuman" maxlength="128" required>
        <br>
        Diskripsi:
        <textarea name="diskr" placeholder="Diban secara Permanen" maxlength="128"></textarea>
        <br>
        <br>
        <input type="submit">

    </form>

</body>

</html>

<a href="../home.php" class="btmhome">home</a>
<a href="../update/hukuman.php" class="btmhome">Update</a>
<a href="../delete/hukuman.php" class="btmhome">Delete</a>
<a href="../daftar/hukuman.php" class="btmhome">Daftar</a>

<button onclick="show()" id="btm" class="btmhome">tampilkan Daftar</button>
<?php require_once("../daftar/hukuman.php"); ?>
<script src="../js/show.js"></script>

<?php
require("../proses/ceklogin.php");
if ($valid) { // menerima signyal validasi dari ceklogin
    if (
        isset($_POST["nama"]) &&
        isset($_POST["idh"]) &&
        isset($_POST["diskr"])
    ) {
        $nama = $_POST['nama'];
        $idh = $_POST['idh'];
        $diskr = $_POST['diskr'];

        $cek = $nama;
        require("../proses/cekinput.php");
        if ($bersih) {

            $cek = $idh;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $diskr;
                require("../proses/cekinput.php");
                if ($bersih) {

                    // echo "jalan";
                    $sql = "INSERT INTO HUKUMAN (HUKUMAN, IDHUKUM, DISKRIPSI_HUKUMAN)
                    VALUES ('$nama', '$idh', '$diskr')";
                    // echo $sql;
                    if ($conn->query($sql) === TRUE) {
                        echo "Sangsi <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database" . "<br>";
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
    }
} else {
    header("Location: ../login");
}
?>
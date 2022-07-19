<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1...0">
    <title>Input Rule</title>
</head>

<body>
    <h1>Input Rule</h1>
    <hr>
    <form action="" method="post">
        ID: <span class="required">*</span>
        <input type="number" name="idr" placeholder="Id rule (2301 = X-Ray Hack)" maxlength="6" required>
        <br>
        Nama Rule: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Nama rule" maxlength="128" required>
        <br>
        Diskripsi:
        <textarea name="diskr" placeholder="Penggunaan X-ray" maxlength="128"></textarea>
        <br>
        <br>
        <input type="submit">
    </form>

</body>

</html>

<a href="../home.php" class="btmhome">home</a>
<a href="../update/rule.php" class="btmhome">Update</a>
<a href="../delete/rule.php" class="btmhome">Delete</a>
<a href="../daftar/rule.php" class="btmhome">Daftar</a>

<button onclick="show()" id="btm" class="btmhome">tampilkan Daftar</button>
<?php require_once("../daftar/rule.php"); ?>
<script src="../js/show.js"></script>

<?php
require("../proses/ceklogin.php");
if ($valid) { // menerima signyal validasi dari ceklogin
    if (
        isset($_POST["nama"]) &&
        isset($_POST["idr"]) &&
        isset($_POST["diskr"])
    ) {
        $nama = $_POST['nama'];
        $idr = $_POST['idr'];
        $diskr = $_POST['diskr'];


        $cek = $nama;
        require("../proses/cekinput.php");
        if ($bersih) {

            $cek = $idr;
            require("../proses/cekinput.php");
            if ($bersih) {

                $cek = $diskr;
                require("../proses/cekinput.php");
                if ($bersih) {

                    $sql = "INSERT INTO RULE (RULENAME, IDRULE, DISKRIPSI_RULE)
                VALUES ('$nama', '$idr', '$diskr')";
                    // echo $sql;
                    if ($conn->query($sql) === TRUE) {
                        echo "Rule <strong>" . $nama . "</strong> telah di ditambahkan ke dalam database" . "<br>";
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
        /////
    }
} else {
    header("Location: ../login");
}
?>
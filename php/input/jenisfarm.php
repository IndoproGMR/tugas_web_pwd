<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input jenis farm</title>
</head>

<body>
    <h1>Input jenis farm</h1>
    <hr>
    <form action="" method="post">
        ID: <span class="required">*</span>
        <input type="number" name="idj" placeholder="id jenis farm (1001 = afk redstone farm)" required>
        <br>
        Nama jenis farm: <span class="required">*</span>
        <input type="text" name="nama" placeholder="Afk farm" required>
        <br>
        Biaya per block: <span class="required">*</span>
        <input type="number" name="biaya" id="" placeholder="1000" require>
        <br>
        <br>
        <input type="submit">

    </form>


    <a href="../home.php" class="btmhome">home</a>
    <a href="../update/jenisfarm.php" class="btmhome">Update</a>
    <a href="../delete/jenisfarm.php" class="btmhome">Delete</a>
    <a href="../daftar/jenisfarm.php" class="btmhome">Daftar</a>

    <button onclick="show()" id="btm" class="btmhome">tampilkan Daftar</button>
    <?php require_once("../daftar/jenisfarm.php"); ?>
    <script src="../js/show.js"></script>

    <?php
    require("../proses/ceklogin.php");

    if ($valid) { // menerima signyal validasi dari ceklogin
        if (isset($_POST["nama"]) && isset($_POST["idj"]) && isset($_POST["biaya"])) {
            $idj = $_POST['idj'];
            $namaj = $_POST['nama'];
            $biaya = $_POST['biaya'];

            $cek = $namaj;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $idj;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            $cek = $biaya;
            require("../proses/cekinput.php");
            if (!$bersih) {
                header("Location: /php/login/logout.php");
            }

            // echo "jalan";
            $sql = "INSERT INTO JENIS_FARM (ID_JENIS_FARM, NAMA_JENIS_FARM, BIAYA)
                VALUES ('$idj', '$namaj', '$biaya')";
            // echo $sql;
            if ($conn->query($sql) === TRUE) {
                echo "Jenis Farm <strong>" . $namaj . "</strong> telah di ditambahkan ke dalam database" . "<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        header("Location: /php/login");
    }
    ?>
</body>

</html>
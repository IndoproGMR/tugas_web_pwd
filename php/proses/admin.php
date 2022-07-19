<? ob_start(); ?>

<link rel="stylesheet" href="../style/input.css">
<link rel="icon" href="../foto/favicon.ico" />
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Akun</title>

<h1>Input Baru Akun</h1>
<hr>

<form action="" method="post">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" placeholder="untuk nama" maxlength="64" require>

    <label for="username">Username</label>
    <input type="text" name="user" id="user" placeholder="untuk login" require>
    <br>
    <label for="password">password</label>
    <input type="password" name="pass" id="pass" placeholder="****ing password" require>
    <br>
    <label for="admin">Admin Password</label>
    <input type="password" name="admin" placeholder="admin password" require>
    <input type="submit">
</form>

<a href="../home.php" class="btmhome">home</a>
<a href="../daftar/akun.php" class="btmhome">Daftar</a>




<?php
require("../proses/ceklogin.php");

if ($valid) { // menerima signyal validasi dari ceklogin
    if (
        isset($_POST["user"]) &&
        isset($_POST["pass"]) &&
        isset($_POST["name"])
    ) {
        // echo "0";

        require("../proses/sql.php");

        //input data

        $name = $_POST["name"];

        $user = $_POST["user"];

        $pass = $_POST["pass"];



        // untuk menambahkan akun admin command line dari >>>>

        if (isset($_POST["admin"])) {
            $adminuser = "admin"; //nama admin yang di masukan

            //pasword
            $adminpass =  $_POST["admin"];
            $adminpass1 = hash('sha256', $adminpass);
            $adminpass2 = hash('sha256', $adminpass1);
            // username
            $adminname = $adminuser . "_" . $adminpass1;
            $adminname1 = hash("sha256", $adminname);



            $admin = "SELECT * FROM akun WHERE HASH='$adminname1' AND PASSWORD='$adminpass2'";
            $admin1 =  mysqli_query($conn, $admin);
            if (mysqli_num_rows($admin1) === 1) {
                // echo "password admin jalan";



                // <<<<< sampai disini





                //password

                $pass1 = hash('sha256', $pass);
                $pass2 = hash('sha256', $pass1);

                //user hash

                $hash = $user . "_" . $pass1;
                $hash1 = hash("sha256", $hash);



                $cek = $name;
                require("../proses/cekinput.php");
                if ($bersih) { //cek nama
                    // echo "bersih";
                    $idrandom = random_int(0, 99999999);

                    $input = "INSERT INTO `akun` (`ID_AKUN`, `NAME_AKUN`, `HASH`, `PASSWORD`, `TIME_AKUN`)
                    VALUES ('$idrandom', '$name', '$hash1', '$pass2', NOW())";



                    if ($conn->query($input) === TRUE) {
                        echo 'Akun Sudah di daftarkan ke dalam Akun, ';
                        $input = "INSERT INTO `session` (`HASH`, `SESSIONKEY`, `EXP`)
                        VALUES ('$hash1', null, null)";
                        if ($conn->query($input) === TRUE) {
                            echo 'Akun Sudah di daftarkan ke dalam Session';
                        } else {
                            echo "Error: " . $input . "<br>" . $conn->error;
                            exit();
                        }
                    } else {
                        echo "Error: " . $input . "<br>" . $conn->error;
                    }
                    exit();
                } else {
                    header("Location: ../login/logout.php");
                }

                // command >>>>

            } else {
                echo "password admin salah";
            }
            // <<<< sampai sini
        }
    }
} else {
    header("Location: ../login");
}
?>
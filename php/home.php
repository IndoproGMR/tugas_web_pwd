<? ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<!-- NAMA KELOMPOK -->
<!-- 2010651170 ACHMAD NAJI -->
<!-- 2010651165 VIRA SAFITRI SARI -->

<head>
    <link rel="icon" href="foto/favicon.ico" />
    <script src="js/bergerres.js"></script>
    <link rel="stylesheet" href="style/style2.css" />
    <script src="https://kit.fontawesome.com/90facb6ab3.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home panel</title>
</head>

<body>
    <?php require("../php/proses/nav.php"); ?>

    <h2>Selamat Datang pada laman Home Panel</h2>
    <hr>

    <a href="/php/">index</a>


    <p>Todo:</p>
    <p>1. melengkapi yang kosong DONE</p>
    <ul>
        <strong>Akun (4/4) DONE</strong>
        <br>
        <br>

        <strong>Daftar (10/10) DONE</strong>
        <br>
        <br>

        <strong>Input (8/8) DONE</strong>
        <br>
        <br>

        <strong>Update (8/8) DONE</strong>
        <br>

        <br>
        <strong>Delete Data (8/8) DONE</strong>
        <br>

        <br>
        <!-- <strong>Bagunan (4/6)</strong> -->
        <!-- <li>desain sertifikat</li> -->
        <!-- <li>sertifikat farm</li> -->
        <!-- <strong>Bagunan (4/4) DONE</strong> -->

    </ul>
    <!-- <p>2. entah sih mau diisi apa di halaman utama XD</p> -->
    <p>5. bersihkan code dari command selain debug (90%)</p>
    <p>7. sambungkan sql database ke remote database 2</p>





    <?
    require("../php/proses/sql.php");
    if (
        isset($_COOKIE["hash"]) &&
        isset($_COOKIE["session"])
    ) {
        $hash1 = $_COOKIE["hash"];
        $key = $_COOKIE["session"];

        $cek = $hash1;  // input
        require("../php/proses/cekinput.php");
        if ($bersih) { // cek hash

            $cek = $key; // input
            require("../php/proses/cekinput.php");
            if ($bersih) { // cek key

                $ceklogin = "SELECT * FROM session WHERE HASH='$hash1' AND SESSIONKEY=$key";
                $ceklogin1 = mysqli_query($conn, $ceklogin);


                $exp = date("Ymd");  // 20220720
                if (mysqli_num_rows($ceklogin1) === 1) {
                    $row = mysqli_fetch_assoc($ceklogin1);

                    if ($row['EXP'] < $exp) { // 20220719 lebih kecil dari hari ini 20220720 maka logut
                        header("Location: /php/login");
                    } elseif ($row['SESSIONKEY'] == null) {
                        header("Location: /php/login");
                    } elseif ($row['SESSIONKEY'] == "24ab243446b96dd563c71cd219d6e995e8013c9c0459d7ed8d0456d3b8894679") {
                        //hash untuk null
                        header("Location: /php/login");
                    } elseif (!$row['SESSIONKEY'] == $key) {
                        header("Location: /php/login");
                    } elseif (!$row['HASH'] == $hash1) {
                        header("Location: /php/login");
                    } elseif ($row['SESSIONKEY'] === $key) {
                        // echo "5"; // berhasil login

                        $hash1 = $_COOKIE["hash"];
                        $key = $_COOKIE["session"];

                        //set session key
                        $random = random_int(0, 9999);
                        $sql_update = "UPDATE session SET SESSIONKEY='$random' WHERE HASH='$hash1'";
                        setcookie("session", $random, time() + (86400 * 4), "/");
                        $result = mysqli_query($conn, $sql_update);
                        if ($result) {
                            // echo 'Updated Successfully';
                            // header("Location: ../home.php");
                        } else {
                            // header("Location: /php/login");
                            echo "Update Failed: " . mysqli_error($conn);
                        }
                        exit();
                    }
                } else {
                    header("Location: ../php/login/index.php");
                }
            } else {
                header("Location: /php/login/logout.php"); //awto logout
            }
        } else {
            header("Location: /php/login/logout.php"); //awto logout
        }
    } else {
        header("Location: ../php/login");
    }
    ?>
</body>

</html>
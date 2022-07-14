<? ob_start(); ?>

<?php
// data O
// output = $valid (boolean)

$bersih = false;
$valid = false;

require("../proses/sql.php");

if (isset($_COOKIE["hash"]) && isset($_COOKIE["session"])) {
    $hash1 = $_COOKIE["hash"];
    $key = $_COOKIE["session"];

    // >>>>>>>>>>>>>>>
    $cek = $hash1;
    require("../proses/cekinput.php");
    if ($bersih) { // cek hash

        $cek = $key;
        require("../proses/cekinput.php");
        if ($bersih) { // cek key

            // >>>>>>>>>>>>>>>


            $exp = date("Ymd");
            $ceklogin = "SELECT * FROM session WHERE HASH='$hash1' AND SESSIONKEY=$key";
            $ceklogin1 = mysqli_query($conn, $ceklogin);

            if (mysqli_num_rows($ceklogin1) === 1) {
                $row = mysqli_fetch_assoc($ceklogin1);
                if ($row['EXP'] < $exp) {
                    header("Location: ../php/login");
                } elseif ($row['SESSIONKEY'] === $key) {
                    // >>>>>>>>>>>>>>>>>>>>
                    require("../proses/renewkey.php");
                    $valid = true;
                    // >>>>>>>>>>>>>>>>>>>>
                } elseif ($row['SESSIONKEY'] || $row['HASH'] === null) {
                    header("Location: ../php/login");
                } elseif ($row['SESSIONKEY'] || $row['HASH']  === "24ab243446b96dd563c71cd219d6e995e8013c9c0459d7ed8d0456d3b8894679") {
                    // hash untuk null
                    header("Location: ../php/login");
                } elseif (!$row['SESSIONKEY'] === $key) {
                    header("Location: ../php/login");
                } elseif (!$row['HASH'] === $hash1) {
                    header("Location: ../php/login");
                }
            } else {
                header("Location: ../login/logout.php");
            }
        } else {
            header("Location: ../login/logout.php"); //awto logout
        }
    } else {
        header("Location: ../login/logout.php"); //awto logout
    }
} else {
    header("Location: ../login/logout.php");
}

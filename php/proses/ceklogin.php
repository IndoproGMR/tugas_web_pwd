<?php
// data O
// output = $valid (boolean)


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
            $ceklogin = "SELECT * FROM session WHERE hash='$hash1' AND sessionkey=$key";
            $ceklogin1 = mysqli_query($conn, $ceklogin);

            if (mysqli_num_rows($ceklogin1) === 1) {
                $row = mysqli_fetch_assoc($ceklogin1);
                if ($row['exp'] < $exp) {
                    header("Location: ../php/login");
                } elseif ($row['sessionkey'] === $key) {
                    // >>>>>>>>>>>>>>>>>>>>
                    require("../proses/renewkey.php");
                    $valid = true;
                    // >>>>>>>>>>>>>>>>>>>>
                } elseif ($row['sessionkey'] || $row['hash'] === null) {
                    header("Location: ../php/login");
                } elseif ($row['sessionkey'] || $row['hash']  === "24ab243446b96dd563c71cd219d6e995e8013c9c0459d7ed8d0456d3b8894679") {
                    // hash untuk null
                    header("Location: ../php/login");
                } elseif (!$row['sessionkey'] === $key) {
                    header("Location: ../php/login");
                } elseif (!$row['hash'] === $hash1) {
                    header("Location: ../php/login");
                }
            } else {
                header("Location: ../login");
            }
        } else {
            header("Location: /php/login/logout.php"); //awto logout
        }
    } else {
        header("Location: /php/login/logout.php"); //awto logout
    }
} else {
    header("Location: ../login");
}

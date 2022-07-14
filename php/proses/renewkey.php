<? ob_start(); ?>

<?php
// echo " renewkey ";
require("../proses/sql.php");
$hash1 = $_COOKIE["hash"];
$key = $_COOKIE["session"];


$cek = $hash1;
require("../proses/cekinput.php");
if ($bersih) { // cek hash

    $cek = $key;
    require("../proses/cekinput.php");
    if ($bersih) { // cek key

        //set session key
        $random = random_int(0, 9999);
        $sql_update = "UPDATE session SET SESSIONKEY='$random' WHERE HASH='$hash1'";
        setcookie("session", $random, time() + (86400 * 6), "/");
        $result = mysqli_query($conn, $sql_update);


        if ($result) {
            // echo 'Updated Successfully';
            // header("Location: ../home.php");
        } else {
            echo "Error : " . mysqli_error($conn);
        }
    } else {
        header("Location: ../login/logout.php"); //awto logout
    }
} else {
    header("Location: ../login/logout.php"); //awto logout
}

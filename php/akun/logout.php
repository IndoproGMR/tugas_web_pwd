<? ob_start(); ?>

<?php
include("../proses/sql.php");
if (isset($_COOKIE["hash"]) || isset($_COOKIE["session"])) {
    $hash1 = $_COOKIE["hash"];
    $key = $_COOKIE["session"];


    $cek = $hash1; //input
    require("../proses/cekinput.php");
    if ($bersih) {

        $cek = $key; //input
        require("../proses/cekinput.php");
        if ($bersih) {

            setcookie('hash', null, -1, '/');
            setcookie('session', null, -1, '/');
            setcookie('username', null, -1, '/');
            $setexp = "UPDATE session SET exp=null, SESSIONKEY=null WHERE HASH='$hash1'";
            if ($conn->query($setexp) === TRUE) {
                header("Location: ../");
            } else {
                echo "Error: " . $setexp . "<br>" . $conn->error;
            }
        } else {
            header("Location: ../login/"); //awto logout
        }
    } else {
        header("Location: ../login/"); //awto logout
    }
} else {
    header("Location: ../login/"); //awto logout
}

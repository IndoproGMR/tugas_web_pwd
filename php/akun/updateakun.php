<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/input.css">
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Akun</title>
</head>

<body>

    <h1>Update Akun Anda</h1>
    <hr>

    <form action="" method="post">
        Username lama : <input type="text" name="user_lama" placeholder="Username Lama" require>
        Password lama : <input type="password" name="Pass_lama" placeholder="Password Lama" require>
        <br>
        <br>
        <hr>
        <br>
        Username baru : <input type="text" name="user_baru" placeholder="Username Baru">
        Password baru : <input type="password" name="Pass_baru" placeholder="Password Baru">
        <br>
        <br>
        <hr>
        <br>
        Profile name baru : <input type="text" name="Profile" placeholder="profile name baru">
        <input type="submit">
    </form>



</body>

</html>

<?php
require("../proses/ceklogin.php");
if ($valid) { // menerima signyal validasi dari ceklogin
    if (
        isset($_POST["user_lama"]) &&
        isset($_POST["Pass_lama"])
    ) {
        $user_lama = isset($_POST["user_lama"]);
        $Pass_lama = isset($_POST["Pass_lama"]);

        $user_baru = isset($_POST["user_baru"]);
        $Pass_baru = isset($_POST["Pass_baru"]);

        $profile = isset($_POST["profile"]);

        $cek = $user_lama;
        require("../proses/cekinput.php");
        if ($bersih) { // cek hash

            $cek = $Pass_lama;
            require("../proses/cekinput.php");
            if ($bersih) { // cek hash

                if ($user_baru && $Pass_baru !== null) {
                    echo $user_baru;
                    echo $Pass_baru;
                    echo "tidak kosong";
                } else {
                    echo "kosong";
                }










                ///////
            } else {
                // header("Location: ../login/");
            }
        } else {
            // header("Location: ../login/");
        }
    } else {
        // echo "<h1>masukan Username dan Password</h1>";
        // header("Location: ../akun/updateakun.php?masukan_password_username");
    }
} else {
    // header("Location: ../login/");
}
?>
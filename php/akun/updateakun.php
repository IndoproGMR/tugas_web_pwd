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
        confirma Password Baru : <input type="password" name="Pass_baru_C" placeholder="Cont Password Baru">
        <br>
        <i class="note">
            <span>*</span> Bila update password mohon untuk masukan Username dan password nya juga
        </i>
        <hr>
        <br>
        Profile name baru : <input type="text" name="Profile" placeholder="profile name baru">
        <input type="submit">
    </form>
    <a href="../home.php" class="btmhome">home</a>



</body>

</html>


<?php
require("../proses/ceklogin.php");

if ($valid) { // menerima signyal validasi dari ceklogin

    if (
        isset($_POST["user_lama"]) &&
        isset($_POST["Pass_lama"])
    ) {
        echo "0";

        require("../proses/sql.php");

        //input data
        $user_lama = $_POST["user_lama"];
        $Pass_lama = $_POST["Pass_lama"];

        //password
        $pass1 = hash('sha256', $Pass_lama);
        $pass2 = hash('sha256', $pass1);

        //user hash
        $hash = $user_lama . "_" . $pass1;
        $hash1 = hash("sha256", $hash);



        // <cocokan password dan hash1 dengan sql>
        $cek = "SELECT * FROM akun WHERE HASH='$hash1' AND PASSWORD='$pass2'";
        // echo "1";
        $cek1 = mysqli_query($conn, $cek);
        if (mysqli_num_rows($cek1) === 1) {
            // echo "2";

            $row = mysqli_fetch_assoc($cek1);
            if ($row['HASH'] === $hash1 && $row['PASSWORD'] === $pass2) { // cek 
                // echo "3";
                $id = $row["ID_AKUN"];
                $hashlama = $row["HASH"];


                if (
                    isset($_POST["user_baru"]) &&
                    isset($_POST["Pass_baru"]) &&
                    isset($_POST["Pass_baru_C"])

                ) {
                    $user_baru = $_POST["user_baru"];
                    $Pass_baru = $_POST["Pass_baru"];
                    $Pass_baru_C = $_POST["Pass_baru_C"];

                    if ($user_baru && $Pass_baru && $Pass_baru_C != "") {

                        if ($Pass_baru === $Pass_baru_C) {

                            // pass hash
                            $pass1 = hash('sha256', $Pass_baru);
                            $pass2 = hash('sha256', $pass1);

                            //user hash
                            $hash = $user_baru . "_" . $pass1;
                            $hash1 = hash("sha256", $hash);


                            $delsess = "DELETE FROM `session` WHERE HASH = '$hashlama';";

                            $update = "UPDATE `akun` SET HASH='$hash1', PASSWORD='$pass2' WHERE ID_AKUN='$id';";

                            $insert = "INSERT INTO `session`(`HASH`, `SESSIONKEY`, `EXP`) VALUES ('$hash1', null,null);";


                            if ($conn->query($delsess) === TRUE) {

                                if ($conn->query($update) === TRUE) {

                                    if ($conn->query($insert) === TRUE) {

                                        echo "<h2>Password dan username telah di update</h2>";
                                    } else {
                                        echo "Error: " . $sql_update . "<br>" . $conn->error;
                                    }
                                } else {
                                    echo "Error: " . $sql_update . "<br>" . $conn->error;
                                }
                            } else {
                                echo "Error: " . $sql_update . "<br>" . $conn->error;
                            }

                            ///
                        } else {
                            echo "<h2>Password tidak sama</h2>";
                        }
                    }
                }






                // mengubah profile name
                if (
                    isset($_POST["Profile"])
                ) {

                    $profile = $_POST["Profile"];
                    if ($profile != "") {

                        $cek = $profile;
                        require("../proses/cekinput.php");
                        if ($bersih) { // cek hash


                            $update = "UPDATE `akun` SET NAME_AKUN = '$profile' WHERE ID_AKUN='$id';";

                            if ($conn->query($update) === TRUE) {

                                echo "<h2>Profile name telah di update</h2>";
                            } else {
                                echo "Error: " . $sql_update . "<br>" . $conn->error;
                            }
                        } else {
                            header("Location: /php/login/logout.php");
                        }
                    }
                }



                //////
            } else {
                header("Location: /php/login/logout.php"); //awto logout
            }
        } else {
            echo "<h2>Password atau username salah</h2>";
            // header("Location: ../login/index.php?error=Incorect_Username_or_password");
            exit();
        }
    } else {
        echo "<h1>masukan Username dan Password</h1>";
        // header("Location: ../akun/updateakun.php?masukan_password_username");
    }
} else {
    header("Location: /php/login/logout.php");
}
?>
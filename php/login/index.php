<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/input.css" />
    <title>login</title>

</head>

<style>

</style>

<body>
    <h1>Login</h1>
    <hr>

    <!-- login -->
    <form action="index.php" method="POST">
        <label for="user">Username :</label>
        <input type="text" id="user" name="user" placeholder="Username" require />
        <br />
        <label for="password">password :</label>
        <input type="password" id="password" name="password" placeholder="password" require />
        <br />
        <input type="checkbox" name="remember" id="remember" value="true" />
        <label for="remember">Remember me a bit longer (3 hari)</label>
        <br />
        <input type="submit" value="login" id="submit" />
    </form>


    <a href="../home.php" class="btmhome">home</a>

    <p>username : root </p>
    <p>password : root atau test</p>

    <!-- <p>Todo:</p> -->
    <!-- <p>1. membuat form ganti pass dan username</p> -->
    <!-- <p>2. mempercantik login form</p> -->
    <!-- <p>3. Bersih2 code</p> -->

    <?php
    require("../proses/sql.php");

    if (isset($_COOKIE["hash"]) && isset($_COOKIE["session"])) {
        $hash1 = $_COOKIE["hash"];
        $key = $_COOKIE["session"];
        setcookie('hash', null, -1, '/');
        setcookie('session', null, -1, '/');
        setcookie('username', null, -1, '/');
        $setexp = "UPDATE session SET EXP=null, SESSIONKEY=null WHERE HASH='$hash1'";
        if ($conn->query($setexp) === TRUE) {
            // echo "New record created successfully" . "<br>";
        } else {
            echo "Error: " . $setexp . "<br>" . $conn->error;
        }
    }





    // echo "-1";
    if (
        isset($_POST["user"]) &&
        isset($_POST["password"])
    ) {
        // echo "0";

        // var_dump($_POST);

        require("../proses/sql.php");

        //input data

        $user = $_POST["user"];
        // echo $user;
        // echo "<br>";

        $pass = $_POST["password"];
        // echo $password;
        // echo "<br>";

        $remember = "false";

        if (isset($_POST["remember"])) {
            $remember = "true";
        }
        // echo $remember;


        //password

        $pass1 = hash('sha256', $pass);
        $pass2 = hash('sha256', $pass1);
        // echo "<br>";

        // echo $pass;
        // echo "<br>";

        // echo $pass1;
        // echo "<br>";

        // echo $pass2;
        // echo "<br>";

        // echo "<br>";


        //user hash

        $hash = $user . "_" . $pass1;
        // echo $hash;
        // echo "<br>";

        $hash1 = hash("sha256", $hash);
        // echo $hash1;
        // echo "<br>";

        // <cocokan password dan hash1 dengan sql>
        $cek = "SELECT * FROM akun WHERE HASH='$hash1' AND PASSWORD='$pass2'";
        // echo "1";
        $cek1 = mysqli_query($conn, $cek);
        if (mysqli_num_rows($cek1) === 1) {
            // echo "2";

            $row = mysqli_fetch_assoc($cek1);
            if ($row['HASH'] === $hash1 && $row['PASSWORD'] === $pass2) { // cek kembali apakah password dan user hase sama
                // echo "3"; //login berhasil

                $exp = date("Ymd"); // 20220720
                $exp = $exp + 1; // 20220721

                if ($remember == "true") { // == untuk same string === untuk same type
                    $exp = $exp + 2; //20220723
                }

                //set session key
                $random = random_int(000, 9999);
                $sql_update = "UPDATE session SET SESSIONKEY='$random', EXP='$exp' WHERE HASH='$hash1'";

                setcookie("hash", $hash1, time() + (86400 * 4), "/");
                setcookie("session", $random, time() + (86400 * 4), "/");
                setcookie("username", $row['NAME_AKUN'], time() + (86400 * 4), "/");


                if ($conn->query($sql_update) === TRUE) {
                    header("Location: ../home.php");
                } else {
                    echo "Error: " . $sql_update . "<br>" . $conn->error;
                }
            }
        } else {
            echo "<h2>Password atau username salah</h2>";
            // header("Location: ../login/index.php?error=Incorect_Username_or_password");
            exit();
        }
        exit();
    }

    ?>



</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/input.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Player</title>
</head>

<body>
    <h1>Input player baru</h1>
    <hr>
    <form action="" method="post">
        nama: <? require("../proses/carinama.php") ?>
        <br>
        <!-- uuid: <input type="text" name="UUID" id="UUID" placeholder="2b430-1wa..." required> -->
        <br>
        <br>
        <!-- softban: <input type="text" name="SOFTBAN" id="SOFTBAN" placeholder="2b430-1wa..." required> -->
        <!-- <div class="custom-select">
            <select name="softban">
                <option value="N" selected>Softban ? (default: no)</option>
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
        </div> -->
        <br>
        <input type="submit">
    </form>
    <!-- <script src="../js/select.js"></script> -->


    <a href="../home.php" class="btmhome">home</a>




    <?php
    // echo "-1";
    require("../proses/ceklogin.php");
    // echo "0";

    if ($valid) { // menerima signyal validasi dari ceklogin
        echo "1";


        // if (isset($_POST["nama"]) && isset($_POST["uuid"])) {
        echo "2";
        // if (isset($_POST['namaplayer'])) {
        $nama = $_POST['namaplayer'];
        // $uuid = $_POST['uuid'];
        // $softban = $_POST["softban"];


        $cek = $nama;
        require("../proses/cekinput.php");
        if ($bersih) { // cek nama

            if ($nama != 1542) {
                echo "3 ";
                // echo "jalan";
                echo $nama;
            }
            // }

            // echo "3";
            // $cek = $uuid;
            // require("../proses/cekinput.php");
            // if ($bersih) { // cek uudi

            // echo "4";
            // $cek = $softban;
            // require("../proses/cekinput.php");
            // if ($bersih) { // cek softban

            // echo $uuid;
            // echo $softban;

            // $sql = "INSERT INTO PLAYER (NAME, UUID, SOFTBAN)
            // VALUES ('$nama', '$uuid', '$softban')";
            // if ($conn->query($sql) === TRUE) {
            //     echo "New record created successfully" . "<br>";
            // } else {
            //     echo "Error: " . $sql . "<br>" . $conn->error;
            // }

            //////////////
            // } else {
            //     header("Location: /php/login/logout.php"); //awto logout
            //     echo " kotor 3 ";
            // }
            // } else {
            //     header("Location: /php/login/logout.php"); //awto logout
            //     echo " kotor 2 ";

        } else {
            header("Location: /php/login/logout.php"); //awto logout
            echo " kotor ";
        }
        // }
    } else {
        header("Location: /php/login");
    }
    ?>



</body>

</html>
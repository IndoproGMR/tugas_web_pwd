<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Player</title>
</head>

<body>


    <h1>Daftar Player</h1>
    <hr>
    <br>
    <!-- --------------- -->
    <link rel="stylesheet" href="../style/table.css">
    <link rel="stylesheet" href="../style/input.css" />
    <a href="../home.php" class="btmhome">home</a>
    <a href="../input/player.php" class="btmhome">Input</a>
    <a href="../update/player.php" class="btmhome">Update</a>
    <a href="../delete/player.php" class="btmhome">Delete</a>
    <button onclick="cetak()" id="btm" class="btmhome">cetak</button>
    <script src="../js/print.js"></script>
    <!-- --------------- -->

    <br>
    <br>


    <table>
        <tr>
            <th>Nick</th>
            <th>Name</th>
            <th>UUID</th>
            <th>Softban</th>
        </tr>

        <?php
        require("../proses/ceklogin.php");
        require("../proses/sql.php");
        $sql = "SELECT * FROM PLAYER";
        if ($result = mysqli_query($conn, $sql)) { // mencari data

            if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                while ($row = mysqli_fetch_array($result)) { // print data 

                    $nick =  htmlspecialchars($row['NICKNAME']);
                    $namaplayer =  htmlspecialchars($row['NAME']);
                    $UUID =  htmlspecialchars($row['UUID']);
                    $SOFTBAN = htmlspecialchars($row['SOFTBAN']);

                    if ($SOFTBAN !== "Y") {
                        echo "<tr>";

                        echo "<td>" . $nick . "</td>";
                        echo "<td>" . $namaplayer . "</td>";
                        echo "<td>" . $UUID . "</td>";
                        echo "<td>" . $SOFTBAN . "</td>";

                        echo "</tr>";
                    } else { // bila player dalam softban maka beri tanda
                        echo "<tr class='Y'>";

                        echo "<td>" . $nick . "</td>";
                        echo "<td>" . $namaplayer . "</td>";
                        echo "<td>" . $UUID . "</td>";
                        echo "<td>" . $SOFTBAN . "</td>";

                        echo "</tr>";
                    }
                }
            }
        }
        ?>
    </table>

</body>

</html>
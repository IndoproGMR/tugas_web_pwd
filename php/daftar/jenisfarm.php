<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jenisfarm</title>
</head>

<body>




    <link rel="stylesheet" href="../style/input.css" />


    <style>
        table {
            padding: 1rem 0.5rem;
            width: 100%;
            border: 1px solid #cccccc;
        }

        tr {
            margin: 8px 0;
            padding: 10px;
            border: 1px solid #cccccc;
            text-align: center;
            width: 50%;
        }

        .Y>td {
            color: #cccccc;
            background-color: red;
        }

        th {
            font-size: 25px;
            padding: 10px;
            background-color: #aaffff;
            border: 1px solid #cccccc;
        }

        td {
            font-size: 15px;
            padding: 10px;
            border: 1px solid #cccccc;
            background-color: #aaaaff;
        }
    </style>
    <div class="table" style="display: a;">
        <h1>Daftar Jenis Farm</h1>
        <hr>
        <!-- --------------- -->
        <link rel="stylesheet" href="../style/table.css">
        <link rel="stylesheet" href="../style/input.css" />
        <a href="../home.php" class="btmhome">home</a>
        <a href="../input/jenisfarm.php" class="btmhome">Input</a>
        <a href="../update/jenisfarm.php" class="btmhome">Update</a>
        <a href="../delete/jenisfarm.php" class="btmhome">Delete</a>
        <button onclick="cetak()" id="btm" class="btmhome">cetak</button>
        <script src="../js/print.js"></script>
        <!-- --------------- -->
        <!-- <br>
    <a href="../home.php" class="btmhome">home</a>
    <br>
    <br> -->


        <table>
            <tr>
                <th>Id Hukuman</th>
                <th>Hukuman</th>
                <th>Diskripsi</th>
            </tr>

            <?php
            // require("../proses/ceklogin.php");
            require("../proses/sql.php");
            $sql = "SELECT * FROM JENIS_FARM";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $lvl =  htmlspecialchars($row['ID_JENIS_FARM']);
                        $nama =  htmlspecialchars($row['NAMA_JENIS_FARM']);
                        $Diskripsi =  htmlspecialchars($row['BIAYA']);

                        echo "<tr>";

                        echo "<td>" . $lvl . "</td>";
                        echo "<td>" . $nama . "</td>";
                        echo "<td>" . $Diskripsi . "</td>";

                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>

</body>

</html>
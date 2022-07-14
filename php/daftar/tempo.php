<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Level</title>
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

        .ijo {
            background-color: green;
        }

        .grey {
            background-color: gray;
        }

        .red {
            background-color: red;
        }
    </style>

    <div class="table" style>

        <h1>Daftar Donatur lvl</h1>
        <hr>
        <!-- <br>
    <a href="../home.php" class="btmhome">home</a>
    <br>
    <br> -->


        <table>
            <tr>
                <th>Nama</th>
                <th>January</th>
                <th>febuary</th>
                <th>Maret</th>
                <th>April</th>
                <th>Mei</th>
                <th>Juni</th>

                <th>Juli</th>
                <th>Agustus</th>
                <th>September</th>
                <th>Oktober</th>
                <th>Novermber</th>
                <th>Desember</th>


            </tr>

            <?php
            // require("../proses/ceklogin.php");



            require("../proses/sql.php");
            $sql = "SELECT NAME FROM DONATUR GROUP BY NAME";
            $namaar = array();
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    while ($row = mysqli_fetch_assoc($result)) { // print data 
                        $namaar[] = $row['NAME'];
                    }
                    // echo count($namaar);
                    for ($i = 0; $i < count($namaar); $i++) {
                        // echo $namaar[$i];
                        $sql = "select NAME, BULAN, JUMLAH_DONASI, ID_DONASI
                                from DONATUR
                                where ID_DONASI = (
                                SELECT ID_DONASI
                                FROM DONATUR
                                WHERE NAME = '$namaar[$i]'
                                ORDER by BULAN desc limit 1
                                )";

                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) { // bila data diatas 0
                                while ($row = mysqli_fetch_array($result)) { // print data 
                                    $nama =  htmlspecialchars($row['NAME']);
                                    $bulan =  htmlspecialchars($row['BULAN']);
                                    $jum =  htmlspecialchars($row['JUMLAH_DONASI']);
                                    $id =  htmlspecialchars($row['ID_DONASI']);

                                    echo "<tr>";

                                    echo "<td>" . $nama . "</td>";



                                    echo "<td>" . $bulan . "</td>";
                                    echo "<td>" . $jum . "</td>";
                                    echo "<td>" . $id . "</td>";

                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    // ku garap ginian mau nangis TwT
                }
            }
            ?>
        </table>
    </div>

</body>

</html>
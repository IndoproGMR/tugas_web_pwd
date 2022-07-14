<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
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

    <h1>Daftar Player</h1>
    <hr>
    <br>
    <a href="../home.php" class="btmhome">home</a>
    <br>
    <br>


    <table>
        <tr>
            <th>ID AKUN</th>
            <th>NAME AKUN</th>
            <th>HASH</th>
            <th>PASSWORD</th>
        </tr>

        <?php
        require("../proses/ceklogin.php");

        if ($valid) { // menerima signyal validasi dari ceklogin
            require("../proses/sql.php");
            $sql = "SELECT * FROM akun";
            if ($result = mysqli_query($conn, $sql)) { // mencari data

                if (mysqli_num_rows($result) > 0) { // bila data diatas 0

                    while ($row = mysqli_fetch_array($result)) { // print data 

                        $ID =  htmlspecialchars($row['ID_AKUN']);
                        $NAMA =  htmlspecialchars($row['NAME_AKUN']);
                        $HASHA = htmlspecialchars($row['HASH']);
                        $PASSA = htmlspecialchars($row['PASSWORD']);

                        echo "<tr>";

                        echo "<td>" . $ID . "</td>";
                        echo "<td>" . $NAMA . "</td>";
                        echo "<td>" . $HASHA . "</td>";
                        echo "<td>" . $PASSA . "</td>";

                        echo "</tr>";
                    }
                }
            }
        } else {
            header("Location: /php/login");
        }
        ?>
    </table>

</body>

</html>
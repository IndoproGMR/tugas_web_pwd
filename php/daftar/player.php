<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>




    <link rel="stylesheet" href="../style/input.css" />


    <style>
        table {
            padding: 1rem 0.5rem;
            width: 55%;
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

                    $namaplayer =  htmlspecialchars($row['NAME']);
                    $UUID =  htmlspecialchars($row['UUID']);
                    $SOFTBAN = htmlspecialchars($row['SOFTBAN']);

                    if ($SOFTBAN !== "Y") {
                        echo "<tr>";

                        echo "<td>" . $namaplayer . "</td>";
                        echo "<td>" . $UUID . "</td>";
                        echo "<td>" . $SOFTBAN . "</td>";

                        echo "</tr>";
                    } else { // bila player dalam softban maka beri tanda
                        echo "<tr class='Y'>";

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
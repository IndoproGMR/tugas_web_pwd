<link rel="stylesheet" href="../style/input.css" />


<style>
    table {

        padding: 1rem 0.5rem;
        width: 100%;
        /* margin: 50px; */
        /* margin: 8px 0;
        padding: 10px; */

        /* border: 1px solid #cccccc; */
    }

    tr {
        margin: 8px 0;
        padding: 10px;
        border: 1px solid #cccccc;
        text-align: center;
        width: 50%;
    }

    th {
        font-size: 25px;


        padding: 10px;
        background-color: #aaffff;

        border: 1px solid #cccccc;
    }

    td {
        /* font-size: 10px; */
        font-size: 15px;


        padding: 10px;
        border: 1px solid #cccccc;
        background-color: #aaaaff;
    }
</style>

<h1>Daftar Player</h1>
<hr>

<table>
    <tr>
        <th>Name</th>
        <th>UUID</th>
        <th>Softban</th>
    </tr>

    <?php
    require("../proses/sql.php");
    $sql = "SELECT * FROM PLAYER";
    if ($result = mysqli_query($conn, $sql)) { // mencari data

        if (mysqli_num_rows($result) > 0) { // bila data diatas 0

            // $i = 0;
            while ($row = mysqli_fetch_array($result)) { // print data 


                echo "<tr><td>" . htmlspecialchars($row['NAME']) . "</td><td>" . htmlspecialchars($row['UUID']) . "</td><td>" . htmlspecialchars($row['SOFTBAN']) . "</td></tr>";
            }
        }
    }

    ?>



</table>
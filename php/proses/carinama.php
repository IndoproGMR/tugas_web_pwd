<div>
    <?php
    require("../proses/sql.php");
    echo "<select name='namaplayer' id='namaplayer' value=''>";
    $sql = "SELECT * FROM PLAYER";
    if ($result = mysqli_query($conn, $sql)) { // mencari data

        if (mysqli_num_rows($result) > 0) { // bila data diatas 0

            echo "<option selected value='1542'>Pilih nama</option>";
            while ($row = mysqli_fetch_array($result)) { // print data 

                $namaplayer = array($row['NAME']);

                foreach ($namaplayer as $namaplayer) {

                    if ($namaplayer == $namaplayer) {
                        echo "<option>$namaplayer</option>";
                    } else {
                        echo "<option>$namaplayer</option>";
                    }
                }
            }
        }
    }
    echo "<select>";
    ?>
</div>
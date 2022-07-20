<? ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../foto/favicon.ico" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil</title>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
    }

    .nama {
        color: #dfdfdf;
        padding: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: #646464;
        width: 50%;
        height: 70px;
        margin: auto;
        text-decoration: none;
        border-radius: 20px;
    }

    .profil {
        display: flex;
        padding: auto;
        height: 140px;
        background-color: rgb(59, 59, 59);
    }

    .foto {
        margin: auto 20px;
        display: flex;
        /* background-color: red; */
        width: 100px;
        height: 100px;
    }

    nav {
        background-color: rgb(70, 224, 72);
        height: 50px;
    }

    nav a {
        background-color: rgb(114, 253, 116);
        float: left;
        color: #323232;
        text-align: center;
        padding: 15px 16px;
        text-decoration: none;
        font-size: 17px;
        /* margin-left: 10px; */
    }

    nav a:hover {
        background-color: aliceblue;
        color: #323232;
    }


    .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    .column {
        float: left;
        width: 50%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

<body>
    <nav>
        <a href="../home.php">Home</a>
        <a href="../akun/updateakun.php">Update Akun</a>
        <a href="../akun/logout.php">Log out</a>
        <a href="../index.php">Index</a>

    </nav>
    <div class="profil">
        <div class="foto"><img src="../foto/profile.png" alt="" /></div>
        <div class="nama">
            <h1>
                <?php
                if (isset($_COOKIE["username"])) {
                    $nick = $_COOKIE["username"];
                    echo "$nick";
                } else {
                    echo "<a href='../login' class='name'>Login</a>";
                }
                ?>
            </h1>
        </div>
    </div>





    <div class="row">
        <div class="column">
            <!--  -->
        </div>
        <div class="column">
            <!--  -->
        </div>
        <div class="column">
            <!--  -->
        </div>
    </div>
    <div class="row">
        <div class="column">
            <!--  -->
        </div>
        <div class="column">
            <!--  -->
        </div>
        <div class="column">
            <!--  -->
        </div>
    </div>

</body>

</html>
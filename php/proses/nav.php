<? ob_start(); ?>

<div class="topnav" id="myTopnav">
    <img class="logo" src="foto/Logo _transapran.png" alt="logo" onclick="klik()" />
    <!-- <a href="./" class="active" id="back">Back</a> -->
    <!-- class="active" -->

    <a href="/php/home.php" class="dropbtn">Home</a>

    <!-- <div class="dropdown">
        <button class="dropbtn">Akun</button>
        <div class="dropdown-content">
            <a href="../php/login">Login</a>
            <a href="../php/login/logout.php">Logout</a>
            <a href="../php/login/gantipass.php">Ganti Pass</a>
        </div>
    </div> -->

    <div class="dropdown">
        <button class="dropbtn">Daftar</button>
        <div class="dropdown-content">
            <a href="../php/daftar/player.php">Daftar player</a>
            <a href="../php/daftar/donatur.php">Daftar donatur</a>
            <a href="../php/daftar/pelanggaran.php">Daftar Pelanggar</a>
            <a href="../php/daftar/farm.php">Daftar farm</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Input</button>
        <div class="dropdown-content">
            <a href="../php/input/player.php">Input Player</a>
            <a href="../php/input/pelanggaran.php">Input Pelanggaran</a>
            <a href="../php/input/donatur.php">Input Donatur</a>
            <a href="../php/input/hukuman.php">Input Hukuman</a>
            <a href="../php/input/farm.php">Input farm</a>
            <a href="../php/input/jenisfarm.php">Input Jenis farm</a>
            <a href="../php/input/rule.php">Input Rule</a>
            <a href="../php/input/donatur_lvl.php">Input Donatur lvl</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Update</button>
        <div class="dropdown-content">
            <a href="../php/update/player.php">Update Player</a>
            <a href="../php/update/pelanggaran.php">Update Pelanggar</a>
            <a href="../php/update/donatur.php">Update Donatur</a>
            <a href="../php/update/hukuman.php">Update Hukuman</a>
            <a href="../php/update/farm.php">Update farm</a>
            <a href="../php/update/jenisfarm.php">Update Jenis farm</a>
            <a href="../php/update/rule.php">Update Rule</a>
            <a href="../php/update/donatur_lvl.php">Update Donatur lvl</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Delete</button>
        <div class="dropdown-content">
            <a href="../php/delete/player.php">Delete Player</a>
            <a href="../php/delete/pelanggaran.php">Delete pelanggaran</a>
            <a href="../php/delete/donatur.php">Delete Donatur</a>
            <a href="../php/delete/hukuman.php">Delete Hukuman</a>
            <a href="../php/delete/farm.php">Delete Farm</a>
            <a href="../php/delete/jenisfarm.php">Delete Jenis Farm</a>
            <a href="../php/delete/rule.php">Delete rule</a>
            <a href="../php/delete/donatur_lvl.php">Delete donatur lvl</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Bangunan</button>
        <div class="dropdown-content">
            <a href="../php/input/farm.php">Input farm</a>
            <a href="../php/update/farm.php">Update farm</a>
            <a href="../php/delete/farm.php">Delete farm</a>
            <a href="../php/daftar/farm.php">Daftar farm</a>
            <a href="">sertifikat farm</a>
        </div>
    </div>






    <?php
    if (isset($_COOKIE["username"])) {
        $nick = $_COOKIE["username"];
        echo "<a href='akun' class='name'>" . $nick . "</a>";
    } else {
        echo "<a href='login' class='name'>Login</a>";
    }
    ?>




    <a href="javascript:void(0);" class="icon" onclick="burger()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<br />
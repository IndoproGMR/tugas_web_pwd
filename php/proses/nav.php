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
            <a href="../daftar/player.php">Daftar player</a>
            <a href="">Daftar donatur</a>
            <a href="">Daftar Pelanggar</a>
            <a href="">Daftar farm</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Input</button>
        <div class="dropdown-content">
            <a href="../php/input/player.php">Input Player</a>
            <a href="">Input Donatur</a>
            <a href="">Input Hukuman</a>
            <a href="">Input Jenis farm</a>
            <a href="">Input Rule</a>
            <a href="">Input Donatur lvl</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">delete</button>
        <div class="dropdown-content">
            <a href="../php/delete/player.php">delete Player</a>
            <a href="">delete Donatur</a>
            <a href="">delete donatur lvl</a>
            <a href="">delete Hukuman</a>
            <a href="">delete Farm</a>
            <a href="">delete Jenis Farm1</a>
            <a href="">delete pelanggaran</a>
            <a href="">delete rule</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Bangunan</button>
        <div class="dropdown-content">
            <a href="">Daftar farm</a>
            <a href="">Input farm</a>
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
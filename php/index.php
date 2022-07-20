<!DOCTYPE html>
<html lang="en">

<!-- NAMA KELOMPOK -->
<!-- 2010651170 ACHMAD NAJI -->
<!-- 2010651165 VIRA SAFITRI SARI -->

<head>
    <link rel="icon" href="foto/favicon.ico" />
    <script src="js/bergerres.js"></script>
    <link rel="stylesheet" href="style/style2.css" />
    <script src="https://kit.fontawesome.com/90facb6ab3.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Input database Server</title>
</head>
<style>
    .bg {
        background-image: url("foto/bg.jpg");
        /* background-position: center; */
        background-repeat: no-repeat;
        /* width: 1366px; */
        /* margin-top: 100px; */
        width: 100%;
        height: auto;
        background-size: 100%;

        /* background-size: cover; */
    }

    .bga {
        background-color: #cacaca7c;
        margin: 5px;
        padding: 10px;
        border-radius: 10px;

    }

    .tombol {
        background-color: #4cbb48;
        border-radius: 10px;
        padding: 10px;
        transition: 300ms;
    }

    .tombol:hover {
        background-color: #ffffff7c;
    }
</style>

<body class="bg">
    <?php
    require("../php/proses/nav.php");
    ?>
    <div class="bga">
        <H2>Selamat datang pada Laman utama FurCaf</H2>
        <hr>




        <div class="p">
            <p>dimana Anda dapat menginputkan data melihat data</p>
            <p>Tujuan Utama web ini di buat adalah untuk mendata data player dan men Archive data server</p>
            <p>Seperti : </p>
            <p>Mendata Jumlah Donasi Player berikan, </p>
            <p>Mendata siapa saja yang melanggarar peraturan, </p>
            <p>Mendata Bangunan dan pajak per tahun.</p>
            <br>
            <p>Foto dan gif berada didalam Data Archive</p>

            <br>
            <a href="../php/arc" class="tombol">Data Archive</a>
            <br>
            <p>untuk video saya menggunakan Iframe yang di ambil dari youtube</p>
            <br>
            <h4>latest video In FurCaf Studio</h4>
            <?php
            $idvideo = NULL;
            $channel_id = 'UC0yf01H9z-0l84j4EzgWJGQ'; // id channel

            $xml = simplexml_load_file(sprintf('https://www.youtube.com/feeds/videos.xml?channel_id=%s', $channel_id));

            if (!empty($xml->entry[0]->children('yt', true)->videoId[0])) {
                $idvideo = $xml->entry[0]->children('yt', true)->videoId[0];
            }

            // echo $idvideo; // Outputs the video ID.
            echo "<iframe src='https://www.youtube.com/embed/$idvideo'></iframe>";
            ?>


            <br>
            <p>Untuk jurnal pengerjaan semua berada di dalam github commit saya</p>
            <a href="https://github.com/IndoproGMR/tugas_web_pwd" class="tombol">GitHub</a>
            <br>
            <br>
            <br>
            <h4>NAMA KELOMPOK</h4>
            <p>2010651170 ACHMAD NAJI</p>
            <p>2010651165 VIRA SAFITRI SARI</p>

            <br>
            <br>



            <!-- jangan lupa untuk menghapus text dibawa ini -->
            <p>pertama mohon untuk memasukan data sql dangan nama databese "test"</p>
            <p>kedua mohon untuk login terlebih dahulu pada tab akun</p>
            <p>bila mengalami kendala pada login mohon untuk tidak memblok cookie</p>
            <p>bila login tetap bermasalah ada kemungkinan masalah ada pada link</p>
            <p>http://localhost<b>/php/home.php</b></p>
            <p>link yang seharus nya seperti diatas</p>
            <br>
            <p>projek ini mengandung <code>ob_start();</code> dan <code>.htaccess</code> yang mungkin akan broke pada suatu saat :"D </p>

            <br>
            <br>

        </div>

        <!-- <a href="../php/daftar/tempo.php">tempo</a> -->
    </div>
</body>

</html>
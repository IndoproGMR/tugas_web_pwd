untuk sql pastikan nama database "test" 

setelah membuat database install folder di htdocs/

karena ku lupa memastikan kalo dapat di install di dalam +1~+++ folder didalam folder htdocs/ :""D

setelah masuk ../php/index.php
maka dapat login dengan menekan tab home atau akun lalu login


[github untuk update terbaru]
https://github.com/IndoproGMR/tugas_web_pwd


bila database tidak dapat diakses mohon untuk mengubah ../php/proses/sql.php
untuk mengubah
username >> "root"
password >> ""








[skema alur data]



staff login > memberikan username dan password dan remember me


[update akun]

id random
name (update)
password (update)
hash (update)

name (raw)
password (sha256^2)
hash (<name>_<password sha256^1>)



update akun

dicari hash
dapatkan id

update nama atau password
lalu ambil nama dan password sha256^1
update hash

set hash pada session berikan set key dan expire

[login]

memberikan name dan password sha256^1
cari hash

cocokan hash dan password

update pada session berikan set key dan expire

[loguot]

reset cookie
reset session

[cek login]

hash dan session berada di cookie

hash dan session dan exp di cek apakah sama atau tidak

bila tidak sama
if (!same){



sql session direset yang memiliki hash yang sama
reset cookie hash dan session

alihkan ke login
}
bila sama
if (true){
renew session key
biarkan masuk / exekusikan program
}


[renew session]
random key

update database
setcookie


[delete]
combobox (nama)

confirm 




[depen]
cekinput.php >> ceklogin.php >> renewkey.php









    <?php
    require("../proses/ceklogin.php");
    if ($valid) { // menerima signyal validasi dari ceklogin
        if (isset($_POST["nama"]) && isset($_POST["uuid"])) {
            $nama = $_POST['nama'];
            $cek = $nama; //input
            require("../proses/cekinput.php");
            if ($bersih) {
				//<code>
            } else {
                header("Location: /php/login/logout.php"); //awto logout
            }
        }
    } else {
        header("Location: /php/login");
    }
    ?>







[uuid]
function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

// $myuuid = guidv4();
// echo $myuuid; // Output

[]






[valid done]

akun/
akun/logout.php

input/player.php




login/index.php

proses/admin.php
proses/cekinput.php
proses/ceklogin.php
proses/nav.php
proses/renewkey.php
proses/sql.php

home.php
index.php















http://139.99.118.72:7089/?worldname=DUNIA%20DALAM%20BERITA&mapname=flat&zoom=5&x=434&y=64&z=-2156

http://139.99.118.72:7089/?worldname=DUNIA%20DALAM%20BERITA_nether&mapname=flat&zoom=5&x=6&y=64&z=6


"http://".$iplink."/?worldname=DUNIA%20DALAM%20BERITA".$world."&mapname=flat&zoom=5&x=".$x."&y=64&z=".$z;



$link = "http://" . $iplink . "/?worldname=DUNIA%20DALAM%20BERITA" . $world . "&mapname=flat&zoom=4&x=" . $X . "&y=64&z=" . $Z;
<a href='$link' target='_blank'>Link</a>







$sqllink = "SELECT NAME, NAMA_FARM, NAMA_JENIS_FARM, DESKRIPSI, UKURAN, WORLD , Z, X, PAJAK
FROM FARM F INNER JOIN JENIS_FARM J
ON (F.ID_JENIS_FARM = J.ID_JENIS_FARM)
WHERE ";
// F.ID_JENIS_FARM = '2000';
// F.WORLD = '_%'

if ($nama !== "1542"){
    $sqllink = $sqllink. "F.NAME = '$name' AND";
}

if ($world === "*") {
    $sql = $sqllink. "F.WORLD LIKE '_%';";
} else{
    $sql = $sqllink."F.WORLD = '$world';";
}


bila nama ada maka kasi nama dulu lalu didalam nama ada koma


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

$sql = 

SELECT ID_PELANGGARAN, NAME, RULENAME, HUKUMAN, LAMA
FROM PELANGGARAN P
INNER JOIN RULE R
ON P.IDRULE = R.IDRULE
INNER JOIN HUKUMAN H
ON P.IDHUKUM = H.IDHUKUM
WHERE P.NAME = "RiveraMaxwell"
ORDER BY P.NAME


UPDATE dan DELETE DONASI

<option value="id"> nama - lvl - jumlah - bulan </option>


yang di ubah lvl - jumlah - bulan

SELECT NAME, NAMATINGKATAN, BULAN, JUMLAH_DONASI
FROM DONATUR D INNER JOIN DONATUR_LVL L
ON (D.IDDLVL = L.IDDLVL)
ORDER BY D.NAME

SELECT NAME, NAMATINGKATAN, BULAN, JUMLAH_DONASI FROM DONATUR D INNER JOIN DONATUR_LVL L ON (D.IDDLVL = L.IDDLVL) ORDER BY D.NAME







data 202207 untuk juli 2022

diset manual ke database


tambhana table bulan 
juli 2022 nama
202207 id

bila player sudah membayar 20k maka akan ditagih di bulan september

21k rounddown ke 20k
27k rounddown ke 20k
rounddown donasi % 10k = 2

maka tambahkan waktu 2 = 202209

bila 202213 maka tambahkan 101 = 202301

bila donasi 150k maka ditambah 15 = 202222
maka tambahkan 203 = 202403



atau buat jadi tanggal saja (terbukti bisa)
Bulan + 15 jadi

setiap donasi beri bulan dan tahun donasi dan jumlah donasi

bila pada tanggal 30 febuary dan di set febuary 2022 dan jumlah donasi nya itu adalah 50k
maka dia akan padat waktu 5 bulan hingga juli 2022 

febuary 2022 5 bulan

febuary (oke)
maret (oke)
april (oke)
mei (oke)
juni (oke)
juli (oke)

agustus (merah)
september (merah)

donasi lagi oktober 2022 20k
oktober (oke)
november (oke)

desember (merah)

donasi lagi desember 2022 10k
desember (oke)

januari (merah)

bila tgl sekarang lebih kecil dari tempo maka diberi bg hijau
bila tgl sekarang sama dengan tempo maka beri bg hijau
bila tgl sekarang lebih besar dari tempo maka diberi bg merah
bila tgl donasi lebih kecil dari tgl donasi maka beri bg gray

//////////////////

for nama 

nama1  bulan1  bulan2  bulan3
nama2  bulan1  bulan2  bulan3
nama3  bulan1  bulan2  bulan3

tr

th nama1  /th
th bulan1 /th
th bulan2 /th
th bulan3 /th

/tr

tr

td nama /td
td januari /td
td febuary /td
td maret /td

/tr

bila nama1 memiliki tag tgl febuary 2022 dengan keuangan rounddown ke 50k
maka tambah dan ubah tag menjadi 202207
ubah tag database menjadi 202202 bila
bulan1 (202201) >= tempo(202207) maka beri bg hijau
bulan8 (202208) >= tempo(202207) maka beri bg merah


bila player donasi 2 kali maka ambil donasi paling terbaru

atau order by nama

nama1a feb ~ mei sisa akan merah
nama1b juni ~ agus yang diambil terakhir








////////////////////////////////

for nama

nama1   nama2   nama3
bulan1  bulan1  bulan1
bulan2  bulan2  bulan2
bulan3  bulan3  bulan3


tr

th nama1 /th
th nama2 /th
th nama3 /th

/tr

bila 








select R1.id,
       R1.groupid,
       R1.name,
       R1.code
from RawTable as R1
  inner join (  
              select name, code, max(groupid) as groupid
              from RawTable
              group by name, code
             ) as R2
    on R1.name = R2.name and
       R1.code = R2.code and
       R1.groupid = R2.groupid


SELECT D1.NAME, D1.IDDLVL, D1.BULAN, D1.JUMLAH_DONASI, D1.TGL_DONASI
FROM DONATUR as D1
INNER JOIN (
    SELECT NAME, IDDLVL,MAX(BULAN) AS BULAN, JUMLAH_DONASI, TGL_DONASI
    FROM DONATUR
) as D2
ON 
D1.NAME = D2.NAME AND
D1.IDDLVL = D2.IDDLVL AND
D1.BULAN = D2.BULAN AND
D1.JUMLAH_DONASI = D2.JUMLAH_DONASI AND
D1.TGL_DONASI = D2.TGL_DONASI



SELECT D1.NAME, D1.IDDLVL, D1.BULAN, D1.JUMLAH_DONASI, D1.TGL_DONASI
FROM DONATUR as D1
INNER JOIN (
    SELECT NAME, IDDLVL,MAX(BULAN) AS BULAN, JUMLAH_DONASI, TGL_DONASI
    FROM DONATUR
) as D2
ON 
D1.NAME = D2.NAME AND
D1.JUMLAH_DONASI = D2.JUMLAH_DONASI




SELECT NAME, IDDLVL, BULAN, JUMLAH_DONASI, TGL_DONASI, COUNT(*)
FROM DONATUR
GROUP BY NAME
HAVING COUNT(*)>1




select R.id,
       R.groupid,
       R.name,
       R.code
from (select id, 
             groupid, 
             name, 
             code,
             row_number() over(partition by name, code order by groupid desc) as rn
      from RawTable       
     ) as R
where R.rn = 1



SELECT D1.NAME, D1.IDDLVL, D1.BULAN, D1.JUMLAH_DONASI, D1.TGL_DONASI, d1.ID_DONASI
FROM SELECT 
NAME, 
IDDLVL,
BULAN,
JUMLAH_DONASI,
TGL_DONASI
row_number() over(partition by name ORDER by ID_DONASI) AS D2
    FROM DONATUR
) as D1
WHERE D1.D2 = 1


select top (1) 
with ties ID, DayNumber, Mfm, value
from
table
order by row_number() over (partiton by
                            ID, DayNumber, Mfm
                            order by value desc)



SELECT top(1)
WITH TIES ID_DONASI, NAME, IDDLVL, BULAN, JUMLAH_DONASI,TGL_DONASI
FROM DONATUR
ORDER BY row_number() OVER (partition BY ID_DONASI, NAME, IDDLVL, BULAN, JUMLAH_DONASI,TGL_DONASI
ORDER BY BULAN DESC
)




SELECT NAME, BULAN, COUNT(NAME), MAX(TGL_DONASI), MAX(BULAN)
FROM DONATUR
GROUP BY NAME
ORDER BY BULAN

SELECT NAME, BULAN
FROM DONATUR
ORDER BY BULAN


ubah bulan jadi int 
januari 2022 ke 2022-01




SELECT D1.ID_DONASI D1.NAME, MAX(D1.BULAN) AS BULAN, D1.JUMLAH_DONASI
FROM DONATUR D1
INNER JOIN DONATUR D2
ON D1.JUMLAH_DONASI = D2.JUMLAH_DONASI AND
D1.ID_DONASI = D2.ID_DONASI AND
D1.BULAN = D2.BULAN AND
D1.NAME = D2.NAME
GROUP BY D1.NAME



SELECT *
FROM WF_Approval sr1
WHERE NOT EXISTS (
    SELECT *
    FROM  WF_Approval sr2 
    WHERE sr1.DocumentID = sr2.DocumentID AND 
          sr1.Status = sr2.Status AND                  # <-- new line
          sr1.StepNumber < sr2.StepNumber
) AND MasterStepID = 'Approval1'


SELECT D1.ID_DONASI, D1.NAME, D1.BULAN, D1.JUMLAH_DONASI
FROM DONATUR D1
WHERE (
    SELECT MAX(D2.BULAN) AS BULAN
    FROM DONATUR D2
    WHERE D1.ID_DONASI = D2.ID_DONASI AND
    D1.NAME = D2.NAME AND
    D1.JUMLAH_DONASI = D2.JUMLAH_DONASI
)


SELECT NAME, BULAN ,JUMLAH_DONASI
FROM DONATUR
WHERE BULAN = (
    SELECT MAX(BULAN)
FROM DONATUR
)
GROUP BY NAME

SELECT NAME, MAX(BULAN) ,JUMLAH_DONASI, ID_DONASI
FROM DONATUR
GROUP BY NAME

SELECT NAME, BULAN ,JUMLAH_DONASI, ID_DONASI
FROM DONATUR
GROUP BY NAME

cari nama
CARI BULAN
CARI ID_DONASI
ORDER BY BULAN




select NAME
from DONATUR
GROUP by NAME

for ()

SELECT NAME, BULAN, ID_DONASI
FROM DONATUR
WHERE NAME = '$name'
ORDER BY BULAN DESC

row 1 ambil id

select *
from DONATUR
where ID_DONASI = $id


select *
from DONATUR
where ID_DONASI = (
    SELECT ID_DONASI
    FROM DONATUR
    WHERE NAME = (
        SELECT NAME
        FROM DONATUR
        WHERE ID_DONASI = 1
    ) ORDER by BULAN desc limit 1
)


fuck berhasil juga :"D


select *
from DONATUR
where ID_DONASI = (
    SELECT ID_DONASI
    FROM DONATUR
    WHERE NAME = (
        SELECT NAME
        FROM DONATUR
        WHERE ID_DONASI = $id
    ) ORDER by BULAN desc limit 1
)



select NAME
from DONATUR
GROUP by NAME

for ()

select NAME, BULAN, JUMLAH_DONASI, ID_DONASI
from DONATUR
where ID_DONASI = (
    SELECT ID_DONASI
    FROM DONATUR
    WHERE NAME = '$nama'
    ORDER by BULAN desc limit 1
)

$JUMLAH_DONASI = round ($JUMLAH_DONASI, -4);


date($bulan + $JUMLAH_DONASI)
date(2022-04 + 4) = ($tempo) 2022-08

$tgl = "2022-";
$bulan = "02";
$test = $tgl . "03";
echo $test;




for nama 

nama1  bulan1  bulan2  bulan3
nama2  bulan1  bulan2  bulan3
nama3  bulan1  bulan2  bulan3

tr

th nama1  /th
th bulan1 /th
th bulan2 /th
th bulan3 /th

/tr



$tgl = "2022-";
if ($tgl . "03" > "2022-04") {
    echo "jalan";
} else {
    echo "tidak jalan";
}
echo "<br>";
echo "<br>";

tr

td nama /td

if($thn."01" > $tempo){
beri bg merah
}


if ($tgl <= $tempo){
    beri bg hijau
}


if ($tgl < $bulan){
    beri bg abu2
}
td januari /td

if()
td febuary /td

if()
td maret /td

/tr
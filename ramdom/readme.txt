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





[sql update]
+ table akun > id(int 8 P) + name(varchar 64) + password(varchar 64) + hash(varchar 64 P) + time_akun(timestamp)
+ table session > hash(table akun) + sessionkey (int 8 null) + exp(int 8 null)
U table farm > world(varchar 64) + (X > Z)
D table notebank
D table akun_ganda
D table pencairan


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
































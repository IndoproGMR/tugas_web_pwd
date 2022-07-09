// <button onclick="show()" id="btm" class="btmhome">tampilkan Daftar</button>
//<?php require_once("../daftar/X.php"); ?>
//<script src="../js/show.js"></script>

var table = document.getElementsByClassName('table');
table[0].style.display = "none";
function show() {
    if (table[0].style.display === "none") {
        table[0].style.display = "";
    } else {
        table[0].style.display = "none";
    }
}
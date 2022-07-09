//<!-- --------------- -->
//<link rel="stylesheet" href="../style/input.css" />
//<a href="../home.php" id="btm" class="btmhome">home</a>
//<button onclick="cetak()" id="btm" class="btmhome">cetak</button>
//<script src="../js/print.js"></script>
//<!-- --------------- -->

var btmhome = document.getElementsByClassName('btmhome');

    function cetak() { //fungsi nya untuk menghide button dan mengprint
        setTimeout(function() {
            window.print();
        }, 200);
        /////////////////
        for (var i = 0; i < btmhome.length; i++){
            btmhome[i].style.display = "none";
        }
        /////////////////////
        setTimeout(function () { //untuk menampil button

            for (var i = 0; i < btmhome.length; i++){
                btmhome[i].style.display = "";
            }
        }, 500);
    }
<?php
// data IO
// Input = $cek (string)
// output = $bersih (boolean)

$cek1 = strtoupper($cek);


$filter = array(
    ' UNION ' => 1,
    ' INSERT ' => 2,
    ' UPDATE ' => 3,
    ';' => 4,
    '--' => 5,
    ' DROP ' => 6,
    ' WHERE ' => 7,
    ' OR ' => 8,
    ' SELECT ' => 9,
    "'" => 10

);


$filtertext = str_replace(array_keys($filter), "", $cek1);

if ($cek1 === $filtertext) { //cek apakah hasil filter dan namanya sama
    $bersih = true;
} else {
    $bersih = false;
}

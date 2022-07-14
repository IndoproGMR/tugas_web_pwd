<?
$random = random_int(000, 9999);
setcookie("session", $random, time() + (86400 * 6), "/");

echo $random;

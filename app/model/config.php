<?php
$hostname = "localhost";
$username = "root";
$password = "";
//$username = "kpuntuak9_intrapuntual";
//$password = "woqcsJh!^?RK";

/*
$hostname = "172.16.23.150";
$username = "intranet";
$password = "NB9oVJdvrFCFP6Uh";
*/

$dbname = "kpuntuak9_puntualmente";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
?>
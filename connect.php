<?php
$host = "localhost";
$db = "latihanweb";
$user = "root";
$password = "";
$kon = mysqli_connect($host, $user, $password, $db);

if(!$kon) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
?>

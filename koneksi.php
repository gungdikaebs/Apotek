<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "db_apotek";

$koneksi = mysqli_connect("$server","$user","$pass","$database");

if (!$koneksi) {
    die ("Gagal terhubung ke database: " . mysqli_connect_error());
}

?>
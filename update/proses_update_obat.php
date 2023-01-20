<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script> alert('Maaf Anda Belum Login'); location.href='../login/login.php' </script>";
} elseif ($_SESSION['leveluser'] == 'karyawan') {
    echo"<script> alert('Maaf Anda Tidak Mengakses karena anda adalah karyawan'); location.href='../view/dashboard.php' </script>";
}

require '../koneksi.php';

$idobat = $_POST['idobat'];
$idsupplier = $_POST['idsupplier'];
$namaobat = $_POST['namaobat'];
$kategoriobat = $_POST['kategoriobat'];
$hargajual = $_POST['hargajual'];
$hargabeli = $_POST['hargabeli'];
$stok_obat = $_POST['stok_obat'];
$keterangan = $_POST['keterangan'];


$query = "UPDATE tb_obat set idobat='$idobat', idsupplier='$idsupplier', namaobat='$namaobat', kategoriobat='$kategoriobat', hargajual='$hargajual', hargabeli='$hargabeli', stok_obat='$stok_obat', keterangan='$keterangan' where idobat='$idobat'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi, $hasil));
} else {
    echo "<script>
        alert('Berhasil diupdate')
        document.location.href='../view/viewobat.php';
        </script>
        ";
}

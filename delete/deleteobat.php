<?php

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Maaf Anda Belum Login'); location.href='../login/login.php' </script>";
} elseif ($_SESSION['leveluser'] == 'karyawan') {
    echo "<script> alert('Maaf Anda Tidak Mengakses karena anda adalah karyawan'); location.href='../view/dashboard.php' </script>";
}

require '../koneksi.php';


$id = $_GET['idobat'];
$query = " DELETE FROM tb_obat WHERE idobat='$id' ";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal menghapus" . mysqli_errno($koneksi));
} else {
    echo "<script>alert('Data Obat berhasil terhapus');window.location='../view/viewobat.php';</script>";
}

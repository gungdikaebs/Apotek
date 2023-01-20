<?php
require '../koneksi.php';


$id = $_GET['idpelanggan'];
$query = "DELETE FROM tb_pelanggan WHERE idpelanggan='$id' ";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal menghapus" . mysqli_errno($koneksi));
} else {
    echo "<script>alert('Data Obat berhasil terhapus');window.location='../view/viewpelanggan.php';</script>";
}

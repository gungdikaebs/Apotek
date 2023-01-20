<?php
require '../koneksi.php';


$id = $_GET['idsupplier'];
$query = " DELETE FROM tb_supplier WHERE idsupplier='$id' ";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal menghapus" . mysqli_errno($koneksi));
} else {
    echo "<script>alert('Data Obat berhasil terhapus');window.location='../view/viewsupplier.php';</script>";
}

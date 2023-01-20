<?php
require '../koneksi.php';

// Cek apakah tombol submit sudah diklik
// `if (isset($_POST['simpan'])){`

// Cek data yang dari formulir
$idpelanggan = $_POST['idpelanggan'];
$idkaryawan = $_POST['idkaryawan'];
$tgltransaksi = $_POST['tgltransaksi'];
$kategori = $_POST['kategoripelanggan'];
$total = $_POST['totalbayar'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];

// buat query
$query = "INSERT INTO tb_transaksi 
    VALUES ('','$idpelanggan','$idkaryawan','$tgltransaksi','$kategori','$total','$bayar','$kembali')";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal menginputkan data" . mysqli_errno($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil Masuk');window.location='../view/viewtransaksi.php';
        </script>";
}

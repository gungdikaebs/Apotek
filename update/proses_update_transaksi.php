<?php
require '../koneksi.php';

$idtransaksi = $_POST['idtransaksi'];
$idpelanggan = $_POST['idpelanggan'];
$idkaryawan = $_POST['idkaryawan'];
$tgltransaksi = $_POST['tgltransaksi'];
$kategoripelanggan = $_POST['kategoripelanggan'];
$totalbayar = $_POST['totalbayar'];
$bayar = $_POST['bayar'];
$kembali = $_POST['kembali'];


$query = "UPDATE tb_transaksi set 
idtransaksi='$idtransaksi', 
idpelanggan='$idpelanggan', 
idkaryawan='$idkaryawan', 
tgltransaksi='$tgltransaksi', 
kategoripelanggan='$kategoripelanggan', 
totalbayar='$totalbayar', 
bayar='$bayar', 
kembali='$kembali' 
WHERE idtransaksi='$idtransaksi'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi, $hasil));
} else {
    echo "<script>
        alert('Berhasil diupdate')
        document.location.href='../view/viewtransaksi.php';
        </script>
        ";
}

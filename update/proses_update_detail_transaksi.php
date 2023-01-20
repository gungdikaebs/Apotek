<?php
require '../koneksi.php';

$iddetailtransaksi = $_POST['iddetailtransaksi'];
$idtransaksi = $_POST['idtransaksi'];
$idobat = $_POST['idobat'];
$jumlah = $_POST['jumlah'];
$hargasatuan = $_POST['hargasatuan'];
$totalharga = $_POST['totalharga'];


$query = "UPDATE tb_detail_transaksi set 
iddetailtransaksi='$iddetailtransaksi', 
idtransaksi='$idtransaksi', 
idobat='$idobat', 
jumlah='$jumlah', 
hargasatuan='$hargasatuan', 
totalharga='$totalharga' 
WHERE iddetailtransaksi='$iddetailtransaksi'";
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

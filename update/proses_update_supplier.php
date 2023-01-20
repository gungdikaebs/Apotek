<?php
require '../koneksi.php';

$idsupplier = $_POST['idsupplier'];
$perusahaan = $_POST['perusahaan'];
$keterangan = $_POST['keterangan'];


$query = "UPDATE tb_supplier set idsupplier='$idsupplier', perusahaan='$perusahaan', keterangan='$keterangan' WHERE idsupplier='$idsupplier'";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal memasukan data Obat " . mysqli_query($koneksi, $hasil));
} else {
    echo "<script>
        alert('Berhasil diupdate')
        document.location.href='../view/viewsupplier.php';
        </script>
        ";
}

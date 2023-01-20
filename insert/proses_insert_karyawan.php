<?php
require '../koneksi.php';

// Cek apakah tombol submit sudah diklik
// `if (isset($_POST['simpan'])){`

// Cek data yang dari formulir
$namakaryawan = $_POST['namakaryawan'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];

// buat query
$query = "INSERT INTO tb_karyawan 
    VALUES ('','$namakaryawan','$alamat','$telp')";

$hasil = mysqli_query($koneksi, $query);

if (!$hasil) {
    die("Gagal menginputkan data " . mysqli_errno($koneksi));
} else {
    echo "<script>
        alert('Data Berhasil Masuk');window.location='../view/viewkaryawan.php';
        </script>";
}

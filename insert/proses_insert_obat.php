<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    echo"<script> alert('Maaf Anda Belum Login'); location.href='../login/login.php' </script>";
} elseif ($_SESSION['leveluser'] == 'karyawan') {
    echo"<script> alert('Maaf Anda Tidak Mengakses karena anda adalah karyawan'); location.href='../view/dashboard.php' </script>";
}

require '../koneksi.php';

// Cek apakah tombol submit sudah diklik
// `if (isset($_POST['simpan'])){`

    // Cek data yang dari formulir
    $idsupplier = $_POST['idsupplier'];
    $namaobat = $_POST['namaobat'];
    $kategoriobat= $_POST['kategoriobat'];
    $hargajual = $_POST['hargajual'];
    $hargabeli = $_POST['hargabeli'];
    $stokobat = $_POST['stokobat'];
    $keterangan = $_POST['keterangan'];

    // buat query
    $query = "INSERT INTO tb_obat 
    VALUES ('','$idsupplier','$namaobat','$kategoriobat','$hargajual', '$hargabeli', '$stokobat','$keterangan')";

    $hasil = mysqli_query($koneksi, $query); 

    if (!$hasil){
        die ("Gagal menginputkan data". mysqli_errno($koneksi));
    } else {
        echo 
        "<script> 
        alert('Data Berhasil Masuk');window.location='../view/viewobat.php';
        </script>";        
    }
?>
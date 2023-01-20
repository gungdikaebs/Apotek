<?php
require '../koneksi.php';

// Cek apakah tombol submit sudah diklik
// `if (isset($_POST['simpan'])){`

    // Cek data yang dari formulir
    $idkaryawan = $_POST['idkaryawan'];
    $namakaryawan = $_POST['namakaryawan'];
    $alamat= $_POST['alamat'];
    $telp = $_POST['telp'];

    // buat query
    $query = "UPDATE tb_karyawan 
    SET idkaryawan='$idkaryawan',namakaryawan='$namakaryawan',alamat='$alamat',telp='$telp'
    WHERE idkaryawan='$idkaryawan'";

    $hasil = mysqli_query($koneksi, $query); 

    if (!$hasil){
        die ("Gagal menginputkan data obat". mysqli_errno($koneksi));
    } else {
        echo "<script>
        alert('Data Obat Berhasil Masuk');window.location='../view/viewkaryawan.php';
        </script>";        
    }
?>
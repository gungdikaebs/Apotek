<?php
require '../koneksi.php';

// Cek apakah tombol submit sudah diklik
// `if (isset($_POST['simpan'])){`

    // Cek data yang dari formulir
    $perusahaan = $_POST['perusahaan'];
    $keterangan = $_POST['keterangan'];

    // buat query
    $query = "INSERT INTO tb_supplier 
    VALUES ('','$perusahaan','$keterangan')";

    $hasil = mysqli_query($koneksi, $query); 

    if (!$hasil){
        die ("Gagal menginputkan data". mysqli_errno($koneksi));
    } else {
        echo "<script>
        alert('Data Berhasil Masuk');window.location='../view/viewsupplier.php';
        </script>";        
    }
?>
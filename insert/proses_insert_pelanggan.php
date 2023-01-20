<?php
require '../koneksi.php';

// Cek apakah tombol submit sudah diklik
// `if (isset($_POST['simpan'])){`

    // Cek data yang dari formulir
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $usia = $_POST['usia'];
    $buktifotoresep = $_FILES['buktifotoresep']['name'];

    // Cek Dulu jika ada gambar jalankan codingan ini
    if ($buktifotoresep != "") {
        $ekstensi_diperbolehkan = array('jpg','png','jpeg');
        $x                      = explode('.',$buktifotoresep);
        $ekstensi               = strtolower(end($x));
        $file_tmp               = $_FILES['buktifotoresep']['tmp_name'];
        $namagambarbaru         = $buktifotoresep;

        if (in_array($ekstensi,$ekstensi_diperbolehkan)=== true) {
            move_uploaded_file($file_tmp, '../simpanfoto/'.$namagambarbaru);

            $query = "INSERT INTO tb_pelanggan VALUES ('','$namalengkap','$alamat','$telp','$usia','$namagambarbaru')";
            $result = mysqli_query($koneksi,$query);

            if(!$result){
                die("Query gagal dijalankan: ". mysqli_errno($koneksi). " - " .mysqli_errno($koneksi));
            }else {
                echo "<script>alert('Data berhasil ditambah.');window.location='../view/viewpelanggan.php';</script>";
            }
        } else {
            echo"<script>alert('Ekstensi gambar yang diperbolehkan hanya jpg,png dan jpeg');window.location='insertpelanggan.php';</script>";
        }

    } else {
        $query = "INSERT INTO tb_pelanggan VALUES ('','$namalengkap','$alamat','$telp','$usia',NULL)";
        $result = mysqli_query($koneksi, $query);
        
        if (!$result) {
            die ("Query gagal dijalankan: " . mysqli_errno($koneksi). "-" .mysqli_errno($koneksi));
        } else {
            echo "<script>
            alert('Data berhasil ditambah.');window.location='../view/viewpelanggan.php';
            </script>";
        }
    }

    // buat query
    $query = "INSERT INTO tb_transaksi 
    VALUES ('','$idpelanggan','$idkasir','$tgltransaksi','$kategori','$total','$bayar','$kembali')";

    $hasil = mysqli_query($koneksi, $query); 

    if (!$hasil){
        die ("Gagal menginputkan data". mysqli_errno($koneksi));
    } else {
        echo "<script>
        alert('Data Berhasil Masuk');window.location='../view/viewpelanggan.php';
        </script>";        
    }
?>
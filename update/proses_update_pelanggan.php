<?php
require '../koneksi.php';

$idpelanggan = $_POST['idpelanggan'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$usia = $_POST['usia'];
$buktifotoresep = $_FILES['buktifotoresep']['name'];

if ($buktifotoresep != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $x = explode('.', $buktifotoresep);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['buktifotoresep']['tmp_name'];
    $namagambarbaru = $buktifotoresep;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../simpanfoto/' . $namagambarbaru);

        $query = "UPDATE tb_pelanggan SET 
            namalengkap = '$namalengkap',
            alamat = '$alamat',
            telp = '$telp',
            usia = '$usia',
            buktifotoresep = '$namagambarbaru'";

        $query .= "WHERE idpelanggan = '$idpelanggan'";

        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan, " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>
                alert('Data berhasil diubah');
                window.location='../view/viewpelanggan.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Ekstensi gambar yang boleh hanya jpg png dan jpeg');
            window.location='updatepelanggan.php';
        </script>";
    }
} else {
    $query = "UPDATE tb_pelanggan SET
        namalengkap = '$namalengkap',
        alamat = '$alamat',
        telp = '$telp',
        usia = '$usia'";

    $query .= "WHERE idpelanggan = '$idpelanggan'";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>
            alert('Data berhasil diubah');
            window.location='../view/viewpelanggan.php';
        </script>";
    }
}
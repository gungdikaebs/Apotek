<?php


session_start();

require '../koneksi.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$leveluser = $_POST['leveluser'];
$idkaryawan = $_POST['idkaryawan'];

$query_user = "SELECT username FROM tb_login WHERE username = 'username' ";
$result_user = mysqli_query($koneksi, $query_user);
$cek_row_user = mysqli_num_rows($result_user);


if ($cek_row_user > 0) {
    echo "
    <script>
    alert('Data Sudah ada Silahkan kembali'); window.location='register.php';
    </script>";
} else {


    // Proses Insert
    $query = "INSERT INTO tb_login VALUE ('$username', '$password', '$leveluser', '$idkaryawan')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Gagal register" . mysqli_errno($koneksi));
    } else {
        echo
        "<script>
        alert('Data berhasil masuk'); window.location='register.php';
        </script>";
    }
}

// if (isset($_POST['username'])) {
//     echo "<script>
//     alert('Anda Berhasil Registrasi, Silahkan login dengan akun yang sudah terdaftar ');
//     location.href='login.php';
//     </script>";
// } else {
//     echo "<script>
//     alert('Register failed!');
//     location.href='register.php';
//     </script>";
// }

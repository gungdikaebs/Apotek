<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require '../koneksi.php';

$query = "SELECT * FROM tb_login WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);
$baris = mysqli_fetch_assoc($result);
$cek_pass = password_verify($password, $baris['password']);

if ($cek_pass > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['leveluser'] = $baris['leveluser'];
    $_SESSION['idkaryawan'] = $baris['idkaryawan'];
    header('Location: ../view/dashboard.php');
} else {
    echo "<script>
    alert('Login failed!');
    location.href='login.php';
    </script>";
}

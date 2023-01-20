<?php
session_start();
require '../koneksi.php';
if (@$_GET['idtransaksi']) {
    $id = $_GET['idtransaksi'];
} else {
    $id = $_SESSION['idtransaksi'];
}

$query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi='$id'");
$row = mysqli_fetch_assoc($query);

$idpelanggan = $row['idpelanggan'];
$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE idpelanggan='$idpelanggan'");
$row_pelanggan = mysqli_fetch_assoc($query_pelanggan);

$idkaryawan = $row['idkaryawan'];
$query_karyawan = mysqli_query($koneksi, "SELECT namakaryawan FROM tb_karyawan WHERE idkaryawan='$idkaryawan'");
$row_karyawan = mysqli_fetch_assoc($query_karyawan);

if (@$_POST['more']) {
    $namaobat = $_POST['namaobat'];
    $queryidobat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT idobat, hargajual FROM tb_obat WHERE namaobat='$namaobat'"));

    $idobat = $queryidobat['idobat'];
    $jumlah = $_POST['jumlah'];
    $hargsatuan = $queryidobat['hargajual'];
    $totalharga = $jumlah * $hargsatuan;

    $inserttransaksi = mysqli_query($koneksi, "INSERT INTO tb_detail_transaksi VALUES ('','$id','$idobat','$jumlah','$hargsatuan','$totalharga')");
}

if (!@$_SESSION['username']) {
    echo "<script>alert('Maaf Anda belum login');location.href='../login/login.php'</script>";
} else {
?>

    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
        <!-- Custom CSS -->
        <link href="../dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <body>
        <?php require '../template/header.php' ?>
        <?php require '../template/navbar.php' ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Inputs</h6>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Insert Supplier</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form action="" method="post">
                    <br>
                    <center>
                        <h2>Masukan Data Detail Transaksi</h2>
                    </center>
                    <div class="pelanggans">
                        <table class="mt-3" cellpadding="10">
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>:</td>
                                <td><?= $row['tgltransaksi']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>:</td>
                                <td><?= $row_pelanggan['namalengkap']; ?></td>
                            </tr>
                            <tr>
                                <td>Kategori Pelanggan</td>
                                <td>:</td>
                                <td><?= $row['kategoripelanggan']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Karyawan</td>
                                <td>:</td>
                                <td><?= $row_karyawan['namakaryawan']; ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="container">
                        <div class="row mt-5">
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <th scope="col1">Nama Obat</th>
                                    <th scope="col1">Jumlah</th>
                                    <th scope="col1">Harga Satuan</th>
                                    <th scope="col1">Total Harga</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $hasildetail = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi WHERE idtransaksi='$id'");
                                    while ($rowdetail = mysqli_fetch_assoc($hasildetail)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $rowidobat = $rowdetail['idobat'];
                                                $nama_obat = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT namaobat FROM tb_obat WHERE idobat='$rowidobat'"));
                                                echo $nama_obat['namaobat'];
                                                ?>
                                            </td>
                                            <td><?= $rowdetail['jumlah'] ?></td>
                                            <td><?= number_format($rowdetail['hargasatuan'], 0, ',', '.') ?></td>
                                            <td><?= number_format($rowdetail['totalharga'], 0, ',', '.') ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                    <tr>
                                        <td colspan="3"><b style="float:right;">Grand Total</b></td>
                                        <td>
                                            <b>
                                                <?php
                                                $grandtotal = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi='$id'"));
                                                echo number_format($grandtotal[0], 0, ',', '.');
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Input total bayar -->
                        <?php
                        if (@$_POST['finish']) {
                        ?>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col4">
                                        <input type="number" class="form-control mt3" name="bayar" placeholder="Masukan Jumlah Bayar">
                                        <input type="submit" class="btn btn-warning mt-3 mb-5" value="Simpan Transaksi" name="simpan_transaksi">
                                    </div>
                                    <div class="col"></div>
                                </div>
                            </form>

                            <!-- Simpan transaksi terakhir dan tampilkan detail bayar -->
                        <?php
                        } elseif (@$_POST['simpan_transaksi']) {
                            $grandtotal = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(totalharga) FROM tb_detail_transaksi WHERE idtransaksi='$id'"));
                            $totalbayar = $grandtotal[0];
                            $bayar = $_POST['bayar'];
                            $kembali = $bayar - $totalbayar;

                            mysqli_query($koneksi, "UPDATE tb_transaksi SET totalbayar='$totalbayar', bayar='$bayar', kembali='$kembali' WHERE idtransaksi='$id'");
                            $transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE idtransaksi='$id'"));
                        ?>
                            <table class="table table-bordered border-dark">
                                <tr>
                                    <td>Bayar</td>
                                    <td><?= number_format($transaksi['bayar'], 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Total Bayar</td>
                                    <td><?= number_format($totalbayar, 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Kembali</td>
                                    <td><?= number_format($transaksi['kembali'], 0, ',', '.'); ?></td>
                                </tr>
                            </table>
                            <a href="../view/viewtransaksi"><input type="submit" class="btn btn-warning mt-3" value="Lihat Semua Transaksi"></a>






                            <!-- Input Obat -->
                        <?php
                        } else {
                        ?>
                            <div class="row">
                                <div class="col">
                                    <div class="col-4">
                                        <form action="" method="POST">
                                            <input list="list_obat" name="namaobat" class="form-control" placeholder="Masukan Nama Obat">
                                            <datalist id="list_obat">
                                                <?php
                                                $query = "SELECT * FROM tb_obat";
                                                $hasil = mysqli_query($koneksi, $query);
                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                    <option value="<?= $row['namaobat'] ?>">
                                                    <?php
                                                }
                                                    ?>
                                            </datalist>
                                            <br>
                                            <input type="number" class="form-control mt=3" name="jumlah" placeholder="Jumlah">
                                            <br>
                                            <input type="submit" class="btn btn-warning" value="Masukan Obat" name="more">
                                            <input type="submit" class="btn btn-success" value="Selesai" name="finish">
                                        </form>
                                    </div>
                                    <div class="col"></div>
                                </div>
                            <?php
                        }
                            ?>
                            </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <div class="chat-windows "></div>
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
        <!-- apps -->
        <script src="../dist/js/app.min.js "></script>
        <script src="../dist/js/app.init-menusidebar.js"></script>
        <script src="../dist/js/app-style-switcher.js "></script>
        <script src="../dist/js/feather.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js "></script>
        <script src="../assets/extra-libs/sparkline/sparkline.js "></script>
        <!-- theme js -->
        <!--Menu sidebar -->
        <script src="../dist/js/sidebarmenu.js "></script>
        <!--Custom JavaScript -->
        <script src="../dist/js/custom.min.js "></script>
    </body>

    </html>
<?php
}
?>
<?php
session_start();
require '../koneksi.php';
if (@$_POST['simpan']) {
    $namapelanggan = $_POST['namapelanggan'];
    $queryidpelang = mysqli_query($koneksi, "SELECT idpelanggan FROM tb_pelanggan WHERE namalengkap = '$namapelanggan'");
    $barispelang = mysqli_fetch_assoc($queryidpelang);

    $idpelanggan = $barispelang['idpelanggan'];
    $idkaryawan = $_SESSION['idkaryawan'];
    $tgltransaksi = date('Y-m-d');
    $kategoripelanggan = 'langganan';

    $query_insert = mysqli_query($koneksi,  "INSERT INTO tb_transaksi VALUES ('','$idpelanggan','$idkaryawan','$tgltransaksi','$kategoripelanggan','0','0','0')");

    $querytransaksi = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
    $hasilidtransaksi = mysqli_fetch_row($querytransaksi);
    $_SESSION['idtransaksi'] = $hasilidtransaksi['0'];

    if (!$hasilidtransaksi) {
        die("Gagal memasukan data obat " . mysqli_error($koneksi));
    } else {
        echo "<script>window.location='insertdetailtransaksi.php'</script>";
    }
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
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Insert Transaksi</li>
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

                <div class="row">
                    <div class="col-sm-12 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Masukkan Data</h4>
                                <form class="mt-4" method="POST" action="">
                                    <div class="input-group">
                                        <select class="custom-select" id="inputGroupSelect04" name="kategoripelanggan">
                                            <option selected value="langganan">Choose...</option>
                                            <option value="langganan">Langganan</option>
                                            <option value="umum">Umum</option>
                                        </select>
                                        <div class="input-group-append">
                                            <input type="submit" class="btn btn-outline-secondary" value="Next">
                                            <!-- <button class="btn btn-outline-secondary" type="submit">Next</button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (@$_POST['kategoripelanggan'] == 'langganan') {
                ?>

                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Masukkan Nama Pelanggan</h4>
                                    <form class="mt-4" method="POST">
                                        <div class="form-group">
                                            <input type="text" list="list_pelanggan" class="form-control" name="namapelanggan">
                                            <datalist id="listpelanggan">
                                                <?php
                                                include('../koneksi.php');
                                                $query = "SELECT namalengkap FROM tb_pelanggan";
                                                $hasil = mysqli_query($koneksi, $query);

                                                while ($row = mysqli_fetch_assoc($hasil)) {
                                                ?>
                                                    <option value="<?php echo $row['namalengkap']; ?>"></option>

                                                <?php } ?>


                                            </datalist>
                                            <div class="card">
                                                <div class="card-body">
                                                    <input type="submit" class="btn btn-success" name="simpan" value="SELANJUTNYA">
                                                </div>
                                            </div>
                                    </form>
                                <?php } elseif (@$_POST['kategoripelanggan'] == 'umum') {
                                $idpelanggan = '1820';
                                $idkaryawan = $_SESSION['idkaryawan'];
                                $tgltransaksi = date('Y-m-d');
                                $kategoripelanggan = 'umum';

                                $query_insert = mysqli_query($koneksi,  "INSERT INTO tb_transaksi VALUES ('','$idpelanggan','$idkaryawan','$tgltransaksi','$kategoripelanggan','0','0','0')");

                                $querytransaksi = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
                                $hasilidtransaksi = mysqli_fetch_row($querytransaksi);
                                $_SESSION['idtransaksi'] = $hasilidtransaksi['0'];

                                if (!$hasilidtransaksi) {
                                    die("Gagal") . mysqli_error($koneksi);
                                } else {
                                    echo "<script>window.location='insertdetailtransaksi.php';</script>";
                                }
                            }
                                ?>
                                </div>
                            </div>
                        </div>
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
                        All Rights Reserved by Adminmart. Designed and Developed by <a href="https://instagram.com/gungdikaebs">GungDikaEbs</a>.
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
<?php } ?>
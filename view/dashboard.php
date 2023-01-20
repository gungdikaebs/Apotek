<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Maaf Anda Belum Login'); location.href='../login/login.php' </script>";
}
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
    <title>Apotek - Dashboard</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
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
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-center">Anda telah login sebagai <?= $_SESSION['leveluser']; ?></h3>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                        <div class="col-lg-4 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/Table Karyawan.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Keterangan :</h4>
                                    <p class="card-text"><b>Admin</b> : dapat Melihat,Mengedit dan Menghapus Data Obat.</p>
                                    <a href="viewkaryawan.php" class="btn btn-primary">Go Table Karyawan</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                        <div class="col-lg-4 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/Table Obat.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Keterangan :</h4>
                                    <p class="card-text"> <b>Admin</b> : dapat Melihat,Mengedit dan Menghapus Data Obat.</p>
                                    <a href="viewobat.php" class="btn btn-primary">Go Table Obat</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-4 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/Table Supplier.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Keterangan :</h4>
                                    <p class="card-text"> <b>Admin</b> : dapat Melihat,Mengedit dan Menghapus Data Supplier.</p>
                                    <a href="viewsupplier.php" class="btn btn-primary">Go Table Supplier</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-4 col-md-6 img-fluid">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/Table Pelanggan.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Keterangan :</h4>
                                    <p class="card-text"> <b> Admin </b> : dapat Melihat,Mengedit dan Menghapus Data Pelanggan.</p>
                                    <p class="card-text"> <b>Karyawan</b> : Hanya Dapat Melihat Data Pelanggan.</p>
                                    <a href="viewpelanggan.php" class="btn btn-primary">Go Table Pelanggan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="../assets/images/big/Table Transaksi.png" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Keterangan :</h4>
                                    <p class="card-text"> <b>Admin</b> : dapat Melihat,Mengedit dan Menghapus Data Transaksi.</p>
                                    <p class="card-text"> <b>Karyawan</b> : Hanya Dapat Melihat Data Transaksi dan Detail Transaksi.</p>
                                    <a href="viewtransaksi.php" class="btn btn-primary">Go Table Transaksi</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center text-muted">
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
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
</body>

</html>
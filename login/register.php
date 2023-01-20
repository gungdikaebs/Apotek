<?php
session_start();
require "../koneksi.php";
error_reporting(0);
if (!isset($_SESSION['username'])) {
    echo "<script> alert('Maaf Anda Belum Login'); location.href='../login/login.php' </script>";
} elseif ($_SESSION['leveluser'] == 'karyawan') {
    echo "<script> alert('Maaf Anda Tidak Mengakses karena anda adalah karyawan'); location.href='../view/dashboard.php' </script>";
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
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">

                    <form action="proses_register.php" method="post">
                        <!-- Row -->
                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                                <h3 class="card-title">REGISTER PAGE</h3>
                            </div>

                            <div class="card-body">
                                <h6 class="card-title"> Id Karyawan : </h6>
                                <div class="form-group">
                                    <select name="idkaryawan" class="form-control">
                                        <?php
                                        $querykaryawan = "SELECT * FROM tb_karyawan WHERE idkaryawan NOT IN (SELECT idkaryawan FROM tb_login)";

                                        $hasilkaryawan = mysqli_query($koneksi, $querykaryawan);
                                        $cek = mysqli_num_rows($hasilkaryawan);

                                        while ($row = mysqli_fetch_assoc($hasilkaryawan)) {
                                            if ($cek > 0) {
                                        ?>
                                                <option value="<?php echo $row['idkaryawan']; ?>">
                                                    <?php echo $row['namakaryawan'] ?>
                                                </option>
                                            <?php } else { ?>
                                                <option value="">Semua karyawan sudah register</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="card-title"> Username : </h6>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="username" id="">
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="card-title"> Password : </h6>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                </div>
                            </div>

                            <div class="card-body">
                                <h6 class="card-title"> Level User : </h6>
                                <div class="form-group">
                                    <select name="leveluser" class="form-control">
                                        <option value="karyawan">
                                            Karyawan
                                        </option>

                                        <option value="admin">
                                            Admin
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <center>
                                    <button type="submit" class="col-sm-2 col-md-4 col-lg-2 btn waves-effect waves-light btn-rounded btn-primary" name="simpan"> Simpan </button>
                                </center>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </form>
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
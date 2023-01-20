<?php
session_start();
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
                    <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Update</h6>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Update Supplier</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <?php
        require('../koneksi.php');

        $id = $_GET['idsupplier'];

        $query = "SELECT * From tb_supplier WHERE idsupplier='$id'";

        $hasil = mysqli_query($koneksi, $query);

        while ($data = mysqli_fetch_assoc($hasil)) {
        ?>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form action="proses_update_supplier.php" method="post">
                    <div class="row">
                        <div class="col-md-10 m-auto">
                            <div class="card">
                                <!-- Isi Konten  -->
                                <div class="card-body" hidden>
                                    <h6 class="card-title"> idsupplier : </h6>
                                    <div class="form-group">
                                        <input type="text" name="idsupplier" class="form-control" value="<?= $data['idsupplier']; ?>">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title"> Perusahaan : </h6>
                                    <div class="form-group">
                                        <input type="text" name="perusahaan" class="form-control" value="<?= $data['perusahaan']; ?>">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title"> Keterangan : </h6>
                                    <div class="form-group">
                                        <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan']; ?>">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <center>
                                        <button class="col-sm-2 col-md-4 col-lg-2 btn waves-effect waves-light btn-rounded btn-primary"> Simpan </button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
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
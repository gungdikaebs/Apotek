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
    <title>Apotek - Transaksi</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Transaksi</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Table Transaksi</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Table Transaksi</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Id Pelanggan </th>
                                        <th>Id Kasir</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Kategori Pelanggan</th>
                                        <th>Total</th>
                                        <th>Bayar</th>
                                        <th>Kembali</th>
                                        <th>Tombol Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    require '../koneksi.php';
                                    $query = "SELECT * FROM tb_transaksi";
                                    $hasil = mysqli_query($koneksi, $query);

                                    while ($row = mysqli_fetch_assoc($hasil)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idtransaksi']       . "</td>";
                                        echo "<td>" . $row['idpelanggan']       . "</td>";
                                        echo "<td>" . $row['idkaryawan']     . "</td>";
                                        echo "<td>" . $row['tgltransaksi'] . "</td>";
                                        echo "<td>" . $row['kategoripelanggan']    . "</td>";
                                        echo "<td>" . $row['totalbayar']    . "</td>";
                                        echo "<td>" . number_format($row['bayar'], 0, ',', '.')   . "</td>";
                                        echo "<td>" . number_format($row['kembali'], 0, ',', '.') . "</td>";
                                        echo "<td>
                                                    <a class = 'btn btn icon-trash' 
                                                    data-toggle='tooltip' 
                                                    data-placement='top' 
                                                    title='Delete'
                                                    href='../delete/deletetransaksi.php?idtransaksi=" . $row['idtransaksi'] . "'></a> 
                                                    
                                                    <a class = 'btn icon-eye'
                                                    data-toggle='tooltip'
                                                    data-placement='top' 
                                                    title='Update'
                                                    href='../insert/insertdetailtransaksi.php?idtransaksi=" . $row['idtransaksi'] . "'></a>
                                                 </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <div class="card-body print-data">
                            <a href="../insert/inserttransaksi.php" class="btn btn-primary btn-rounded float-right">Insert Data </a>
                            <a href="#" class="ml-1 btn btn-primary btn-rounded float-right" onclick="window.print()"> Cetak Data </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Table Detail Transaksi</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Id Transaksi</th>
                                        <th scope="col">Id Obat</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Tombol Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require '../koneksi.php';
                                    $query = "SELECT * FROM tb_detail_transaksi";
                                    $hasil = mysqli_query($koneksi, $query);

                                    while ($row = mysqli_fetch_assoc($hasil)) {

                                        echo "<tr>";
                                        echo "<td>" . $row['iddetailtransaksi']       . "</td>";
                                        echo "<td>" . $row['idtransaksi']       . "</td>";
                                        echo "<td>" . $row['idobat']     . "</td>";
                                        echo "<td>" . $row['jumlah'] . "</td>";
                                        echo "<td>" . $row['hargasatuan']    . "</td>";
                                        echo "<td>" . $row['totalharga']    . "</td>";
                                        echo "<td>
                                                <a class ='btn btn icon-trash' 
                                                data-toggle='tooltip' 
                                                data-placement='top' 
                                                title='Delete'
                                                href='../delete/deletedetailtransaksi.php?iddetailtransaksi=" . $row['iddetailtransaksi'] . "'></a> 

                                                <a class ='btn icon-wrench'
                                                data-toggle='tooltip'
                                                data-placement='top' 
                                                title='Update'
                                                href='../update/updatedetailtransaksi.php?iddetailtransaksi=" . $row['iddetailtransaksi'] . "'></a>
                                                
                                                </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <div class="card-body">
                            <a href="../insert/insertdetailtransaksi.php" class="btn btn-primary btn-rounded float-right">Insert Data </a>
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
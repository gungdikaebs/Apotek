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
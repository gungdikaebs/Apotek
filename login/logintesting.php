<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>CodePen - Simple CSS Waves | Mobile &amp; Full width</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <!-- partial:index.partial.html -->
    <!--Hey! This is the original version
of Simple CSS Waves-->

    <div class="header">
        <!--Content before waves-->
        <div class="inner-header flex">
            <div class="page-wrapper">
                <div class="container">
                    <form action="proses_login.php" method="post">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <div class="card shadow p-3 mb-5">
                                    <!-- Isi Konten  -->
                                    <div class="card-body d-flex justify-content-center">
                                        <h3 class="card-title">LOGIN PAGE</h3>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title"> Username : </h6>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="username">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title"> Password : </h6>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
        <!--Header ends-->

        <!--Content starts-->
        <div class="content flex">
            <p>By.Goodkatz | Free to use</p>
        </div>
        <!--Content ends-->
        <!-- partial -->
</body>

</html>
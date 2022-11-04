<?php
session_start();
include 'include.php';
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand ps-3" href="#">
            <img src="image/UIB LOGO BLUE.png" class="img-responsive" width="150">
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-black" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="include/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="?p=home">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#master_data" aria-expanded="false" aria-controls="master_data">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Master
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="master_data" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="?p=barang">Data Barang</a>
                                <!-- <a class="nav-link" href="#">Data Pelanggan</a> -->
                                <a class="nav-link" href="?p=supplier">Data Supplier</a>
                            </nav>
                        </div>
                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi" aria-expanded="false" aria-controls="transaksi">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="transaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Pembelian</a>
                                    <a class="nav-link" href="#">Penjualan</a>
                                </nav>
                            </div> -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#perhitungan" aria-expanded="false" aria-controls="perhitungan">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Perhitungan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="perhitungan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="?p=eoq">EOQ</a>
                                <a class="nav-link" href="?p=ss">SS</a>
                                <a class="nav-link" href="?p=rop">ROP</a>
                            </nav>
                        </div>
                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#laporan" aria-expanded="false" aria-controls="laporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="laporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Stok Barang</a>
                                    <a class="nav-link" href="#">Pembelian</a>
                                    <a class="nav-link" href="#">Penjualan</a>
                                    <a class="nav-link" href="#">EOQ</a>
                                    <a class="nav-link" href="#">SS</a>
                                    <a class="nav-link" href="#">ROP</a>
                                </nav>
                            </div> -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    if (isset($_GET['p'])) {
                        $page = $_GET['p'];

                        switch ($page) {
                            case 'home':
                                include "page/home.php";
                                break;
                            case 'supplier':
                                include "page/supplier.php";
                                break;
                            case 'barang':
                                include "page/barang.php";
                                break;
                            case 'eoq':
                                include "page/eoq.php";
                                break;
                            case 'ss':
                                include "page/ss.php";
                                break;
                            case 'rop':
                                include "page/rop.php";
                                break;
                            default:
                                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                                break;
                        }
                    } else {
                        include "page/home.php";
                    }

                    ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; PROJECT 2022</div>
                        <div>
                            <a href="#">NAMA</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
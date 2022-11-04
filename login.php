<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Administrator</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <img src="image/UIB LOGO BLUE.png" class="img-responsive rounded mx-auto d-flex" width="300">
                                </div>
                                <?php
                                if (isset($_GET['pesan'])) {
                                    if ($_GET['pesan'] == "gagal") {
                                        echo '<div class="alert alert-success text-center" role="alert">Login gagal! username dan password salah!</div>';
                                    } else if ($_GET['pesan'] == "logout") {
                                        echo '<div class="alert alert-danger text-center" role="alert">Anda telah berhasil logout</div>';
                                    } else if ($_GET['pesan'] == "belum_login") {
                                        echo '<div class="alert alert-secondary text-center" role="alert">Anda harus login untuk mengakses halaman admin</div>';
                                    }
                                }
                                ?>
                                <div class="card-body">
                                    <form action="include/checklogin.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" type="text" placeholder="Username" name="username" />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; PROJECT 2022</div>
                        <div>
                            <a href="#">Nama</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
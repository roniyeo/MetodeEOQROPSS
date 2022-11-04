<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="input.php">Input</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laporan
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="eoq.php">EOQ</a></li>
                            <li><a class="dropdown-item" href="ss.php">SS</a></li>
                            <li><a class="dropdown-item" href="rop.php">ROP</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5 px-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h6>Safety Stock</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Lead Time</th>
                            <th scope="col">DMax</th>
                            <th scope="col">Davg</th>
                            <th scope="col">SS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'include.php';

                        $all = mysqli_query($conn, "SELECT * FROM stokbarang");
                        while ($row = mysqli_fetch_array($all)) {
                            $tl = $row['lead_time'];
                            $dmax = $row['dmax'];
                            $dav = $row['dav'];

                            $hasil1 = $dmax - $dav;
                            $hasilakhir = $tl * $hasil1; 
                            ?>
                            <tr>
                                <td><?php echo $tl ?></td>
                                <td><?php echo $dmax ?></td>
                                <td><?php echo $dav ?></td>
                                <td><?php echo $hasilakhir ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
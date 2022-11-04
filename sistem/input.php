<?php
include 'include.php';
$query = mysqli_query($koneksi, "SELECT max(kode_barang) as kodeTerbesar FROM stokbarang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
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
                <h1 class="display-5 fw-bold">Input</h1>
                <form action="insert.php" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" id="kode" value="<?php echo $kodeBarang; ?>" name="kode" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Barang" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control" id="harga_beli" placeholder="Harga Beli" name="harga_beli">
                            </div>
                            <div class="mb-3">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" name="harga_jual">
                            </div>
                            <div class="mb-3">
                                <label for="qty" class="form-label">Qty Order</label>
                                <input type="number" class="form-control" id="qty" placeholder="Qty Order" name="qty" onFocus="startCalc();" onBlur="stopCalc();">
                            </div>
                            <div class="mb-3">
                                <label for="ongkir" class="form-label">Ongkir</label>
                                <input type="number" class="form-control" id="ongkir" placeholder="Ongkir" name="ongkir" onFocus="startCalc();" onBlur="stopCalc();">
                            </div>
                            <div class="mb-3">
                                <label for="demand" class="form-label">Demand</label>
                                <input type="number" class="form-control" id="demand" placeholder="Demand" name="demand">
                            </div>
                            <div class="mb-3">
                                <label for="holding_cost" class="form-label">Holding Cost</label>
                                <input type="number" class="form-control" id="holding_cost" placeholder="Holding Cost" name="holding_cost" min="1">
                            </div>
                            <div class="mb-3">
                                <label for="harga_per_unit" class="form-label">Harga Per Unit</label>
                                <input type="number" class="form-control" id="harga_per_unit" placeholder="Harga Per Unit" name="harga_per_unit" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="ordering" class="form-label">Ordering Cost</label>
                                <input type="number" class="form-control" id="ordering" placeholder="Ordering Cost" name="ordering">
                            </div>
                            <div class="mb-3">
                                <label for="lead_time" class="form-label">Lead Time</label>
                                <input type="number" class="form-control" id="lead_time" placeholder="Lead Time" name="lead_time">
                            </div>
                            <div class="mb-3">
                                <label for="demand_max" class="form-label">Demand Max</label>
                                <input type="number" class="form-control" id="demand_max" placeholder="Demand Max" name="demand_max">
                            </div>
                            <div class="mb-3">
                                <label for="demand_avg" class="form-label">Demand AVG</label>
                                <input type="number" class="form-control" id="demand_avg" placeholder="Demand AVG" name="demand_avg">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function startCalc(){
            interval = setInterval("calc()",1000);
        }

        function calc() {
            let qty = Number(document.getElementById("qty").value)
            let ongkir = Number(document.getElementById("ongkir").value)
            // console.log(qty + ongkir);
            document.getElementById("harga_per_unit").value = (qty + ongkir) / (qty)
        }

        function stopCalc() {
            clearInterval(interval)
        }
    </script>
</body>

</html>
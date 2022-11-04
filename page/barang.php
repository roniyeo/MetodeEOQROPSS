<?php
include 'include/database.php';
$query1 = mysqli_query($conn, "SELECT MAX(kode_barang) as kode FROM stokbarang");
$data1 = mysqli_fetch_array($query1);
$kodeBarang = $data1['kode'];
$urutan1 = (int) substr($kodeBarang, 3, 3);
$urutan1++;
$huruf1 = "BRG";
$kodeBarang = $huruf1 . sprintf("%03s", $urutan1);
?>
<h1 class="mt-4">Barang</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="?p=home">Dashboard</a></li>
    <li class="breadcrumb-item">Barang</li>
</ol>
<button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambahBarang">Tambah</button>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Barang
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM stokbarang LEFT JOIN supplier ON stokbarang.kode_supplier = supplier.kode_supplier");
                while ($row = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['kode_barang'] ?></td>
                        <td><?php echo $row['nama_barang'] ?></td>
                        <td><?php echo $row['harga_beli'] ?></td>
                        <td><?php echo $row['harga_jual'] ?></td>
                        <td><?php echo $row['nama_supplier'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id'] ?>">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['id'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="include/tambah_barang.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" value="<?php echo $kodeBarang ?>" readonly name="kode">
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Nama Supplier</label>
                        <select class="form-select" aria-label="Default select example" id="supplier" name="supplier">
                            <option value="">Pilih Supplier</option>
                            <?php
                            include 'include/database.php';
                            $data = mysqli_query($conn, "SELECT * FROM supplier");
                            while ($row = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $row['kode_supplier'] ?>"><?= $row['nama_supplier'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                <input type="number" class="form-control" id="harga_beli" placeholder="Harga Beli" name="harga_beli">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" name="harga_jual">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="qty" class="form-label">Qty Order</label>
                                <input type="number" class="form-control" id="qty" placeholder="Qty Order" name="qty" onFocus="startCalc();" onBlur="stopCalc();">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="ongkir" class="form-label">Ongkir</label>
                                <input type="number" class="form-control" id="ongkir" placeholder="Ongkir" name="ongkir" onFocus="startCalc();" onBlur="stopCalc();">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="harga_per_unit" class="form-label">Harga Per Unit</label>
                                <input type="number" class="form-control" id="harga_per_unit" placeholder="Harga Per Unit" name="harga_per_unit" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="demand" class="form-label">Demand</label>
                                <input type="number" class="form-control" id="demand" placeholder="Demand" name="demand">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="holding_cost" class="form-label">Holding Cost</label>
                                <input type="number" class="form-control" id="holding_cost" placeholder="Holding Cost" name="holding_cost" min="1">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="ordering" class="form-label">Ordering Cost</label>
                                <input type="number" class="form-control" id="ordering" placeholder="Ordering Cost" name="ordering">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="lead_time" class="form-label">Lead Time</label>
                                <input type="number" class="form-control" id="lead_time" placeholder="Lead Time" name="lead_time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="demand_max" class="form-label">Demand Max</label>
                                <input type="number" class="form-control" id="demand_max" placeholder="Demand Max" name="demand_max">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="demand_avg" class="form-label">Demand AVG</label>
                                <input type="number" class="form-control" id="demand_avg" placeholder="Demand AVG" name="demand_avg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function startCalc() {
        interval = setInterval("calc()", 1000);
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
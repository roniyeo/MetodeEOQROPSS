<?php
    include 'include/database.php';
    $query = mysqli_query($conn, "SELECT max(kode_supplier) as kodeTerbesar FROM supplier");
    $data = mysqli_fetch_array($query);
    $kodeSupplier = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeSupplier, 3, 3);
    $urutan++;
    $huruf = "SUP";
    $kodeSupplier = $huruf . sprintf("%03s", $urutan);
?>
<h1 class="mt-4">Supplier</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="?p=home">Dashboard</a></li>
    <li class="breadcrumb-item">Dashboard</li>
</ol>
<button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambahSupplier">Tambah</button>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Supplier
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'include/database.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM supplier");
                while ($row = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['kode_supplier']; ?></td>
                        <td><?php echo $row['nama_supplier']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id'] ?>">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row['id'] ?>">Delete</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="include/edit_supplier.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <label for="kode_supplier" class="form-label">Kode Supplier</label>
                                            <input type="text" class="form-control" id="kode_supplier" value="<?php echo $row['kode_supplier'] ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                            <input type="text" class="form-control" id="nama_supplier" value="<?php echo $row['nama_supplier'] ?>"" name="nama">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="include/delete_supplier.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <p>Ingin hapus supplier atas nama <?php echo $row['nama_supplier']; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="include/tambah_supplier.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_supplier" class="form-label">Kode Supplier</label>
                        <input type="text" class="form-control" id="kode_supplier" value="<?php echo $kodeSupplier ?>" readonly name="kode">
                    </div>
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" placeholder="Nama Supplier" name="nama">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
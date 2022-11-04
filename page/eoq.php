<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Perhitungan EOQ
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th scope="col">Demand</th>
                    <th scope="col">Ongkir</th>
                    <th scope="col">Holding Cost</th>
                    <th scope="col">Harga Per Unit</th>
                    <th scope="col">EOQ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'include/database.php';

                $all = mysqli_query($conn, "SELECT * FROM stokbarang");
                while ($row = mysqli_fetch_array($all)) {
                    $d = $row['demand'];
                    $s = $row['ongkir'];
                    $h = $row['holding_cost'];
                    $p = $row['harga_per_unit'];

                    $hasil1 = 2 * $d * $s;
                    $hasil2 = $h * $p;
                    $hasil3 = $hasil1 / $hasil2;
                    $hasilakhir = sqrt($hasil3); ?>
                    <tr>
                        <td><?php echo $d ?></td>
                        <td><?php echo $s ?></td>
                        <td><?php echo $h ?></td>
                        <td><?php echo $p ?></td>
                        <td><?php echo $hasilakhir ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
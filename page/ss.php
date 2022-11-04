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
                    <th scope="col">Lead Time</th>
                    <th scope="col">DMax</th>
                    <th scope="col">Davg</th>
                    <th scope="col">SS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'include/database.php';

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
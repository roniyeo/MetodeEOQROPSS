<?php
    include 'include.php';

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $qty = $_POST['qty'];
    $ongkir = $_POST['ongkir'];
    $demand = $_POST['harga_beli'];
    $holding_cost = $_POST['holding_cost'];
    $harga_per_unit = $_POST['harga_per_unit'];
    $ordering = $_POST['ordering'];
    $lead_time = $_POST['lead_time'];
    $demand_max = $_POST['demand_max'];
    $demand_avg = $_POST['qty'];

    mysqli_query($conn, "INSERT INTO stokbarang (kode_barang, nama_barang, harga_beli, harga_jual, ongkir, demand, qty_order, holding_cost, harga_per_unit, ordering_cost, lead_time, dmax, dav, createdAt) VALUES ('$kode', '$nama', '$harga_beli', '$harga_jual', '$ongkir', '$demand', '$qty', '$holding_cost', '$harga_per_unit', '$ordering', '$lead_time', '$demand_max', '$demand_avg', NOW())");

    echo "<script>alert('SUKSES'); window.location.href = 'index.php'</script>";
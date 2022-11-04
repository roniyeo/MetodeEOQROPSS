<?php
    include 'database.php';

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    $data = mysqli_query($conn, "INSERT INTO supplier (kode_supplier, nama_supplier, created_at) VALUES ('$kode', '$nama',  NOW())");

    if ($data) {
        echo "<script>alert('SUKSES'); window.location.href = '../?p=supplier'</script>";
    }else{
        echo "<script>alert('ERROR'); window.location.href = '../?p=supplier'</script>";
    }
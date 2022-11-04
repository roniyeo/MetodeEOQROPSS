<?php
    include 'database.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $data = mysqli_query($conn, "UPDATE supplier SET nama_supplier = '$nama' WHERE id = '$id'");

    if ($data) {
        echo "<script>alert('SUKSES'); window.location.href = '../?p=supplier'</script>";
    }else{
        echo "<script>alert('ERROR'); window.location.href = '../?p=supplier'</script>";
    }
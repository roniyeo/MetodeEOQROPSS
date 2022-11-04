<?php
    include 'database.php';

    $id = $_POST['id'];

    $data = mysqli_query($conn, "DELETE FROM supplier WHERE id = '$id'");

    if ($data) {
        echo "<script>alert('SUKSES'); window.location.href = '../?p=supplier'</script>";
    }else{
        echo "<script>alert('ERROR'); window.location.href = '../?p=supplier'</script>";
    }
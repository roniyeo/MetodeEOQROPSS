<?php 
    session_start();
    include 'database.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $row = mysqli_fetch_assoc($data);
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['status'] = "login";
        header("location:../index.php");
    }
    else{
        header("location:../login.php?pesan=gagal");
    }
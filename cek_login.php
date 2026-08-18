<?php 
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);

    if($data['role'] == "admin"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        $_SESSION['id_user'] = $data['id_user'];
        header("location:admin/dashboard.php");

    }else if($data['role'] == "anggota"){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "anggota";
        $_SESSION['id_user'] = $data['id_user'];
        header("location:anggota/dashboard.php");

    }else{
        header("location:index.php?pesan=gagal");
    }
}else{
    header("location:index.php?pesan=gagal");
}
?>
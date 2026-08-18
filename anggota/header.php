<?php
session_start();

if($_SESSION['role'] != "anggota"){
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../koneksi.php';

$id_user_login = $_SESSION['id_user'];
$q_user = mysqli_query($conn, "SELECT * FROM anggota WHERE id_user='$id_user_login'");
$me = mysqli_fetch_array($q_user);

if(!$me){
    $nama_saya = "Siswa (Data belum lengkap)";
    $id_anggota_saya = 0;
} else {
    $nama_saya = $me['nama'];
    $id_anggota_saya = $me['id_anggota'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Siswa - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { display: flex; margin: 0; font-family: 'Poppins', sans-serif; background: #f0f2f5; }
        .sidebar { width: 250px; background: #3498db; color: white; min-height: 100vh; padding: 20px; position: fixed; }
        .sidebar h2 { text-align: center; margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 10px; font-size: 20px;}
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin: 15px 0; }
        .sidebar ul li a { color: white; text-decoration: none; font-size: 16px; display: block; padding: 10px; border-radius: 5px; transition: 0.3s; }
        .sidebar ul li a:hover { background: rgba(255,255,255,0.2); padding-left: 15px; }
        .content { margin-left: 270px; padding: 30px; width: 100%; }
        
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .info-box { background: #e1f5fe; color: #0277bd; padding: 15px; border-radius: 5px; margin-bottom: 20px; border-left: 5px solid #0277bd; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2><i class="fas fa-book-open"></i> AREA SISWA</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="buku.php"><i class="fas fa-book"></i> Cari Buku</a></li>
            <li><a href="riwayat.php"><i class="fas fa-history"></i> Riwayat Pinjam</a></li>
            <li><a href="../logout.php" style="background: #c0392b; margin-top: 30px;"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h3>Perpustakaan Sekolah</h3>
            <span>Halo, <b><?php echo $nama_saya; ?></b> <i class="fas fa-user-circle"></i></span>
        </div>
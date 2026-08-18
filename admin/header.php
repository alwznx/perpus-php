<?php
session_start();

if($_SESSION['role'] != "admin"){
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Perpustakaan</title>
    
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { display: flex; margin: 0; font-family: 'Poppins', sans-serif; background: #f4f4f4; }
        .sidebar { width: 250px; background: #2c3e50; color: white; min-height: 100vh; padding: 20px; position: fixed; }
        .sidebar h2 { text-align: center; margin-bottom: 30px; border-bottom: 1px solid #444; padding-bottom: 10px; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin: 15px 0; }
        .sidebar ul li a { color: #ecf0f1; text-decoration: none; font-size: 16px; display: block; padding: 10px; border-radius: 5px; transition: 0.3s; }
        .sidebar ul li a:hover { background: #34495e; padding-left: 15px; }
        .content { margin-left: 270px; padding: 30px; width: 100%; }
        .card-container { display: flex; gap: 20px; margin-top: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex: 1; text-align: center; }
        .card h3 { margin: 0 0 10px; color: #777; font-size: 14px; text-transform: uppercase; }
        .card h1 { margin: 0; font-size: 36px; color: #2c3e50; }
        .logout { background: #c0392b !important; }
        .logout:hover { background: #e74c3c !important; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2><i class="fas fa-book-reader"></i> PERPUS DIGITAL</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="anggota.php"><i class="fas fa-users"></i> Data Anggota</a></li>
            <li><a href="buku.php"><i class="fas fa-book"></i> Data Buku</a></li>
            <li><a href="rak.php"><i class="fas fa-layer-group"></i> Data Rak</a></li>
            <li><a href="kelas.php"><i class="fas fa-school"></i> Data Kelas</a></li>
            <li><a href="transaksi.php"><i class="fas fa-exchange-alt"></i> Peminjaman</a></li>
            <li><a href="laporan.php"><i class="fas fa-file-alt"></i> Laporan</a></li>
            <li><a href="pengaturan.php"><i class="fas fa-cog"></i> Pengaturan</a></li>
            <li><a href="../logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="content">
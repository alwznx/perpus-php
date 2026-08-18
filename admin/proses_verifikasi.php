<?php 
session_start();
include '../koneksi.php';

if($_SESSION['role'] != "admin"){
    header("location:../index.php");
    exit;
}

$id_peminjaman = $_GET['id'];

$q_buku = mysqli_query($conn, "SELECT id_buku FROM peminjaman WHERE id_peminjaman='$id_peminjaman'");
$buku_data = mysqli_fetch_array($q_buku);
$id_buku = $buku_data['id_buku'];

$q_stok = mysqli_query($conn, "SELECT stok FROM buku WHERE id_buku='$id_buku'");
$stok_sekarang = mysqli_fetch_array($q_stok)['stok'];

if($stok_sekarang > 0){
    $query = "UPDATE peminjaman 
              SET status = 'dipinjam' 
              WHERE id_peminjaman = '$id_peminjaman'";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Verifikasi berhasil! Stok buku telah dikurangi.'); window.location='transaksi.php?tab=dipinjam';</script>";
    } else {
        echo "<script>alert('Gagal memverifikasi transaksi!'); window.location='transaksi.php?tab=menunggu';</script>";
    }
} else {
    echo "<script>alert('Gagal verifikasi: Stok buku tidak cukup!'); window.location='transaksi.php?tab=menunggu';</script>";
}
?>
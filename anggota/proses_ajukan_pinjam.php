<?php 
session_start();
include '../koneksi.php';

if($_SESSION['role'] != "anggota"){
    header("location:../index.php");
    exit;
}

$id_anggota = $_GET['id_anggota'];
$id_buku    = $_GET['id_buku'];

$tgl_pinjam    = date('Y-m-d');
$tgl_kembali   = date('Y-m-d', strtotime('+7 days'));

$query = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status) 
          VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali', 'menunggu')";

if(mysqli_query($conn, $query)){
    echo "<script>alert('Pengajuan pinjaman berhasil! Menunggu persetujuan Admin.'); window.location='riwayat.php';</script>";
} else {
    echo "Gagal mengajukan pinjaman: " . mysqli_error($conn);
}
?>
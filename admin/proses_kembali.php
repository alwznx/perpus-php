<?php 
session_start();
include '../koneksi.php';

$id_peminjaman = $_GET['id'];
$tgl_sekarang  = date('Y-m-d');

$query = "INSERT INTO pengembalian (id_peminjaman, tanggal_pengembalian, denda) 
          VALUES ('$id_peminjaman', '$tgl_sekarang', 0)";

if(mysqli_query($conn, $query)){
    echo "<script>alert('Buku berhasil dikembalikan!'); window.location='transaksi.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>
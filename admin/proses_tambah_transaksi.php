<?php 
session_start();
include '../koneksi.php';

$id_anggota = $_POST['id_anggota'];
$id_buku    = $_POST['id_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali= $_POST['tgl_kembali'];
$query = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status) 
          VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali', 'dipinjam')";

if(mysqli_query($conn, $query)){
    header("location:transaksi.php");
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>
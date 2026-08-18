<?php 
// Menghubungkan koneksi
session_start();
include '../koneksi.php';

// Menangkap data dari form
$judul      = $_POST['judul'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$tahun      = $_POST['tahun'];
$stok       = $_POST['stok'];
$id_rak     = $_POST['id_rak'];

// Menginput data ke database
$query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, id_rak, stok) 
          VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$id_rak', '$stok')";

if(mysqli_query($conn, $query)){
    // Jika berhasil, kembali ke halaman buku
    header("location:buku.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}
?>
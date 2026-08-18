<?php 
session_start();
include '../koneksi.php';

$nama   = $_POST['nama_rak'];
$lokasi = $_POST['lokasi_rak'];

mysqli_query($conn, "INSERT INTO rak (nama_rak, lokasi_rak) VALUES ('$nama', '$lokasi')");
header("location:rak.php");
?>
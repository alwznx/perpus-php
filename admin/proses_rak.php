<?php
session_start();
include '../koneksi.php';

$aksi = $_GET['aksi'];

if($aksi == "tambah"){
    $nama   = $_POST['nama_rak'];
    $lokasi = $_POST['lokasi'];
    
    mysqli_query($conn, "INSERT INTO rak VALUES('', '$nama', '$lokasi')");
    header("location:rak.php");

} elseif($aksi == "hapus"){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM rak WHERE id_rak='$id'");
    header("location:rak.php");
}
?>
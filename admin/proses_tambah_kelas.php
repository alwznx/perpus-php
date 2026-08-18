<?php 
session_start();
include '../koneksi.php';

$nama = $_POST['nama_kelas'];

mysqli_query($conn, "INSERT INTO kelas (nama_kelas) VALUES ('$nama')");
header("location:kelas.php");
?>
<?php 
session_start();
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id'");
header("location:kelas.php");
?>
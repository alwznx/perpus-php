<?php 
session_start();
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM rak WHERE id_rak='$id'");
header("location:rak.php");
?>
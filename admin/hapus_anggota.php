<?php 
session_start();
include '../koneksi.php';

$id_anggota = $_GET['id'];
$id_user    = $_GET['id_user'];

mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota='$id_anggota'");

mysqli_query($conn, "DELETE FROM users WHERE id_user='$id_user'");

header("location:anggota.php");
?>
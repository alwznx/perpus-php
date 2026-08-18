<?php 
session_start();
include '../koneksi.php';

$id       = $_POST['id_anggota'];
$nama     = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$no_hp    = $_POST['no_hp'];
$alamat   = $_POST['alamat'];

$query = "UPDATE anggota SET nama='$nama', id_kelas='$id_kelas', no_hp='$no_hp', alamat='$alamat' WHERE id_anggota='$id'";

if(mysqli_query($conn, $query)){
    header("location:anggota.php");
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>
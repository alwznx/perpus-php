<?php 
session_start();
include '../koneksi.php';

$nis      = $_POST['nis'];
$nama     = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$no_hp    = $_POST['no_hp'];
$alamat   = $_POST['alamat'];

$email_dummy = $nis . "@sekolah.com";
$query_user = "INSERT INTO users (username, password, email, role) VALUES ('$nis', '123', '$email_dummy', 'anggota')";

if(mysqli_query($conn, $query_user)){
    
    $id_user_baru = mysqli_insert_id($conn);

    $query_anggota = "INSERT INTO anggota (id_user, nama, nis, id_kelas, alamat, no_hp) 
                      VALUES ('$id_user_baru', '$nama', '$nis', '$id_kelas', '$alamat', '$no_hp')";
    
    mysqli_query($conn, $query_anggota);

    header("location:anggota.php");

} else {
    echo "Gagal membuat user: " . mysqli_error($conn);
}
?>
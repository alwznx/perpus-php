<?php 
session_start();
include '../koneksi.php';

$id         = $_POST['id_buku'];
$judul      = $_POST['judul'];
$pengarang  = $_POST['pengarang'];
$penerbit   = $_POST['penerbit'];
$tahun      = $_POST['tahun'];
$stok       = $_POST['stok'];
$id_rak     = $_POST['id_rak'];

$query = "UPDATE buku SET 
            judul='$judul', 
            pengarang='$pengarang', 
            penerbit='$penerbit', 
            tahun_terbit='$tahun', 
            stok='$stok', 
            id_rak='$id_rak' 
          WHERE id_buku='$id'";

if(mysqli_query($conn, $query)){
    header("location:buku.php");
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>
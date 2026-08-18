<?php 
session_start();
include '../koneksi.php';

$id_user    = $_SESSION['id_user'];
$username   = $_POST['username'];
$pass_baru  = $_POST['pass_baru'];
$konfirmasi = $_POST['konfirmasi'];

if(empty($pass_baru)){
    $query = "UPDATE users SET username='$username' WHERE id_user='$id_user'";
    
    if(mysqli_query($conn, $query)){
        $_SESSION['username'] = $username;
        header("location:pengaturan.php?pesan=sukses");
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }

} else {
    if($pass_baru == $konfirmasi){
        $query = "UPDATE users SET username='$username', password='$pass_baru' WHERE id_user='$id_user'";
        
        if(mysqli_query($conn, $query)){
            $_SESSION['username'] = $username;
            header("location:pengaturan.php?pesan=sukses");
        } else {
            echo "Gagal update: " . mysqli_error($conn);
        }
    } else {
        header("location:pengaturan.php?pesan=gagal");
    }
}
?>
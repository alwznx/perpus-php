<?php include 'header.php'; 

$id_user = $_SESSION['id_user'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id_user'");
$data = mysqli_fetch_array($query);
?>

<div class="card" style="max-width: 500px; margin: auto;">
    <h2>Pengaturan Akun</h2>
    <p>Ubah username atau password Anda di sini.</p>
    <hr>

    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "sukses"){
            echo "<div style='background:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px;'>Perubahan berhasil disimpan!</div>";
        } else if($_GET['pesan'] == "gagal"){
            echo "<div style='background:#f8d7da; color:#721c24; padding:10px; margin-bottom:15px; border-radius:5px;'>Password konfirmasi tidak sama!</div>";
        }
    }
    ?>

    <form action="proses_pengaturan.php" method="POST">
        
        <div style="margin-bottom: 15px;">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Password Baru (Biarkan kosong jika tidak ingin ganti)</label>
            <input type="password" name="pass_baru" id="pass1" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="konfirmasi" id="pass2" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <input type="checkbox" onclick="lihatPassword()"> Tampilkan Password
        </div>

        <button type="submit" style="background: #e67e22; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </form>
</div>

<script>
function lihatPassword() {
    var x = document.getElementById("pass1");
    var y = document.getElementById("pass2");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}
</script>

<?php include 'footer.php'; ?>
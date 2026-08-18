<?php 
include 'header.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");
$d = mysqli_fetch_array($data);
?>

<div class="card" style="max-width: 600px; margin: auto;">
    <h2>Edit Data Anggota</h2>
    <form action="proses_edit_anggota.php" method="POST">
        <input type="hidden" name="id_anggota" value="<?php echo $d['id_anggota']; ?>">

        <div style="margin-bottom: 15px;">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>NIS</label>
            <input type="text" name="nis" value="<?php echo $d['nis']; ?>" readonly style="width: 100%; padding: 10px; background: #eee;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Kelas</label>
            <select name="id_kelas" required style="width: 100%; padding: 10px;">
                <?php 
                $kelas = mysqli_query($conn, "SELECT * FROM kelas");
                while($k = mysqli_fetch_array($kelas)){
                    $selected = ($d['id_kelas'] == $k['id_kelas']) ? "selected" : "";
                    echo "<option value='$k[id_kelas]' $selected>$k[nama_kelas]</option>";
                }
                ?>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>No. HP</label>
            <input type="text" name="no_hp" value="<?php echo $d['no_hp']; ?>" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label>Alamat</label>
            <textarea name="alamat" style="width: 100%; padding: 10px;" rows="3"><?php echo $d['alamat']; ?></textarea>
        </div>

        <button type="submit" style="background: #f39c12; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Update</button>
        <a href="anggota.php" style="margin-left: 10px;">Batal</a>
    </form>
</div>

<?php include 'footer.php'; ?>
<?php 
include 'header.php';
$id = $_GET['id']; 

$data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$d = mysqli_fetch_array($data);
?>

<div class="card" style="max-width: 600px; margin: auto;">
    <h2 style="margin-bottom: 20px;">Edit Data Buku</h2>
    
    <form action="proses_edit_buku.php" method="POST">
        <input type="hidden" name="id_buku" value="<?php echo $d['id_buku']; ?>">

        <div style="margin-bottom: 15px;">
            <label>Judul Buku</label>
            <input type="text" name="judul" required style="width: 100%; padding: 10px;" value="<?php echo $d['judul']; ?>">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Pengarang</label>
            <input type="text" name="pengarang" required style="width: 100%; padding: 10px;" value="<?php echo $d['pengarang']; ?>">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Penerbit</label>
            <input type="text" name="penerbit" required style="width: 100%; padding: 10px;" value="<?php echo $d['penerbit']; ?>">
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun" required style="width: 100%; padding: 10px;" value="<?php echo $d['tahun_terbit']; ?>">
            </div>
            <div style="flex: 1;">
                <label>Stok</label>
                <input type="number" name="stok" required style="width: 100%; padding: 10px;" value="<?php echo $d['stok']; ?>">
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label>Lokasi Rak</label>
            <select name="id_rak" required style="width: 100%; padding: 10px;">
                <option value="">-- Pilih Rak --</option>
                <?php 
                $rak = mysqli_query($conn, "SELECT * FROM rak");
                while($r = mysqli_fetch_array($rak)){
                    if($d['id_rak'] == $r['id_rak']){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    echo "<option value='$r[id_rak]' $selected>$r[nama_rak] - $r[nama_rak]</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" style="background: #f39c12; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-save"></i> Update Perubahan
        </button>
        <a href="buku.php" style="margin-left: 10px; text-decoration: none; color: #666;">Batal</a>

    </form>
</div>

<?php include 'footer.php'; ?>
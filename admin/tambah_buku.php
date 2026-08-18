<?php include 'header.php'; ?>

<div class="card" style="max-width: 600px; margin: auto;">
    <h2 style="margin-bottom: 20px;">Tambah Buku Baru</h2>
    
    <form action="proses_tambah_buku.php" method="POST">
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Judul Buku</label>
            <input type="text" name="judul" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Pengarang</label>
            <input type="text" name="pengarang" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Penerbit</label>
            <input type="text" name="penerbit" required style="width: 100%; padding: 10px;">
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px;">Tahun Terbit</label>
                <input type="number" name="tahun" required style="width: 100%; padding: 10px;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px;">Stok Awal</label>
                <input type="number" name="stok" required style="width: 100%; padding: 10px;">
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Lokasi Rak</label>
            <select name="id_rak" required style="width: 100%; padding: 10px;">
                <option value="">-- Pilih Rak --</option>
                <?php 
                $rak = mysqli_query($conn, "SELECT * FROM rak");
                while($r = mysqli_fetch_array($rak)){
                    echo "<option value='$r[id_rak]'>$r[nama_rak] - $r[lokasi_rak]</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" style="background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-save"></i> Simpan Buku
        </button>
        <a href="buku.php" style="margin-left: 10px; text-decoration: none; color: #666;">Batal</a>

    </form>
</div>

<?php include 'footer.php'; ?>
<?php include 'header.php'; ?>

<div class="card" style="max-width: 600px; margin: auto;">
    <h2 style="margin-bottom: 20px;">Tambah Peminjaman</h2>
    
    <form action="proses_tambah_transaksi.php" method="POST">
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Nama Anggota</label>
            <select name="id_anggota" required style="width: 100%; padding: 10px;">
                <option value="">-- Pilih Anggota --</option>
                <?php 
                $anggota = mysqli_query($conn, "SELECT * FROM anggota");
                while($a = mysqli_fetch_array($anggota)){
                    echo "<option value='$a[id_anggota]'>$a[nis] - $a[nama]</option>";
                }
                ?>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Judul Buku</label>
            <select name="id_buku" required style="width: 100%; padding: 10px;">
                <option value="">-- Pilih Buku (Stok Tersedia) --</option>
                <?php 
                $buku = mysqli_query($conn, "SELECT * FROM buku WHERE stok > 0");
                while($b = mysqli_fetch_array($buku)){
                    echo "<option value='$b[id_buku]'>$b[judul] (Stok: $b[stok])</option>";
                }
                ?>
            </select>
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px;">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" value="<?php echo date('Y-m-d'); ?>" required style="width: 100%; padding: 10px;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; margin-bottom: 5px;">Tanggal Kembali (Deadline)</label>
                <input type="date" name="tgl_kembali" required style="width: 100%; padding: 10px;">
            </div>
        </div>

        <button type="submit" style="background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-save"></i> Simpan Transaksi
        </button>
        <a href="transaksi.php" style="margin-left: 10px; text-decoration: none; color: #666;">Batal</a>

    </form>
</div>

<?php include 'footer.php'; ?>
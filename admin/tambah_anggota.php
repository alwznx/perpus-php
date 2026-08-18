<?php include 'header.php'; ?>

<div class="card" style="max-width: 600px; margin: auto;">
    <h2 style="margin-bottom: 20px;">Tambah Anggota Baru</h2>
    
    <form action="proses_tambah_anggota.php" method="POST">
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">NIS (Nomor Induk Siswa)</label>
            <input type="text" name="nis" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Nama Lengkap</label>
            <input type="text" name="nama" required style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Kelas</label>
            <select name="id_kelas" required style="width: 100%; padding: 10px;">
                <option value="">-- Pilih Kelas --</option>
                <?php 
                $kelas = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                while($k = mysqli_fetch_array($kelas)){
                    echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>";
                }
                ?>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">No. HP</label>
            <input type="text" name="no_hp" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Alamat</label>
            <textarea name="alamat" style="width: 100%; padding: 10px;" rows="3"></textarea>
        </div>

        <div style="background: #e8f0fe; padding: 10px; border-radius: 5px; margin-bottom: 20px; font-size: 13px; color: #333;">
            <i class="fas fa-info-circle"></i> <b>Info:</b> Password login otomatis diset: <b>123</b>
        </div>

        <button type="submit" style="background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-save"></i> Simpan Anggota
        </button>
        <a href="anggota.php" style="margin-left: 10px; text-decoration: none; color: #666;">Batal</a>

    </form>
</div>

<?php include 'footer.php'; ?>
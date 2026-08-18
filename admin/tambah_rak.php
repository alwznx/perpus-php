<?php include 'header.php'; ?>

<div class="card" style="max-width: 500px; margin: auto;">
    <h2>Tambah Rak Baru</h2>
    <form action="proses_tambah_rak.php" method="POST">
        <div style="margin-bottom: 15px;">
            <label>Nama Rak</label>
            <input type="text" name="nama_rak" placeholder="Contoh: Rak 001" required style="width: 100%; padding: 10px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Lokasi</label>
            <input type="text" name="lokasi_rak" placeholder="Contoh: Lantai 1 - Pojok Kanan" required style="width: 100%; padding: 10px;">
        </div>
        <button type="submit" style="background: #2980b9; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Simpan</button>
        <a href="rak.php" style="margin-left: 10px;">Batal</a>
    </form>
</div>

<?php include 'footer.php'; ?>
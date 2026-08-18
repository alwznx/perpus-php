<?php include 'header.php'; ?>

<div class="card" style="max-width: 400px; margin: auto;">
    <h2>Tambah Kelas</h2>
    <form action="proses_tambah_kelas.php" method="POST">
        <div style="margin-bottom: 15px;">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" placeholder="Contoh: XII RPL 1" required style="width: 100%; padding: 10px;">
        </div>
        <button type="submit" style="background: #2980b9; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Simpan</button>
        <a href="kelas.php" style="margin-left: 10px;">Batal</a>
    </form>
</div>

<?php include 'footer.php'; ?>
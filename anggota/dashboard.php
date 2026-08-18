<?php include 'header.php'; ?>

<h1>Dashboard Anggota</h1>
<hr>

<div class="info-box">
    Selamat datang di Sistem Informasi Perpustakaan Sekolah Digital! <br>
    Gunakan menu di samping untuk mencari buku atau melihat riwayat peminjamanmu.
</div>

<div class="card">
    <h3>📚 Status Peminjaman Anda</h3>
    
    <?php 
    $cek_pinjam = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_anggota='$id_anggota_saya' AND status='dipinjam'");
    $jumlah = mysqli_num_rows($cek_pinjam);
    
    if($jumlah > 0){
        echo "<p>Saat ini kamu sedang meminjam <b style='font-size:20px; color:red;'>$jumlah</b> buku.</p>";
        echo "<a href='riwayat.php' style='text-decoration:none; color:blue;'>Lihat detailnya &raquo;</a>";
    } else {
        echo "<p>Kamu tidak sedang meminjam buku apapun.</p>";
    }
    ?>
</div>

<div class="card">
    <h3>📜 Tata Tertib Perpustakaan</h3>
    <ul style="margin-left: 20px; line-height: 1.8;">
        <li>Siswa wajib menjaga kebersihan dan keutuhan buku yang dipinjam.</li>
        <li>Maksimal peminjaman adalah <b>3 buku</b> dalam satu waktu.</li>
        <li>Durasi peminjaman maksimal <b>7 hari</b>.</li>
        <li>Jika terlambat mengembalikan, harap melapor ke petugas/admin.</li>
        <li>Buku yang hilang atau rusak wajib diganti.</li>
    </ul>
</div>

<?php include 'footer.php'; ?>
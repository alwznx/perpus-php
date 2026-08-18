<?php include 'header.php'; ?>

<h1>Dashboard Admin</h1>
<p>Selamat datang, <b><?php echo $_SESSION['username']; ?></b>! Berikut adalah statistik perpustakaan saat ini.</p>
<hr>

<div class="card-container">
    
    <div class="card">
        <h3>Total Buku</h3>
        <?php
        $data_buku = mysqli_query($conn, "SELECT * FROM buku");
        $jumlah_buku = mysqli_num_rows($data_buku);
        ?>
        <h1><?php echo $jumlah_buku; ?></h1>
    </div>

    <div class="card">
        <h3>Anggota Terdaftar</h3>
        <?php
        $data_anggota = mysqli_query($conn, "SELECT * FROM anggota");
        $jumlah_anggota = mysqli_num_rows($data_anggota);
        ?>
        <h1><?php echo $jumlah_anggota; ?></h1>
    </div>

    <div class="card">
        <h3>Sedang Dipinjam</h3>
        <?php
        $data_pinjam = mysqli_query($conn, "SELECT * FROM peminjaman WHERE status='dipinjam'");
        $jumlah_pinjam = mysqli_num_rows($data_pinjam);
        ?>
        <h1><?php echo $jumlah_pinjam; ?></h1>
    </div>

    <div class="card">
        <h3>Data Rak</h3>
        <?php
        $data_rak = mysqli_query($conn, "SELECT * FROM rak");
        $jumlah_rak = mysqli_num_rows($data_rak);
        ?>
        <h1><?php echo $jumlah_rak; ?></h1>
    </div>

</div>

<div style="margin-top: 30px; text-align: center;">
    <img src="../assets/img/logo.jpg" style="width: 150px; opacity: 0.5;">
</div>

<?php include 'footer.php'; ?>
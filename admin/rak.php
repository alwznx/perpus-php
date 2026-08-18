<?php include 'header.php'; ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Data Rak Buku</h2>
    <a href="tambah_rak.php" class="btn-tambah" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        <i class="fas fa-plus"></i> Tambah Rak
    </a>
</div>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th>No</th>
                <th>Nama Rak</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $data = mysqli_query($conn, "SELECT * FROM rak ORDER BY id_rak DESC");
            $no = 1;
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $d['nama_rak']; ?></td>
                <td><?php echo $d['lokasi_rak']; ?></td>
                <td align="center">
                    <a href="hapus_rak.php?id=<?php echo $d['id_rak']; ?>" 
                       onclick="return confirm('Yakin hapus rak ini?')" 
                       style="color: red; text-decoration: none;">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
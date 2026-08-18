<?php include 'header.php'; ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Data Buku Perpustakaan</h2>
    <a href="tambah_buku.php" class="btn-tambah" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        <i class="fas fa-plus"></i> Tambah Buku Baru
    </a>
</div>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit / Tahun</th>
                <th>Lokasi Rak</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT buku.*, rak.nama_rak FROM buku 
                      LEFT JOIN rak ON buku.id_rak = rak.id_rak 
                      ORDER BY id_buku DESC";
            $data = mysqli_query($conn, $query);
            $no = 1;
            
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><b><?php echo $d['judul']; ?></b></td>
                <td><?php echo $d['pengarang']; ?></td>
                <td><?php echo $d['penerbit']; ?> (<?php echo $d['tahun_terbit']; ?>)</td>
                <td align="center"><?php echo $d['nama_rak'] ? $d['nama_rak'] : '-'; ?></td>
                <td align="center">
                    <span style="background: #3498db; color: white; padding: 3px 8px; border-radius: 4px;">
                        <?php echo $d['stok']; ?>
                    </span>
                </td>
                <td align="center">
                    <a href="edit_buku.php?id=<?php echo $d['id_buku']; ?>" style="color: orange; text-decoration: none; margin-right: 10px;">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="hapus_buku.php?id=<?php echo $d['id_buku']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus buku ini?')" 
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
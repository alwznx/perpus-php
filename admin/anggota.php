<?php include 'header.php'; ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Data Anggota Perpustakaan</h2>
    <a href="tambah_anggota.php" class="btn-tambah" style="background: #27ae60; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        <i class="fas fa-user-plus"></i> Tambah Anggota
    </a>
</div>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT anggota.*, kelas.nama_kelas FROM anggota 
                      LEFT JOIN kelas ON anggota.id_kelas = kelas.id_kelas 
                      ORDER BY id_anggota DESC";
            $data = mysqli_query($conn, $query);
            $no = 1;
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $d['nis']; ?></td>
                <td><b><?php echo $d['nama']; ?></b></td>
                <td align="center"><?php echo $d['nama_kelas']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td align="center">
                    <a href="edit_anggota.php?id=<?php echo $d['id_anggota']; ?>" style="color: orange; text-decoration: none; margin-right: 10px;">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="hapus_anggota.php?id=<?php echo $d['id_anggota']; ?>&id_user=<?php echo $d['id_user']; ?>" 
                       onclick="return confirm('Hapus anggota ini beserta akun loginnya?')" 
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
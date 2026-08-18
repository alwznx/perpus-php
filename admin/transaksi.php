<?php include 'header.php'; ?>

<h2>Manajemen Transaksi Perpustakaan</h2>
<hr>

<?php $status_filter = isset($_GET['tab']) ? $_GET['tab'] : 'menunggu'; ?>
<div style="margin-bottom: 20px; display: flex; gap: 10px;">
    <a href="transaksi.php?tab=menunggu" style="padding: 10px 15px; background:<?php echo ($status_filter == 'menunggu') ? '#f1c40f' : '#ccc'; ?>; color: #333; text-decoration: none; border-radius: 5px;">
        <i class="fas fa-clock"></i> Pengajuan Baru
    </a>
    <a href="transaksi.php?tab=dipinjam" style="padding: 10px 15px; background:<?php echo ($status_filter == 'dipinjam') ? '#e74c3c' : '#ccc'; ?>; color: #333; text-decoration: none; border-radius: 5px;">
        <i class="fas fa-sync-alt"></i> Sedang Dipinjam
    </a>
    <a href="transaksi.php?tab=dikembalikan" style="padding: 10px 15px; background:<?php echo ($status_filter == 'dikembalikan') ? '#27ae60' : '#ccc'; ?>; color: #333; text-decoration: none; border-radius: 5px;">
        <i class="fas fa-check-double"></i> Riwayat Selesai
    </a>
</div>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th>No</th>
                <th>Peminjam (NIS)</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            $query = "SELECT p.*, a.nama AS nama_anggota, a.nis, b.judul 
                      FROM peminjaman p
                      JOIN anggota a ON p.id_anggota = a.id_anggota 
                      JOIN buku b ON p.id_buku = b.id_buku 
                      WHERE p.status = '$status_filter'
                      ORDER BY p.tanggal_pinjam DESC";
            
            $data = mysqli_query($conn, $query);
            $no = 1;

            if(mysqli_num_rows($data) == 0){
                echo "<tr><td colspan='7' align='center'>Tidak ada transaksi dengan status '$status_filter'.</td></tr>";
            }
            
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><b><?php echo $d['nama_anggota']; ?></b> (<?php echo $d['nis']; ?>)</td>
                <td><?php echo $d['judul']; ?></td>
                <td align="center"><?php echo date('d-m-Y', strtotime($d['tanggal_pinjam'])); ?></td>
                <td align="center"><?php echo date('d-m-Y', strtotime($d['tanggal_kembali'])); ?></td>
                <td align="center">
                    <?php 
                    $color = ($d['status'] == 'menunggu') ? '#f1c40f' : (($d['status'] == 'dipinjam') ? '#e74c3c' : '#27ae60');
                    echo "<span style='background: $color; color: white; padding: 3px 10px; border-radius: 15px; font-size: 12px;'>" . strtoupper($d['status']) . "</span>";
                    ?>
                </td>

                <td align="center">
                    <?php if($d['status'] == 'menunggu'){ ?>
                        <a href="proses_verifikasi.php?id=<?php echo $d['id_peminjaman']; ?>" 
                           onclick="return confirm('Verifikasi dan Setujui pinjaman ini? (Stok akan dikurangi!)')"
                           style="background: #27ae66; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">
                           <i class="fas fa-check-circle"></i> Setujui
                        </a>
                    <?php } elseif($d['status'] == 'dipinjam') { ?>
                         <a href="proses_kembali.php?id=<?php echo $d['id_peminjaman']; ?>" 
                           onclick="return confirm('Proses pengembalian buku ini?')"
                           style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;">
                           <i class="fas fa-undo"></i> Kembalikan
                        </a>
                    <?php } else { ?>
                        <i class="fas fa-check-double" style="color:green"></i> Selesai
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
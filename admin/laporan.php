<?php include 'header.php'; ?>

<h2>Laporan Peminjaman Buku</h2>
<p>Silakan pilih rentang tanggal untuk menampilkan laporan.</p>
<hr>

<div class="card" style="margin-bottom: 20px;">
    <form action="laporan.php" method="GET">
        <div style="display: flex; gap: 10px; align-items: flex-end;">
            <div>
                <label>Tanggal Awal</label>
                <input type="date" name="tgl_awal" required style="padding: 8px;">
            </div>
            <div>
                <label>Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" required style="padding: 8px;">
            </div>
            <div>
                <button type="submit" style="padding: 10px 20px; background: #2980b9; color: white; border: none; border-radius: 4px;">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </div>
    </form>
</div>

<?php 
if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
    $tgl_awal = $_GET['tgl_awal'];
    $tgl_akhir = $_GET['tgl_akhir'];
    
    echo "<div style='margin-bottom:15px;'>
            <b>Menampilkan data dari:</b> $tgl_awal <b>sampai</b> $tgl_akhir
            <a target='_blank' href='cetak_laporan.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir' style='padding: 8px 15px; background: #e67e22; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px;'>
                <i class='fas fa-print'></i> Cetak / Print PDF
            </a>
          </div>";
?>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #eee;">
                <th>No</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT peminjaman.*, anggota.nama, buku.judul 
                      FROM peminjaman 
                      JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                      JOIN buku ON peminjaman.id_buku = buku.id_buku 
                      WHERE date(tanggal_pinjam) >= '$tgl_awal' 
                      AND date(tanggal_pinjam) <= '$tgl_akhir'";
            
            $data = mysqli_query($conn, $query);
            $no = 1;
            
            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['judul']; ?></td>
                <td align="center"><?php echo $d['tanggal_pinjam']; ?></td>
                <td align="center"><?php echo $d['tanggal_kembali']; ?></td>
                <td align="center">
                    <?php echo ($d['status'] == 'dipinjam') ? '<span style="color:red">Dipinjam</span>' : '<span style="color:green">Kembali</span>'; ?>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='6' align='center'>Tidak ada data pada tanggal ini.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php } // Penutup IF isset ?>

<?php include 'footer.php'; ?>
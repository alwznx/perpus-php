<?php include 'header.php'; ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Katalog Buku</h2>
    
    <form action="buku.php" method="GET" style="display: flex; gap: 5px;">
        <input type="text" name="cari" placeholder="Cari judul / pengarang..." 
               style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 250px;"
               value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
        <button type="submit" style="padding: 8px 15px; background: #2980b9; color: white; border: none; border-radius: 4px; cursor: pointer;">
            <i class="fas fa-search"></i> Cari
        </button>
    </form>
</div>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #3498db; color: white;">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit (Tahun)</th>
                <th>Lokasi Rak</th>
                <th>Stok</th>
                <th>Aksi</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
            $query_base = "SELECT buku.*, rak.nama_rak, rak.lokasi_rak 
                           FROM buku 
                           LEFT JOIN rak ON buku.id_rak = rak.id_rak";
            
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = $query_base . " WHERE judul LIKE '%$cari%' OR pengarang LIKE '%$cari%'";
            } else {
                $query = $query_base;
            }

            $data = mysqli_query($conn, $query);
            $no = 1;

            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><b><?php echo $d['judul']; ?></b></td>
                <td><?php echo $d['pengarang']; ?></td>
                <td><?php echo $d['penerbit']; ?> (<?php echo $d['tahun_terbit']; ?>)</td>
                <td><?php echo $d['nama_rak'] ? $d['nama_rak'] : '-'; ?></td>
                <td align="center">
                    <?php 
                    if($d['stok'] > 0){
                        echo "<span style='background:#2ecc71; color:white; padding:3px 10px; border-radius:15px; font-size:12px;'>Tersedia ($d[stok])</span>";
                    } else {
                        echo "<span style='background:#e74c3c; color:white; padding:3px 10px; border-radius:15px; font-size:12px;'>Habis</span>";
                    }
                    ?>
                </td>
                <td align="center">
                    <?php if($d['stok'] > 0){ ?>
                        <a href="proses_ajukan_pinjam.php?id_buku=<?php echo $d['id_buku']; ?>&id_anggota=<?php echo $id_anggota_saya; ?>"
                           onclick="return confirm('Ajukan pinjaman buku ini? (Menunggu persetujuan Admin)')" 
                           style="background: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px;">
                           <i class="fas fa-hand-holding"></i> Ajukan Pinjam
                        </a>
                    <?php } else { ?>
                        <button disabled style="padding: 5px 10px; background:#ccc; border:none; border-radius: 4px; font-size: 12px;">Habis</button>
                    <?php } ?>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='7' align='center'>Buku tidak ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
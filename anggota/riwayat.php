<?php include 'header.php'; ?>

<h2>Riwayat Peminjaman Saya</h2>
<p>Berikut adalah daftar buku yang sedang diajukan atau sudah dipinjam.</p>
<hr>

<div class="card">
    <table border="1" cellspacing="0" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <thead>
            <tr style="background: #3498db; color: white;">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali (Deadline)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $id_ang = $id_anggota_saya;
            
            $query = "SELECT peminjaman.*, buku.judul 
                      FROM peminjaman 
                      JOIN buku ON peminjaman.id_buku = buku.id_buku 
                      WHERE peminjaman.id_anggota = '$id_ang'
                      ORDER BY id_peminjaman DESC";
            
            $data = mysqli_query($conn, $query);
            $no = 1;

            if(mysqli_num_rows($data) > 0){
                while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><b><?php echo $d['judul']; ?></b></td>
                <td><?php echo date('d-m-Y', strtotime($d['tanggal_pinjam'])); ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tanggal_kembali'])); ?></td>
                <td align="center">
                    <?php 
                    $status = $d['status'];
                    if($status == 'menunggu'){
                        echo "<span style='background:#f1c40f; color:#333; padding:3px 10px; border-radius:15px; font-size:12px;'>MENUNGGU</span>";
                    } elseif($status == 'dipinjam'){
                        echo "<span style='background:#e74c3c; color:white; padding:3px 10px; border-radius:15px; font-size:12px;'>DIPINJAM</span>";
                    } else {
                        echo "<span style='background:#27ae60; color:white; padding:3px 10px; border-radius:15px; font-size:12px;'>SELESAI</span>";
                    }
                    ?>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='5' align='center'>Belum ada riwayat peminjaman.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
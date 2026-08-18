<?php 
include '../koneksi.php';

$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2, h4 { text-align: center; margin: 5px 0; }
    </style>
</head>
<body>

    <h2>PERPUSTAKAAN SEKOLAH DIGITAL</h2>
    <h4>Laporan Peminjaman Buku</h4>
    <p style="text-align: center;">Periode: <?php echo $tgl_awal; ?> s/d <?php echo $tgl_akhir; ?></p>
    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
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
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['judul']; ?></td>
                <td><?php echo $d['tanggal_pinjam']; ?></td>
                <td><?php echo $d['tanggal_kembali']; ?></td>
                <td><?php echo $d['status']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div style="margin-top: 30px; float: right; text-align: center; width: 200px;">
        <p>Mengetahui,</p>
        <br><br><br>
        <p><b>Kepala Perpustakaan</b></p>
    </div>

    <script>
        window.print();
    </script>

</body>
</html>
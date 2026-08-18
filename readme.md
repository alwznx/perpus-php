# 📚 Perpustakaan Digital Sekolah (Multi-Role Web Application)

## Deskripsi Proyek
Proyek ini adalah Sistem Informasi Perpustakaan Digital sederhana yang dibangun menggunakan PHP Native (procedural) dan database MySQL. Tujuannya adalah untuk mengelola sirkulasi peminjaman dan pengembalian buku di lingkungan sekolah dengan sistem multi-role (Admin dan Anggota).

---

## ✨ Fitur Utama Aplikasi

### A. Fitur Administrasi (Admin)
| Modul | Fungsi Utama | Keterangan |
| :--- | :--- | :--- |
| **Dashboard** | Statistik Real-Time | Menampilkan total buku, anggota, dan peminjaman aktif. |
| **Data Master** | CRUD (Create, Read, Update, Delete) | Pengelolaan data Buku, Data Anggota, Data Rak, dan Data Kelas. |
| **Transaksi** | Verifikasi & Pengembalian | Menerima pengajuan pinjaman dari Anggota, memproses persetujuan, dan mencatat pengembalian. |
| **Otomatisasi** | Stok Otomatis | Stok buku **berkurang -1** saat pinjam, dan **bertambah +1** saat kembali (dikelola oleh **MySQL Trigger**). |
| **Laporan** | Filter & Cetak | Menampilkan rekapitulasi transaksi berdasarkan rentang tanggal dan fitur cetak (print/PDF). |
| **Pengaturan** | Keamanan Akun | Mengubah Username dan Password akun Admin. |

### B. Fitur Anggota (Siswa)
* **Daftar Buku:** Melihat katalog buku yang tersedia (read-only) lengkap dengan fitur pencarian.
* **Ajukan Peminjaman:** Mengajukan permintaan pinjaman langsung dari katalog buku (menunggu persetujuan Admin).
* **Riwayat:** Melihat riwayat semua transaksi pinjaman yang pernah dilakukan.

---

## 💻 Teknologi yang Digunakan
* **Backend:** PHP 8+ (Native/Procedural)
* **Database:** MySQL / MariaDB
* **Environment:** XAMPP
* **Frontend:** HTML5, CSS (Custom/Vanilla), JavaScript (Vanilla)
* **Library:** Font Awesome (untuk ikon)

---

## 🛠️ Panduan Instalasi (Setup Project)

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek menggunakan XAMPP:

### 1. Persiapan Lingkungan
1.  **Nyalakan XAMPP:** Buka XAMPP Control Panel, lalu **Start** module **Apache** dan **MySQL**.
2.  **Siapkan Folder:** Masuk ke direktori `C:\xampp\htdocs\`.
3.  **Pindahkan Proyek:** Salin seluruh folder proyek **`perpustakaan`** ke dalam `C:\xampp\htdocs\`.

### 2. Impor Database
1.  Akses **phpMyAdmin** melalui browser: `http://localhost/phpmyadmin`
2.  Buat database baru dengan nama: **`perpustakaan_db`** (harus sama persis).
3.  Klik database **`perpustakaan_db`** yang baru dibuat.
4.  Pilih tab **SQL**.
5.  Jalankan seluruh skema SQL yang Anda miliki (termasuk tabel `users`, `anggota`, `buku`, `peminjaman`, dan `trigger`).

### 3. Konfigurasi Koneksi
Pastikan file **`koneksi.php`** di folder root proyek Anda sudah memiliki konfigurasi yang sesuai:

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "perpustakaan_db"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```
### 4. Akses AplikasiBuka
browser dan akses URL: http://localhost/perpustakaan/

## 🔐 Akun Demo (Credentials)

Gunakan akun berikut untuk masuk dan menguji fitur aplikasi:

| Role | Username | Password | Keterangan |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin` | `123` | Mengelola data master dan memverifikasi pinjaman. |
| **Anggota** | `siswa` | `123` | Mengajukan pinjaman dan melihat riwayat pinjaman. |

## 📂 Struktur Folder ProyekProyek ini menggunakan struktur yang terorganisir untuk memisahkan logika tampilan, proses, dan otentikasi:Plaintextperpustakaan/
├── admin/                  <-- Halaman & Logika Khusus Admin
│   ├── dashboard.php
│   ├── buku.php            <-- CRUD Buku
│   ├── anggota.php         <-- CRUD Anggota
│   ├── transaksi.php       <-- Verifikasi & Pengembalian
│   ├── pengaturan.php      <-- Ganti Password/Username
│   ├── proses_verifikasi.php
│   └── header.php, footer.php, dll.
├── anggota/                <-- Halaman Khusus Anggota/Siswa
│   ├── dashboard.php
│   ├── buku.php            <-- Katalog Buku (Read Only)
│   ├── riwayat.php         <-- Riwayat Peminjaman Pribadi
│   └── header.php, footer.php, dll.
├── assets/                 <-- Assets (CSS, JS, Gambar)
├── index.php               <-- Halaman Login
├── cek_login.php
└── koneksi.php
# Hak Cipta (HKI): Dibuat untuk tujuan akademik dan pengajuan HKI.
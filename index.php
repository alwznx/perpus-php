<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpustakaan Digital</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* --- CSS KHUSUS HALAMAN LOGIN --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%); /* Latar belakang gradasi biru */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .logo-img {
            width: 80px;
            margin-bottom: 15px;
        }

        h2 {
            color: #333;
            margin-bottom: 5px;
            font-weight: 600;
        }

        p.subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.3s;
            outline: none;
        }

        .form-group input:focus {
            border-color: #0072ff;
            box-shadow: 0 0 0 3px rgba(0, 114, 255, 0.1);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #0072ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #005bb5;
        }

        /* Style untuk Pesan Notifikasi */
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 13px;
        }
        .alert-danger {
            background-color: #ffecec;
            color: #d9534f;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <img src="assets/img/logo.jpg" alt="Logo Perpustakaan" class="logo-img">
        
        <h2>Selamat Datang</h2>
        <p class="subtitle">Silakan login untuk melanjutkan</p>

        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='alert alert-danger'>Login Gagal! Username atau Password salah.</div>";
            } else if($_GET['pesan'] == "logout"){
                echo "<div class='alert alert-success'>Anda berhasil logout. Sampai jumpa!</div>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<div class='alert alert-danger'>Akses Ditolak! Silakan login dulu.</div>";
            }
        }
        ?>

        <form action="cek_login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username..." required autofocus autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password..." required>
            </div>
            <button type="submit" class="btn-login">MASUK SEKARANG</button>
        </form>

        <div class="footer-text">
            &copy; 2025 Perpustakaan Sekolah Digital
        </div>
    </div>

</body>
</html>
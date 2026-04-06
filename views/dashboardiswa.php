<?php
include 'koneksi.php';

// ambil jumlah buku
$buku = mysqli_query($conn, "SELECT COUNT(*) as total FROM buku");
$data_buku = mysqli_fetch_assoc($buku);

// ambil jumlah peminjaman
$pinjam = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE status='dipinjam'");
$data_pinjam = mysqli_fetch_assoc($pinjam);

// ambil jumlah kembali
$kembali = mysqli_query($conn, "SELECT COUNT(*) as total FROM peminjaman WHERE status='dikembalikan'");
$data_kembali = mysqli_fetch_assoc($kembali);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa</title>
    <style>
        body {
            font-family: Arial;
            background: #ffe6f0;
            margin: 0;
        }

        .navbar {
            background: #ff4da6;
            padding: 15px;
            color: white;
            text-align: center;
            font-size: 20px;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        .card {
            width: 30%;
            display: inline-block;
            margin: 1%;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
            text-align: center;
        }

        .card h3 {
            color: #ff4da6;
        }

        .card p {
            font-size: 25px;
            font-weight: bold;
        }

        .menu {
            margin-top: 20px;
            text-align: center;
        }

        .menu a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #ff4da6;
            color: white;
            border-radius: 8px;
            text-decoration: none;
        }

        .menu a:hover {
            background: #ff1a8c;
        }
    </style>
</head>
<body>

<div class="navbar">
    💖 Dashboard Siswa Perpustakaan Digital 💖
</div>

<div class="container">

    <div class="card">
        <h3>📚 Total Buku</h3>
        <p><?= $data_buku['total']; ?></p>
    </div>

    <div class="card">
        <h3>📖 Sedang Dipinjam</h3>
        <p><?= $data_pinjam['total']; ?></p>
    </div>

    <div class="card">
        <h3>✅ Sudah Dikembalikan</h3>
        <p><?= $data_kembali['total']; ?></p>
    </div>

    <div class="menu">
        <a href="buku.php">📚 Lihat Buku</a>
        <a href="peminjaman.php">📖 Peminjaman</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
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
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        .card {
            width: 22%;
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
            font-size: 28px;
            font-weight: bold;
        }

        .menu {
            text-align: center;
            margin-top: 20px;
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
    💖 Dashboard Admin Perpustakaan 💖
</div>

<div class="container">

    <div class="card">
        <h3>📚 Total Buku</h3>
        <p><?= $total_buku; ?></p>
    </div>

    <div class="card">
        <h3>👥 Total Anggota</h3>
        <p><?= $total_anggota; ?></p>
    </div>

    <div class="card">
        <h3>📖 Total Peminjaman</h3>
        <p><?= $total_peminjaman; ?></p>
    </div>

    <div class="card">
        <h3>🔥 Sedang Dipinjam</h3>
        <p><?= $total_dipinjam; ?></p>
    </div>

    <div class="menu">
        <a href="buku.php">📚 Buku</a>
        <a href="anggota.php">👥 Anggota</a>
        <a href="peminjaman.php">📖 Peminjaman</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

</div>

</body>
</html>
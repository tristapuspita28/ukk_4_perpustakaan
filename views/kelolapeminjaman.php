<!DOCTYPE html>
<html>
<head>
    <title>Kelola Peminjaman</title>
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
            width: 95%;
            margin: 20px auto;
        }

        h2 {
            text-align: center;
            color: #ff4da6;
        }

        .btn {
            background: #ff4da6;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 10px;
        }

        th {
            background: #ff99cc;
            color: white;
        }

        th, td {
            border: 1px solid pink;
            padding: 10px;
            text-align: center;
        }

        .aksi a {
            margin: 0 5px;
            color: #ff1a8c;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="navbar">💖 Kelola Peminjaman 💖</div>

<div class="container">

<h2>📖 Data Peminjaman</h2>

<a href="tambah_peminjaman.php" class="btn">+ Tambah Peminjaman</a>

<table>
<tr>
    <th>No</th>
    <th>ID User</th>
    <th>Judul Buku</th>
    <th>Tgl Pinjam</th>
    <th>Jatuh Tempo</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($d = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['id_user']; ?></td>
    <td><?= $d['judul']; ?></td>
    <td><?= $d['tanggal_pinjam']; ?></td>
    <td><?= $d['tanggal_jatuh_tempo']; ?></td>
    <td><?= $d['tanggal_kembali']; ?></td>
    <td><?= $d['status']; ?></td>
    <td class="aksi">
        <a href="edit_peminjaman.php?id=<?= $d['id_peminjaman']; ?>">✏️</a>
        <a href="hapus_peminjaman.php?id=<?= $d['id_peminjaman']; ?>" onclick="return confirm('Yakin?')">❌</a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
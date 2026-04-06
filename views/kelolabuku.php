<!DOCTYPE html>
<html>
<head>
    <title>Kelola Buku</title>
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

        h2 {
            text-align: center;
            color: #ff4da6;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        .btn-tambah {
            display: inline-block;
            margin-bottom: 10px;
            padding: 10px 15px;
            background: #ff4da6;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-tambah:hover {
            background: #ff1a8c;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 0 10px pink;
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

        tr:hover {
            background: #ffe6f2;
        }

        .aksi a {
            margin: 0 5px;
            color: #ff1a8c;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="navbar">
    💖 Kelola Buku 💖
</div>

<div class="container">

    <h2>📚 Data Buku</h2>

    <a href="tambah_buku.php" class="btn-tambah">+ Tambah Buku</a>

    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($d = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['id_buku']; ?></td>
            <td><?= $d['judul']; ?></td>
            <td><?= $d['pengarang']; ?></td>
            <td><?= $d['penerbit']; ?></td>
            <td><?= $d['tahun']; ?></td>
            <td><?= $d['stok']; ?></td>
            <td class="aksi">
                <a href="edit_buku.php?id=<?= $d['id_buku']; ?>">✏️ Edit</a>
                <a href="hapus_buku.php?id=<?= $d['id_buku']; ?>" onclick="return confirm('Yakin hapus?')">❌ Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
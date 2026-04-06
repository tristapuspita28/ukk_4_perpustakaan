<!DOCTYPE html>
<html>
<head>
    <title>Kelola Anggota</title>
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

<div class="navbar">💖 Kelola Anggota 💖</div>

<div class="container">

<h2>👥 Data Anggota</h2>

<a href="tambah_anggota.php" class="btn">+ Tambah Anggota</a>

<table>
<tr>
    <th>No</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($d = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['id_anggota']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['alamat']; ?></td>
    <td><?= $d['email']; ?></td>
    <td class="aksi">
        <a href="edit_anggota.php?id=<?= $d['id_anggota']; ?>">✏️</a>
        <a href="hapus_anggota.php?id=<?= $d['id_anggota']; ?>" onclick="return confirm('Yakin?')">❌</a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
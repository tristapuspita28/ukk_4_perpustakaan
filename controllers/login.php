<?php
include 'koneksi.php';

// ambil data buku
$query = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: lightblue;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Data Buku Perpustakaan</h2>

<table>
    <tr>
        <th>No</th>
        <th>ID Buku</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Stok</th>
    </tr>

    <?php
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['id_buku']; ?></td>
        <td><?= $data['judul']; ?></td>
        <td><?= $data['penulis']; ?></td>
        <td><?= $data['penerbit']; ?></td>
        <td><?= $data['tahun_terbit']; ?></td>
        <td><?= $data['stok'];?>sss</td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
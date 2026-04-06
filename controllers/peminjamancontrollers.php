<?php
include 'koneksi.php';

// SIMPAN
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO peminjaman 
    (id_user, id_buku, tanggal_pinjam, tanggal_jatuh_tempo, tanggal_kembali, status)
    VALUES (
        '$_POST[id_user]',
        '$_POST[id_buku]',
        '$_POST[tanggal_pinjam]',
        '$_POST[tanggal_jatuh_tempo]',
        NULL,
        'dipinjam'
    )");
}

// KEMBALIKAN
if (isset($_GET['kembali'])) {
    mysqli_query($conn, "UPDATE peminjaman 
    SET tanggal_kembali=CURDATE(), status='dikembalikan'
    WHERE id_peminjaman='$_GET[kembali]'");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial;
            background: #ffe6f0;
        }

        h2 {
            text-align: center;
            color: #ff4da6;
        }

        form {
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid pink;
            border-radius: 5px;
        }

        button {
            background: #ff4da6;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #ff1a8c;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            background: white;
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

        a {
            color: #ff1a8c;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>💖 Form Peminjaman Buku 💖</h2>

<form method="POST">
    ID User:
    <input type="number" name="id_user" required>

    Pilih Buku:
    <select name="id_buku" required>
        <?php
        $buku = mysqli_query($conn, "SELECT * FROM buku");
        while ($b = mysqli_fetch_assoc($buku)) {
            echo "<option value='$b[id_buku]'>$b[judul]</option>";
        }
        ?>
    </select>

    Tanggal Pinjam:
    <input type="date" name="tanggal_pinjam" required>

    Tanggal Jatuh Tempo:
    <input type="date" name="tanggal_jatuh_tempo" required>

    <button name="simpan">Simpan</button>
</form>

<h2>📚 Data Peminjaman</h2>

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

<?php
$no = 1;
$data = mysqli_query($conn, "
    SELECT p.*, b.judul 
    FROM peminjaman p
    JOIN buku b ON p.id_buku = b.id_buku
");

while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['id_user']; ?></td>
    <td><?= $d['judul']; ?></td>
    <td><?= $d['tanggal_pinjam']; ?></td>
    <td><?= $d['tanggal_jatuh_tempo']; ?></td>
    <td><?= $d['tanggal_kembali']; ?></td>
    <td><?= $d['status']; ?></td>
    <td>
        <?php if ($d['status'] == 'dipinjam') { ?>
            <a href="?kembali=<?= $d['id_peminjaman']; ?>">💖 Kembalikan</a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
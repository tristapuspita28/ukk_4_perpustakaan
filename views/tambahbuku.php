<?php
include 'koneksi.php';

// proses simpan
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO buku 
    (judul, pengarang, penerbit, tahun, stok)
    VALUES (
        '$_POST[judul]',
        '$_POST[pengarang]',
        '$_POST[penerbit]',
        '$_POST[tahun]',
        '$_POST[stok]'
    )");

    header("Location: buku.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
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

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
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
    </style>
</head>
<body>

<h2>💖 Tambah Buku 💖</h2>

<form method="POST">
    Judul:
    <input type="text" name="judul" required>

    Pengarang:
    <input type="text" name="pengarang" required>

    Penerbit:
    <input type="text" name="penerbit" required>

    Tahun:
    <input type="number" name="tahun" required>

    Stok:
    <input type="number" name="stok" required>

    <button name="simpan">Simpan</button>
</form>

</body>
</html>
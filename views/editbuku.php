<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data buku
$data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$d = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE buku SET 
        judul='$_POST[judul]',
        pengarang='$_POST[pengarang]',
        penerbit='$_POST[penerbit]',
        tahun='$_POST[tahun]',
        stok='$_POST[stok]'
        WHERE id_buku='$id'
    ");

    header("Location: buku.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
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

<h2>💖 Edit Buku 💖</h2>

<form method="POST">
    Judul:
    <input type="text" name="judul" value="<?= $d['judul']; ?>" required>

    Pengarang:
    <input type="text" name="pengarang" value="<?= $d['pengarang']; ?>" required>

    Penerbit:
    <input type="text" name="penerbit" value="<?= $d['penerbit']; ?>" required>

    Tahun:
    <input type="number" name="tahun" value="<?= $d['tahun']; ?>" required>

    Stok:
    <input type="number" name="stok" value="<?= $d['stok']; ?>" required>

    <button name="update">Update</button>
</form>

</body>
</html>
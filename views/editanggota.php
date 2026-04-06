<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data anggota
$data = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id'");
$d = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE anggota SET 
        nama='$_POST[nama]',
        alamat='$_POST[alamat]',
        email='$_POST[email]'
        WHERE id_anggota='$id'
    ");

    header("Location: anggota.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
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

        input, textarea {
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

<h2>💖 Edit Anggota 💖</h2>

<form method="POST">
    Nama:
    <input type="text" name="nama" value="<?= $d['nama']; ?>" required>

    Alamat:
    <textarea name="alamat" required><?= $d['alamat']; ?></textarea>

    Email:
    <input type="email" name="email" value="<?= $d['email']; ?>" required>

    <button name="update">Update</button>
</form>

</body>
</html>
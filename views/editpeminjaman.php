<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data peminjaman
$data = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
$d = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE peminjaman SET 
        id_user='$_POST[id_user]',
        id_buku='$_POST[id_buku]',
        tanggal_pinjam='$_POST[tanggal_pinjam]',
        tanggal_jatuh_tempo='$_POST[tanggal_jatuh_tempo]',
        tanggal_kembali='$_POST[tanggal_kembali]',
        status='$_POST[status]'
        WHERE id_peminjaman='$id'
    ");

    header("Location: peminjaman.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman</title>
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

<h2>💖 Edit Peminjaman 💖</h2>

<form method="POST">
    ID User:
    <input type="number" name="id_user" value="<?= $d['id_user']; ?>" required>

    Pilih Buku:
    <select name="id_buku">
        <?php
        $buku = mysqli_query($conn, "SELECT * FROM buku");
        while ($b = mysqli_fetch_assoc($buku)) {
            $selected = ($b['id_buku'] == $d['id_buku']) ? "selected" : "";
            echo "<option value='$b[id_buku]' $selected>$b[judul]</option>";
        }
        ?>
    </select>

    Tanggal Pinjam:
    <input type="date" name="tanggal_pinjam" value="<?= $d['tanggal_pinjam']; ?>">

    Tanggal Jatuh Tempo:
    <input type="date" name="tanggal_jatuh_tempo" value="<?= $d['tanggal_jatuh_tempo']; ?>">

    Tanggal Kembali:
    <input type="date" name="tanggal_kembali" value="<?= $d['tanggal_kembali']; ?>">

    Status:
    <select name="status">
        <option value="dipinjam" <?= ($d['status']=='dipinjam')?'selected':''; ?>>Dipinjam</option>
        <option value="dikembalikan" <?= ($d['status']=='dikembalikan')?'selected':''; ?>>Dikembalikan</option>
    </select>

    <button name="update">Update</button>
</form>

</body>
</html>
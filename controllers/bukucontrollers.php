<?php
// controller buku
include '../koneksi.php';          // koneksi database
include '../models/model_buku.php'; // model buku

// ambil action dari URL
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch($action) {

    case 'list':
        // ambil semua data buku
        $data = getBuku($conn);
        include '../views/buku.php';
        break;

    case 'add':
        if (isset($_POST['simpan'])) {
            tambahBuku(
                $conn,
                $_POST['judul'],
                $_POST['pengarang'],
                $_POST['penerbit'],
                $_POST['tahun'],
                $_POST['stok']
            );
            header("Location: buku.php");
        }
        include '../views/tambah_buku.php';
        break;

    case 'edit':
        $id = $_GET['id'];
        $buku = getBukuById($conn, $id);

        if (isset($_POST['simpan'])) {
            editBuku(
                $conn,
                $id,
                $_POST['judul'],
                $_POST['pengarang'],
                $_POST['penerbit'],
                $_POST['tahun'],
                $_POST['stok']
            );
            header("Location: buku.php");
        }

        include '../views/edit_buku.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        hapusBuku($conn, $id);
        header("Location: buku.php");
        break;

    default:
        echo "Action tidak valid!";
}
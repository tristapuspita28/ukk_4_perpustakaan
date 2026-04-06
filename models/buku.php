<?php

function getBuku($conn) {
    return mysqli_query($conn, "SELECT * FROM buku");
}

function tambahBuku($conn, $judul, $pengarang, $penerbit, $tahun, $stok) {
    return mysqli_query($conn, "INSERT INTO buku 
    (judul, pengarang, penerbit, tahun, stok)
    VALUES ('$judul','$pengarang','$penerbit','$tahun','$stok')");
}

function hapusBuku($conn, $id) {
    return mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");
}

?>
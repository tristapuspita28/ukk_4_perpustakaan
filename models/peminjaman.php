<?php

function getPeminjaman($conn) {
    return mysqli_query($conn, "
        SELECT p.*, b.judul 
        FROM peminjaman p
        JOIN buku b ON p.id_buku = b.id_buku
    ");
}

function tambahPeminjaman($conn, $id_user, $id_buku, $tgl_pinjam, $jatuh_tempo) {
    return mysqli_query($conn, "INSERT INTO peminjaman 
    (id_user, id_buku, tanggal_pinjam, tanggal_jatuh_tempo, tanggal_kembali, status)
    VALUES ('$id_user','$id_buku','$tgl_pinjam','$jatuh_tempo',NULL,'dipinjam')");
}

function kembalikanBuku($conn, $id) {
    return mysqli_query($conn, "UPDATE peminjaman 
    SET tanggal_kembali=CURDATE(), status='dikembalikan'
    WHERE id_peminjaman='$id'");
}

?>
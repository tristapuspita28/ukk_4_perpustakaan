<?php

// ambil semua user
function getUser($conn) {
    return mysqli_query($conn, "SELECT * FROM user");
}

// ambil user berdasarkan id
function getUserById($conn, $id) {
    return mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
}

// tambah user
function tambahUser($conn, $nama, $email, $password, $role) {
    return mysqli_query($conn, "INSERT INTO user 
    (nama, email, password, role)
    VALUES ('$nama','$email','$password','$role')");
}

// update user
function updateUser($conn, $id, $nama, $email, $role) {
    return mysqli_query($conn, "UPDATE user 
    SET nama='$nama', email='$email', role='$role'
    WHERE id_user='$id'");
}

// hapus user
function hapusUser($conn, $id) {
    return mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");
}

// login (cek email & password)
function loginUser($conn, $email, $password) {
    return mysqli_query($conn, "SELECT * FROM user 
    WHERE email='$email' AND password='$password'");
}

?>
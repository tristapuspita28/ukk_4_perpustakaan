<?php
session_start();
include 'koneksi.php';

// proses register
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // 'siswa' atau 'admin'

    // cek email sudah ada atau belum
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Email sudah digunakan!";
    } else {
        mysqli_query($conn, "INSERT INTO user (nama, email, password, role)
            VALUES ('$nama','$email','$password','$role')");
        $success = "Registrasi berhasil! Silahkan login.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Perpustakaan</title>
    <style>
        body {
            font-family: Arial;
            background: #ffe6f0;
        }

        h2 {
            text-align: center;
            color: #ff4da6;
            margin-top: 50px;
        }

        form {
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
            margin-top: 30px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
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
            font-size: 16px;
        }

        button:hover {
            background: #ff1a8c;
        }

        .message {
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }

        .error {
            text-align: center;
            color: red;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            color: #ff4da6;
        }
    </style>
</head>
<body>

<h2>💖 Register Perpustakaan 💖</h2>

<form method="POST">
    <?php
    if(isset($error)) { echo "<div class='error'>$error</div>"; }
    if(isset($success)) { echo "<div class='message'>$success</div>"; }
    ?>

    Nama:
    <input type="text" name="nama" placeholder="Nama lengkap" required>

    Email:
    <input type="email" name="email" placeholder="Email" required>

    Password:
    <input type="password" name="password" placeholder="Password" required>

    Role:
    <select name="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="siswa">Siswa</option>
        <option value="admin">Admin</option>
    </select>

    <button name="register">Register</button>
</form>

<div class="footer">
    &copy; <?= date('Y'); ?> Perpustakaan Digital
</div>

</body>
</html>
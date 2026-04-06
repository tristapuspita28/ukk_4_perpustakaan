<?php
session_start();
include 'koneksi.php';

// proses login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_assoc($cek);

    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: dashboard_admin.php");
        } else {
            header("Location: dashboard_siswa.php");
        }
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan</title>
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
            width: 350px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px pink;
            margin-top: 30px;
        }

        input {
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

        .error {
            color: red;
            text-align: center;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            color: #ff4da6;
        }
    </style>
</head>
<body>

<h2>💖 Login Perpustakaan 💖</h2>

<form method="POST">
    <?php if(isset($error)) { echo "<div class='error'>$error</div>"; } ?>

    Email:
    <input type="email" name="email" placeholder="Email" required>

    Password:
    <input type="password" name="password" placeholder="Password" required>

    <button name="login">Login</button>
</form>

<div class="footer">
    &copy; <?= date('Y'); ?> Perpustakaan Digital
</div>

</body>
</html>
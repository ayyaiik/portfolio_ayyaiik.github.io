<?php
session_start();
include 'includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $koneksi->real_escape_string($_POST['username']);
    $password = md5($koneksi->real_escape_string($_POST['password'])); // Hash password dengan MD5

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    // Cek jika kueri berhasil dieksekusi
    if ($result) {
        if ($result->num_rows > 0) {
            $_SESSION['admin'] = $username;
            header("Location: admin/dashboard.php");
            exit();
        } else {
            $error_message = "Username atau password salah!";
        }
    } else {
        // Tampilkan error jika kueri SQL gagal
        echo "Error: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            /* Warna latar belakang */
        }

        .login-container {
            width: 300px;
            /* Lebar form */
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #ffffff;
            /* Warna latar belakang form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1 class="text-center">Login Admin</h1>
        <p class="text-center">Untuk Masuk ke Dashboard Silahkan Login</p>
        <?php if (isset($error_message))
            echo "<p class='text-danger text-center'>$error_message</p>"; ?>
        <form action="login.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button> <!-- Tombol lebar penuh -->
        </form>
    </div>
</body>

</html>


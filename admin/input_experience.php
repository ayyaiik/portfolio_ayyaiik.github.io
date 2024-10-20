<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $position = $koneksi->real_escape_string($_POST['position']);
    $company = $koneksi->real_escape_string($_POST['company']);
    $start_date = $koneksi->real_escape_string($_POST['start_date']);
    $end_date = $koneksi->real_escape_string($_POST['end_date']);
    $description = $koneksi->real_escape_string($_POST['description']);

    $query = "INSERT INTO experiences (position, company, start_date, end_date, description) VALUES ('$position', '$company', '$start_date', '$end_date', '$description')";
    if ($koneksi->query($query) === TRUE) {
        $success_message = "Data pengalaman berhasil ditambahkan!";
    } else {
        $error_message = "Gagal menambahkan data: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pengalaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Pengalaman</h1>
        <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="input_experience.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="position" class="form-label">Posisi:</label>
                <input type="text" id="position" name="position" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Perusahaan:</label>
                <input type="text" id="company" name="company" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Selesai (opsional):</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard Admin</a>
        </form>
    </div>
</body>
</html>

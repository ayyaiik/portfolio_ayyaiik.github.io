<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $koneksi->real_escape_string($_POST['title']);
    $organization = $koneksi->real_escape_string($_POST['organization']);
    $year = $koneksi->real_escape_string($_POST['year']);
    $description = $koneksi->real_escape_string($_POST['description']);

    $query = "INSERT INTO trainings (title, organization, year, description) VALUES ('$title', '$organization', '$year', '$description')";
    if ($koneksi->query($query) === TRUE) {
        $success_message = "Data pelatihan berhasil ditambahkan!";
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
    <title>Input Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Pelatihan</h1>
        <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="input_training.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Pelatihan:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="organization" class="form-label">Organisasi:</label>
                <input type="text" id="organization" name="organization" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun:</label>
                <input type="number" id="year" name="year" class="form-control" required>
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

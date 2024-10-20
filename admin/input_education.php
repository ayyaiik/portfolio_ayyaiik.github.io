<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $institution = $koneksi->real_escape_string($_POST['institution']);
    $degree = $koneksi->real_escape_string($_POST['degree']);
    $start_year = $koneksi->real_escape_string($_POST['start_year']);
    $end_year = $koneksi->real_escape_string($_POST['end_year']);
    $description = $koneksi->real_escape_string($_POST['description']);

    $query = "INSERT INTO educations (institution, degree, start_year, end_year, description) VALUES ('$institution', '$degree', '$start_year', '$end_year', '$description')";
    if ($koneksi->query($query) === TRUE) {
        $success_message = "Data pendidikan berhasil ditambahkan!";
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
    <title>Input Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Pendidikan</h1>
        <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="input_education.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="institution" class="form-label">Institusi:</label>
                <input type="text" id="institution" name="institution" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="degree" class="form-label">Gelar:</label>
                <input type="text" id="degree" name="degree" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="start_year" class="form-label">Tahun Mulai:</label>
                <input type="number" id="start_year" name="start_year" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_year" class="form-label">Tahun Selesai:</label>
                <input type="number" id="end_year" name="end_year" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi (opsional):</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard Admin</a>
        </form>
    </div>
</body>
</html>

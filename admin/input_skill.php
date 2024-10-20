<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skill_name = $koneksi->real_escape_string($_POST['skill_name']);
    $level = $koneksi->real_escape_string($_POST['level']);

    $query = "INSERT INTO skills (skill_name, level) VALUES ('$skill_name', '$level')";
    if ($koneksi->query($query) === TRUE) {
        $success_message = "Data keahlian berhasil ditambahkan!";
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
    <title>Input Keahlian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Keahlian</h1>
        <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="input_skill.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="skill_name" class="form-label">Nama Keahlian:</label>
                <input type="text" id="skill_name" name="skill_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level Keahlian (1-10):</label>
                <input type="number" id="level" name="level" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard Admin</a>
        </form>
    </div>
</body>
</html>

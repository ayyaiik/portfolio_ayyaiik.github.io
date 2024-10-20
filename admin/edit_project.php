<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $koneksi->real_escape_string($_POST['id']);
    $project_name = $koneksi->real_escape_string($_POST['project_name']);
    $description = $koneksi->real_escape_string($_POST['description']);

    $query = "UPDATE projects SET project_name='$project_name', description='$description' WHERE id='$id'";
    
    if ($koneksi->query($query) === TRUE) {
        header("Location: dashboard.php?success=Data berhasil diupdate.");
        exit();
    } else {
        $error_message = "Gagal mengupdate data: " . $koneksi->error;
    }
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $result = $koneksi->query("SELECT * FROM projects WHERE id='$id'");
    $project = $result->fetch_assoc();
} else {
    header("Location: dashboard.php?error=ID tidak ditemukan.");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Proyek</h1>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="edit_project.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $project['id'] ?>">
            <div class="mb-3">
                <label for="project_name" class="form-label">Judul Proyek:</label>
                <input type="text" id="project_name" name="project_name" class="form-control" value="<?= $project['project_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" required><?= $project['description'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

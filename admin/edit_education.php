<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $koneksi->real_escape_string($_POST['id']);
    $institution = $koneksi->real_escape_string($_POST['institution']);
    $degree = $koneksi->real_escape_string($_POST['degree']);
    $start_year = $koneksi->real_escape_string($_POST['start_year']);
    $end_year = $koneksi->real_escape_string($_POST['end_year']);

    $query = "UPDATE educations SET institution='$institution', degree='$degree', start_year='$start_year', end_year='$end_year' WHERE id='$id'";
    
    if ($koneksi->query($query) === TRUE) {
        header("Location: dashboard.php?success=Data pendidikan berhasil diupdate.");
        exit();
    } else {
        $error_message = "Gagal mengupdate data: " . $koneksi->error;
    }
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $result = $koneksi->query("SELECT * FROM educations WHERE id='$id'");
    $education = $result->fetch_assoc();
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
    <title>Edit Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Pendidikan</h1>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="edit_education.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $education['id'] ?>">
            <div class="mb-3">
                <label for="institution" class="form-label">Institusi:</label>
                <input type="text" id="institution" name="institution" class="form-control" value="<?= $education['institution'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="degree" class="form-label">Gelar:</label>
                <input type="text" id="degree" name="degree" class="form-control" value="<?= $education['degree'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="start_year" class="form-label">Tahun Mulai:</label>
                <input type="number" id="start_year" name="start_year" class="form-control" value="<?= $education['start_year'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="end_year" class="form-label">Tahun Selesai:</label>
                <input type="number" id="end_year" name="end_year" class="form-control" value="<?= $education['end_year'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

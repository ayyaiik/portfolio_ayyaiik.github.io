<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $koneksi->real_escape_string($_POST['id']);
    $title = $koneksi->real_escape_string($_POST['title']);
    $organization = $koneksi->real_escape_string($_POST['organization']);
    $year = $koneksi->real_escape_string($_POST['year']);

    $query = "UPDATE trainings SET title='$title', organization='$organization', year='$year' WHERE id='$id'";
    
    if ($koneksi->query($query) === TRUE) {
        header("Location: dashboard.php?success=Data pelatihan berhasil diupdate.");
        exit();
    } else {
        $error_message = "Gagal mengupdate data: " . $koneksi->error;
    }
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $result = $koneksi->query("SELECT * FROM trainings WHERE id='$id'");
    $training = $result->fetch_assoc();
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
    <title>Edit Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Pelatihan</h1>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="edit_training.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $training['id'] ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Pelatihan:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $training['title'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="organization" class="form-label">Organisasi:</label>
                <input type="text" id="organization" name="organization" class="form-control" value="<?= $training['organization'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Tahun:</label>
                <input type="number" id="year" name="year" class="form-control" value="<?= $training['year'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

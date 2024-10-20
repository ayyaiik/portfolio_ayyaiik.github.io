<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $koneksi->real_escape_string($_POST['id']);
    $position = $koneksi->real_escape_string($_POST['position']);
    $company = $koneksi->real_escape_string($_POST['company']);
    $start_date = $koneksi->real_escape_string($_POST['start_date']);
    $end_date = $koneksi->real_escape_string($_POST['end_date']);

    $query = "UPDATE experiences SET position='$position', company='$company', start_date='$start_date', end_date='$end_date' WHERE id='$id'";
    
    if ($koneksi->query($query) === TRUE) {
        header("Location: dashboard.php?success=Data pengalaman berhasil diupdate.");
        exit();
    } else {
        $error_message = "Gagal mengupdate data: " . $koneksi->error;
    }
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $result = $koneksi->query("SELECT * FROM experiences WHERE id='$id'");
    $experience = $result->fetch_assoc();
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
    <title>Edit Pengalaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Pengalaman</h1>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="edit_experience.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $experience['id'] ?>">
            <div class="mb-3">
                <label for="position" class="form-label">Posisi:</label>
                <input type="text" id="position" name="position" class="form-control" value="<?= $experience['position'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Perusahaan:</label>
                <input type="text" id="company" name="company" class="form-control" value="<?= $experience['company'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="<?= $experience['start_date'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Selesai:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="<?= $experience['end_date'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

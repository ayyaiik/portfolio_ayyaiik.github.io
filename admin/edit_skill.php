<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $koneksi->real_escape_string($_POST['id']);
    $skill_name = $koneksi->real_escape_string($_POST['skill_name']);
    $level = $koneksi->real_escape_string($_POST['level']);

    $query = "UPDATE skills SET skill_name='$skill_name', level='$level' WHERE id='$id'";
    
    if ($koneksi->query($query) === TRUE) {
        header("Location: dashboard.php?success=Data keterampilan berhasil diupdate.");
        exit();
    } else {
        $error_message = "Gagal mengupdate data: " . $koneksi->error;
    }
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $result = $koneksi->query("SELECT * FROM skills WHERE id='$id'");
    $skill = $result->fetch_assoc();
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
    <title>Edit Keterampilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Keterampilan</h1>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="edit_skill.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $skill['id'] ?>">
            <div class="mb-3">
                <label for="skill_name" class="form-label">Nama Keterampilan:</label>
                <input type="text" id="skill_name" name="skill_name" class="form-control" value="<?= $skill['skill_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Tingkat Kemahiran:</label>
                <input type="text" id="level" name="level" class="form-control" value="<?= $skill['level'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

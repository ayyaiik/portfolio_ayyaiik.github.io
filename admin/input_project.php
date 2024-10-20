<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $koneksi->real_escape_string($_POST['project_name']);
    $description = $koneksi->real_escape_string($_POST['description']);
    $url = $koneksi->real_escape_string($_POST['url']);
    
    // Proses upload gambar
    $target_dir = "uploads/"; // Pastikan folder ini ada dan memiliki permission yang sesuai
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi ukuran file dan tipe file
    $uploadOk = 1;
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check file size (misalnya, batas 2MB)
    if ($_FILES["image"]["size"] > 2000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Maaf, file tidak dapat diupload.";
    } else {
        // Jika upload OK, coba upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Masukkan data ke database
            $image = $koneksi->real_escape_string(basename($_FILES["image"]["name"]));
            $query = "INSERT INTO projects (project_name, description, url, image) VALUES ('$project_name', '$description', '$url', '$image')";
            if ($koneksi->query($query) === TRUE) {
                $success_message = "Proyek berhasil ditambahkan!";
            } else {
                $error_message = "Gagal menambahkan proyek: " . $koneksi->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Input Proyek</h1>
        <?php if (isset($success_message)) echo "<p class='text-success'>$success_message</p>"; ?>
        <?php if (isset($error_message)) echo "<p class='text-danger'>$error_message</p>"; ?>
        <form action="input_project.php" method="POST" enctype="multipart/form-data" class="mt-4"> <!-- Tambahkan enctype -->
            <div class="mb-3">
                <label for="project_name" class="form-label">Nama Proyek:</label>
                <input type="text" id="project_name" name="project_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL Proyek (opsional):</label>
                <input type="url" id="url" name="url" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Proyek (opsional):</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard Admin</a>
        </form>
    </div>
</body>
</html>

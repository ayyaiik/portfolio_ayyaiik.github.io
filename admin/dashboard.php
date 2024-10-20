<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

// Fetch data from all tables
$projects = $koneksi->query("SELECT * FROM projects");
$educations = $koneksi->query("SELECT * FROM educations");
$experiences = $koneksi->query("SELECT * FROM experiences");
$trainings = $koneksi->query("SELECT * FROM trainings");
$skills = $koneksi->query("SELECT * FROM skills");
$result = $koneksi->query("SELECT * FROM contacts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Dashboard Admin</h1>
        <a href="input_project.php" class="btn btn-primary mb-3">Tambah Proyek</a>
        <a href="input_education.php" class="btn btn-primary mb-3">Tambah Pendidikan</a>
        <a href="input_experience.php" class="btn btn-primary mb-3">Tambah Pengalaman</a>
        <a href="input_training.php" class="btn btn-primary mb-3">Tambah Pelatihan</a>
        <a href="input_skill.php" class="btn btn-primary mb-3">Tambah Keahlian</a>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

        <!-- Projects Section -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?= $_GET['success'] ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?= $_GET['error'] ?></div>
        <?php endif; ?>


        <h2>Projects</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($project = $projects->fetch_assoc()): ?>
                    <tr>
                        <td><?= $project['project_name'] ?></td>
                        <td><?= $project['description'] ?></td>
                        <td>
                            <a href="edit_project.php?id=<?= $project['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_project.php?id=<?= $project['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Educations Section -->
        <h2>Pendidikan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Institusi</th>
                    <th>Gelar</th>
                    <th>Tahun Mulai</th>
                    <th>Tahun Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($education = $educations->fetch_assoc()): ?>
                    <tr>
                        <td><?= $education['institution'] ?></td>
                        <td><?= $education['degree'] ?></td>
                        <td><?= $education['start_year'] ?></td>
                        <td><?= $education['end_year'] ?></td>
                        <td>
                            <a href="edit_education.php?id=<?= $education['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_education.php?id=<?= $education['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Experiences Section -->
        <h2>Pengalaman</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Posisi</th>
                    <th>Perusahaan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($experience = $experiences->fetch_assoc()): ?>
                    <tr>
                        <td><?= $experience['position'] ?></td>
                        <td><?= $experience['company'] ?></td>
                        <td><?= $experience['start_date'] ?></td>
                        <td><?= $experience['end_date'] ?></td>
                        <td>
                            <a href="edit_experience.php?id=<?= $experience['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_experience.php?id=<?= $experience['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Trainings Section -->
        <h2>Pelatihan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Pelatihan</th>
                    <th>Organisasi</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($training = $trainings->fetch_assoc()): ?>
                    <tr>
                        <td><?= $training['title'] ?></td>
                        <td><?= $training['organization'] ?></td>
                        <td><?= $training['year'] ?></td>
                        <td>
                            <a href="edit_training.php?id=<?= $training['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_training.php?id=<?= $training['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Skills Section -->
        <h2>Keahlian</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Keahlian</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($skill = $skills->fetch_assoc()): ?>
                    <tr>
                        <td><?= $skill['skill_name'] ?></td>
                        <td><?= $skill['level'] ?></td>
                        <td>
                            <a href="edit_skill.php?id=<?= $skill['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_skill.php?id=<?= $skill['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
    <div class="container">
        <h2 class="my-4">Pesan yang Dikirim oleh User</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Tanggal Dikirim</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['message']) ?></td>
                        <td><?= $row['created_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
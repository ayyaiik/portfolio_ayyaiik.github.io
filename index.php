<?php
include 'includes/database.php';

// Fetch data from database
$projects = $koneksi->query("SELECT * FROM projects");
$educations = $koneksi->query("SELECT * FROM educations");
$experiences = $koneksi->query("SELECT * FROM experiences");
$trainings = $koneksi->query("SELECT * FROM trainings");
$skills = $koneksi->query("SELECT * FROM skills");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Hayatul Fauzi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang Saya</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Project</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education">Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Pengalaman</a></li>
                    <li class="nav-item"><a class="nav-link" href="#training">Pelatihan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Keahlian</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Hubungi Saya</a></li>
                </ul>
                <a href="login.php" class="btn btn-warning ms-auto">Login</a>
            </div>
        </div>
    </nav>
    
    <!-- Home Section -->
    <section id="home" class="d-flex align-items-center bg-warning py-5" style="min-height: 100vh;">
    <div class="container text-start d-flex flex-column justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-start">
                <h1 class="display-4">Selamat Datang di Portofolio Saya</h1>
                <p class="lead">Saya adalah seorang Web Developer dan Designer yang berpengalaman dalam berbagai proyek.</p>
                <!-- CTA Buttons -->
                <div class="d-flex gap-2 mt-3">
                    <a href="#projects" class="btn btn-primary">Lihat Proyek Saya</a>
                    <a href="#contact" class="btn btn-secondary">Hubungi Saya</a>
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <img src="assets/img/photo ku.jpg" alt="Hero Image" class="rounded-circle" style="max-width: 500px;">
            </div>
        </div>
    </div>
</section>


 <!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
       
        <div class="row">
            <div class="col-md-5">
                <img src="assets/img/photo ku.jpg" alt="Tentang Saya" class="img-fluid rounded-circle">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
            <div class="biodata">
    <h1>Kenali Saya Lebih Dekat</h1>
    <ul>
        <li><strong>Nama:</strong> Hayatul Fauzi</li>
        <li><strong>Usia:</strong> 30 tahun</li>
        <li><strong>Alamat:</strong> Jl.Swadaya No.140 Kel.Pondok Karya,Kec.Pondok Aren.Kota Tangerang Selatan</li>
        <li><strong>Email:</strong> hayatulfauzi44@gmail.com</li>
        <li><strong>Telepon:</strong> (+62) 83143949255</li>
        <li><strong>Pendidikan:</strong> Manajemen Informatika</li>
        <li><strong>Pekerjaan:</strong> Web Developer</li>
    </ul>
</div>
                <!-- CTA WhatsApp -->
                <div class="mt-3">
                    <a href="https://wa.me/6283143949255" class="btn btn-success">
                        <i class="fab fa-whatsapp"></i> Hubungi Saya di WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Projects Section -->
<section id="projects" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Project</h2>
        <div class="row">
            <?php while ($project = $projects->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="admin/uploads/<?= $project['image'] ?>" class="card-img-top" alt="<?= $project['project_name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['project_name'] ?></h5>
                            <p class="card-text"><?= $project['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>


    <!-- Education Section -->
    <section id="education" class="py-5">
        <div class="container">
            <h2 class="text-center">Pendidikan</h2>
            <div class="row">
                <?php while ($education = $educations->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <strong><?= $education['institution'] ?></strong> - <?= $education['degree'] ?> (<?= $education['start_year'] ?> - <?= $education['end_year'] ?>)
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center">Pengalaman</h2>
            <div class="row">
                <?php while ($experience = $experiences->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <strong><?= $experience['position'] ?></strong> di <?= $experience['company'] ?> (<?= $experience['start_date'] ?> - <?= $experience['end_date'] ?>)
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Training Section -->
    <section id="training" class="py-5">
        <div class="container">
            <h2 class="text-center">Pelatihan</h2>
            <div class="row">
                <?php while ($training = $trainings->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <strong><?= $training['title'] ?></strong> - <?= $training['organization'] ?> (<?= $training['year'] ?>)
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center">Keahlian</h2>
            <div class="row">
                <?php while ($skill = $skills->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <strong><?= $skill['skill_name'] ?></strong> - Level: <?= $skill['level'] ?>/10
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center">Hubungi Saya</h2>
        <div class="row">
            <!-- Maps Section -->
            <div class="col-md-6">
                <div class="embed-responsive" style="height: 300px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.5464452578143!2d-122.41941568468073!3d37.77492927975937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c32bb2af7%3A0x8a1a0b8e21ec8a38!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1635720383003!5m2!1sen!2sus" 
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="col-md-6">
    <form action="contact.php" method="POST" class="row g-3" onsubmit="return showConfirmation()">
        <div class="col-12">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-12">
            <label for="message" class="form-label">Pesan</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </div>
    </form>
</div>

        </div>
    </div>
</section>

    <!-- Footer -->
<footer class="py-4 bg-dark text-light text-center">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="copyright">
            <p>&copy; 2024 Portofolio Hayatul Fauzi. All Rights Reserved.</p>
        </div>
        <div class="email">
            <p>hayatulfauzi44@gmail.com</p> <!-- Ganti dengan email Anda -->
        </div>
        <div class="social-media">
            <span class="me-2">Follow Me:</span>
            <a href="https://instagram.com" class="text-light me-3" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://linkedin.com" class="text-light me-3" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://facebook.com" class="text-light me-3" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://github.com" class="text-light me-3" target="_blank">
                <i class="fab fa-github"></i>
            </a>
        </div>
    </div>
</footer>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
function showConfirmation() {
    // Tampilkan pop-up konfirmasi
    alert('Pesan Anda telah dikirim! Terima kasih telah menghubungi saya.');
    // Kembali ke true untuk melanjutkan pengiriman form
    return true;
}
</script>

</body>

</html>

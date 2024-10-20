<?php
include 'includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $koneksi->real_escape_string($_POST['name']);
    $email = $koneksi->real_escape_string($_POST['email']);
    $message = $koneksi->real_escape_string($_POST['message']);

    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($koneksi->query($query) === TRUE) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Gagal mengirim pesan: " . $koneksi->error;
    }
}
?>

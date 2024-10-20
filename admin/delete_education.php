<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
include '../includes/database.php';

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $query = "DELETE FROM educations WHERE id = '$id'";

    if ($koneksi->query($query) === TRUE) {
        header("Location: dashboard.php?success=Data berhasil dihapus.");
        exit();
    } else {
        header("Location: dashboard.php?error=Gagal menghapus data: " . $koneksi->error);
        exit();
    }
} else {
    header("Location: dashboard.php?error=ID tidak ditemukan.");
    exit();
}
?>

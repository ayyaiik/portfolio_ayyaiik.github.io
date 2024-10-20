<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil ID pesan dan balasan dari form
    $message_id = $_POST['message_id'];
    $reply = $_POST['reply'];

    // Update pesan dengan balasan di database
    $query = "UPDATE contacts SET reply = ? WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('si', $reply, $message_id);
    
    if ($stmt->execute()) {
        // Jika berhasil, kembali ke dashboard dengan pesan sukses
        header("Location: dashboard.php?reply_success=true");
    } else {
        // Jika gagal, tampilkan error
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
?>

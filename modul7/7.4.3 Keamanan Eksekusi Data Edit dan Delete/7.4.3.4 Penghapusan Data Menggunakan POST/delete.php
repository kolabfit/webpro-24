<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "modul7");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil user_id dari POST
$user_id = $_POST['user_id'];

// Hapus data pengguna
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    echo "Pengguna berhasil dihapus.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

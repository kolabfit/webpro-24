<?php
session_start(); // Mulai sesi

// Koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "modul7");

// Memeriksa apakah data delete disimpan dalam sesi
if (isset($_SESSION['delete_id'])) {
    $user_id = $_SESSION['delete_id'];

    // Menghapus data user berdasarkan ID
    $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }

    // Hapus data sesi setelah selesai
    unset($_SESSION['delete_id']);
} else {
    echo "ID tidak valid.";
}
?>

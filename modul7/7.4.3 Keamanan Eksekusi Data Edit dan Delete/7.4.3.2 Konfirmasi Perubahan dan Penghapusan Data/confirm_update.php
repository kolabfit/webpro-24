<?php
session_start(); // Mulai sesi

// Koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "modul7");

// Memeriksa apakah data update disimpan dalam sesi
if (isset($_SESSION['update_user'])) {
    $user_id = $_SESSION['update_user']['id'];
    $username = $_SESSION['update_user']['username'];

    // Update data user berdasarkan ID
    $stmt = $mysqli->prepare("UPDATE users SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $username, $user_id);
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data.";
    }

    // Hapus data sesi setelah selesai
    unset($_SESSION['update_user']);
} else {
    echo "Data tidak valid.";
}
?>
